<?php

class OfferFinancingController extends BaseController {

    protected $pageId = 4;

    protected $routes = array(
        '/submit' => array('action' => 'submitOfferForm'),
        ''        => array('action' => 'showLanding'),
    );

    public function showLanding() {
        $app = App::getInstance();

        $app->template->set('page', $this->getPageSectionFields());
        $app->template->addRequiredJS("pages/offer_financing.js");
        $app->template->setModuleVar('Header', 'meta', Meta::findById($this->getPageId()));
        $app->template->render('offer-financing.php');
    }

    public function submitOfferForm(){
        //validate fields
        $first_name = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
        $last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
        $objective = filter_var(trim($_POST['objective']), FILTER_SANITIZE_STRING);
        $sms = filter_var(trim($_POST['sms']), FILTER_SANITIZE_STRING);
        $email_address = filter_var(trim($_POST['email_address']), FILTER_SANITIZE_EMAIL);
        $website = filter_var(trim($_POST['website']), FILTER_SANITIZE_URL);
        $currently_finance = filter_var(trim($_POST['currently_finance']), FILTER_SANITIZE_STRING);
        $preferred_method = filter_var(trim($_POST['preferred_method']), FILTER_SANITIZE_STRING);

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'objective' => $objective,
            'sms' => $sms,
            'email_address' => $email_address,
            'website' => $website,
            'currently_finance' => $currently_finance,
            'preferred_method' => $preferred_method,
        );

        $token = getSugarAPIAuthToken();

        $result = makeSugarApiCall('offer-financing/add', $data, $token);

        echo json_encode($result);
    }
}