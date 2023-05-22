<?php

class EquipmentLoansController extends BaseController {
    
    protected $routes = array(
        "/:slug" => array('action' => 'showLoanLanding'),
        '' => array('action' => 'showLanding'),
    );
    
    protected $pageId = 3;

    protected function getRecentlyFundedSlides($page) {

        $recently_funded_slides = array();

        foreach ($page['Content'] as $key => $value) {
            
            if (strpos($key, 'recently_funded') !== false) {

                // get the index so we can easily pair image & text sets
                preg_match_all('!\d+!', $key, $matches);
                $index = $matches[0][0];
                if (strpos($key, 'image')) {
                    $new_key = 'image';
                } else if (strpos($key, 'industry')) {
                    $new_key = 'industry';
                } else if (strpos($key, 'amount')) {
                    $new_key = 'amount';
                }

                $recently_funded_slides[$index][$new_key] = $value;
                
            }

        }

        // Loop to make sure that only complete sets make it through to the template
        foreach ($recently_funded_slides as $key => $slide) {
            foreach ($slide as $value) {
                if ($value == '') {
                    unset($recently_funded_slides[$key]);
                }
            }
        }
        $recently_funded_slides = array_values($recently_funded_slides);
        $final_recently_funded_slides = array();

        // Picks 3 random slides to display
        for ($i=0; $i < 3; $i++) { 
            $rand_index = mt_rand(0,(count($recently_funded_slides)-1));
            $final_recently_funded_slides[] = $recently_funded_slides[$rand_index];
            unset($recently_funded_slides[$rand_index]);
            $recently_funded_slides = array_values($recently_funded_slides);
        }

        return $final_recently_funded_slides;

    }

    

    public function showLoanLanding($params) {
    
        $app = App::getInstance();
        $db = Database::getInstance();
    
        $landing_page = $db->prepare("SELECT * FROM landing_pages WHERE url_slug = :slug and parent = 2");
        $landing_page->execute(array(':slug' => $params["slug"]));
        $landing_page = $landing_page->fetch(PDO::FETCH_ASSOC);
    
    
        $random_team_photo = "/img/team-members/" . getLeadingZeroRandomNumber(1, 10) . ".png";
        $app->template->addRequiredJS("pages/landing_pages.js");
    
        $app->template->set('landing_page', $landing_page);
        $app->template->set('random_team_photo', $random_team_photo);
        $meta = new Meta;
        $meta->setTitle($landing_page['meta_title']);
        $meta->setDescription($landing_page['meta_description']);
        $meta->setKeywords($landing_page['meta_keywords']);
        $app->template->setModuleVar('Header', 'meta', $meta);
        $app->template->render('loan-landing-eq.php');

    }

    public function showLanding() {
        $app = App::getInstance();

        $page = $this->getPageSectionFields();
        $app->template->set('page', $page);
        $app->template->addRequiredJS("pages/landing_pages.js");
        $recently_funded_slides = $this->getRecentlyFundedSlides($page);
        $app->template->set('recently_funded_slides', $recently_funded_slides);

        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('equipment-loans.php');
    }

}
