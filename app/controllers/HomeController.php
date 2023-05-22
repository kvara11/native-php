<?php

class HomeController extends BaseController {

	protected $pageId = 1;

	protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();

        $db  = Database::getInstance();
        $localizedData = getLocalizedData($_SERVER['REMOTE_ADDR']);
        if($localizedData->getState() == 'DEFAULT'){
            $localizedData = false;
        }
        $testimonials = $db->query("SELECT * FROM testimonials WHERE active = 1 AND featured = 1");
        $testimonials = $testimonials->fetchAll(PDO::FETCH_ASSOC);
        $app->template->addRequiredJS("pages/home_calculator.js");
        $app->template->addRequiredJS("https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js", 'full');
        $app->template->set('localizedData', $localizedData);
        $app->template->set('testimonials', $testimonials);    

        $app->template->set('page', $this->getPageSectionFields());
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('Home.php');
    }

}
