<?php

class CreditAuthorizationAgreementController extends BaseController {

	protected $pageId = 27;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();

 		$app->template->set('page', $this->getPageSectionFields());
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('credit-authorization-agreement.php');
    }
}