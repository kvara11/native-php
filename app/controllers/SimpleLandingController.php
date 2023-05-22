<?php

class SimpleLandingController extends BaseController {
    
    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();
        $type = $app->router->getURI(true);
        switch($type){
            case 'failed-id-check' :
                $pageId = 15;
                break;
            case 'successful-signing' :
                $pageId = 16;
                break;
        }
        $this->setPageId ($pageId);
 		$app->template->set('page', $this->getPageSectionFields());
 		$app->template->set('type', $type);
        $app->template->setModuleVar('Header', 'meta', Meta::findById($pageId));
        $app->template->render('simple-landing.php');
    }

}