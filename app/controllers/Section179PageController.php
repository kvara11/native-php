<?php
    
    class Section179PageController extends BaseController
    {
        
        protected $pageId = 13;
        
        protected $routes = array (
            /*'/submit' => array ('action' => 'submitActivation'),*/
            '' => array ('action' => 'showLanding')
        );
        
        
        public function showLanding ()
        {
            $app = App::getInstance ();
            $app->template->addRequiredJS("vendor/jquery.countdown.min.js");
            $app->template->addRequiredJS("pages/section179.js");
            $app->template->set ('page', $this->getPageSectionFields ());
            $meta = Meta::findById($this->getPageId());
            $meta->setTitle($meta->getTitle());
            $app->template->set ('meta', $meta);
            $app->template->setModuleVar('Header', 'meta', $meta);
            $app->template->render ('section179.php');
            
            
        }
        
    }