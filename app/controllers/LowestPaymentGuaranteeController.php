<?php

class LowestPaymentGuaranteeController extends BaseController {

	protected $pageId = 26;

    protected $routes = array(
        '' => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();
 		$app->template->set('page', $this->getPageSectionFields());
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('lowest-payment-guarantee.php');
    }

}