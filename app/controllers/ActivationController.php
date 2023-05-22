<?php
    
    
    class ActivationController extends BaseController
    {
        
        protected $pageId = 10;
        
        protected $routes = array (
            '/' => array ('action' => 'showLanding'),
            '/:v1-:v2' => array ('action' => 'showLanding'),
        );
        
        public function showLanding ($params = array())
        {
            $_SESSION['logged_in'] = false;
            $_SESSION['locale-params'] = $params;
            $db  = Database::getInstance();
            $localizedData = getLocalizedData($_SERVER['REMOTE_ADDR']);
            $testimonials = $db->query("SELECT * FROM testimonials t join testimonials_to_localized_landing_pages t2llp on t.id = t2llp.testimonial_id WHERE t2llp.localized_landing_page_id = " . $localizedData->getId())->fetchAll();
            
            if(!$testimonials){
                $testimonials = $db->query("SELECT * FROM testimonials where active")->fetchAll();
            }
            $testimonial = $testimonials[array_rand($testimonials)];
            $app = App::getInstance ();
            if(isset($_GET['msg']) && $_GET['msg'] == 'inactive'){
                $app->template->set ('errors', array ('Your session expired due to inactivity. Please try activating again.'));
            }
            $app->template->set ('page', $this->getPageSectionFields ());
            
            $app->template->set ('params', $params);
            
            $app->template->set ('localizedData', $localizedData);
            
            $app->template->set ('meta', Meta::findById ($this->getPageId ()));
            
            if(!empty($testimonial)) {
                $app->template->set ('testimonial', $testimonial);
            }
                        
            $app->template->render ('activate.php');
        }
        
    }