<?php

class LowestPaymentTermsController extends BaseController {

	protected $pageId = 14;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();
 		$app->template->set('page', $this->getPageSectionFields());
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('lowest-payment-terms.php');
    }

}