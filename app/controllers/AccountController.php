<?php

class AccountController extends BaseController
{
    protected $pageId = 11;

    protected $routes = array (
        '/submit' => array ('action' => 'submitActivation'),
        '/silent-save' => array ('action' => 'silentSave'),
        ''        => array ('action' => 'showLanding')
    );

    public function submitActivation()
    {
        userIsActive();
        $post = array ();
        $post['acct_num'] = strip_tags ($_POST['account_number']);
        $post['verification_code'] = strip_tags ($_POST['activation_code']);
        $post['contact_id'] = strip_tags ($_POST['contact_id']);
        $post['account_id'] = strip_tags ($_POST['account_id']);
        $post['first_name'] = strip_tags ($_POST['first_name']);
        $post['last_name'] = strip_tags ($_POST['last_name']);
        $post['business_name'] = strip_tags ($_POST['business_name']);
        $post['business_street_address'] = strip_tags ($_POST['business_address_street']);
        $post['business_city'] = strip_tags ($_POST['business_address_city']);
        $post['business_state'] = strip_tags ($_POST['business_address_state']);
        $post['business_zip'] = strip_tags ($_POST['business_address_postalcode']);
        $post['business_country'] = '';
        $post['office_phone'] = strip_tags ($_POST['office_phone']);
        $post['time_in_business'] = strip_tags ($_POST['time_in_business']);
        $post['fed_tax_id'] = strip_tags ($_POST['fed_tax_id']);
        $post['total_employees'] = strip_tags ($_POST['total_employees']);
        $post['gross_revenue'] = strip_tags ($_POST['gross_revenue']);
        $post['job_title'] = strip_tags ($_POST['job_title']);
        $post['percentofownership_c'] = strip_tags ($_POST['percentofownership_c']);
        $post['email'] = strip_tags ($_POST['email']);
        $post['cell'] = strip_tags ($_POST['cell']);
        $post['social_security_no'] = strip_tags ($_POST['social_security_no']);
        $post['wc_loan'] = $_POST['wc-loan'];
        $post['eq_loan'] = $_POST['eq-loan'];
        $post['ip_address'] = $_SERVER['REMOTE_ADDR'];

        $activation = $this->activateAccount($post);

        $result = array();
        $result['api_response'] = $activation;
        $result['response'] = false;
        if ($activation['success']) {
            $result['response'] = true;
        }
        echo json_encode($result);
    }

    public function silentSave()
    {
        $data = $_POST;
        $data['ip_address'] = $_SERVER['REMOTE_ADDR'];

        $token = getSugarAPIAuthToken();
        $result = makeSugarApiCall('activate/silent-save', $data, $token);

        return json_encode($result);
    }

    public function showLanding()
    {
        $localizedData = getLocalizedData($_SERVER['REMOTE_ADDR']);
        $db = Database::getInstance();
        $testimonials = $db->query("SELECT * FROM testimonials t join testimonials_to_localized_landing_pages t2llp on t.id = t2llp.testimonial_id WHERE t2llp.localized_landing_page_id = " . $localizedData->getId())->fetchAll(PDO::FETCH_ASSOC);
        $app = App::getInstance ();
        $app->template->set ('localizedData', $localizedData);
        $app->template->set ('testimonials', $testimonials);
        if ( !isset($_POST['account_number']) && !isset($_POST['activation_code']) ) {
            $app->template->set ('page', $this->getPageSectionFields ());
            $app->template->set ('meta', Meta::findById ($this->getPageId ()));
            $app->template->render ('activate.php');
        }
        else {
            $accountNumber = strip_tags (trim ($_POST['account_number']));
            $activationCode = strip_tags (trim ($_POST['activation_code']));
            $account = $this->getAccount ($accountNumber, $activationCode);

            $letMeIn = true;

            if(!empty($_SESSION['logged_in'])) {
                $letMeIn = $_SESSION['logged_in'];
            }

            if ($account->success && $letMeIn) {
                $_SESSION['logged_in'] = true;
                userIsActive();
                $_SESSION['user_info'] = array();
                $_SESSION['user_info']['account_number'] = $accountNumber;
                $_SESSION['user_info']['activation_code'] = $activationCode;
                $accountData = (array) $account->data->account;
                $contactData = (array) $account->data->contact;
                $pageData = $this->getPageSectionFields ();
                $welcome_msg = parseReplacement(
                    array('{{Business Name}}'),
                    array($accountData['name']),
                    $pageData['Content']['main_content']
                );
                $app->template->set ('page', $pageData);
                if(!empty($_SESSION['locale-params'])){
                    $app->template->set ('params', $_SESSION['locale-params']);
                }
                $app->template->set ('welcome_msg', $welcome_msg);
                $app->template->set ('account', $accountData);
                $app->template->set ('account_number', $accountNumber);
                $app->template->set ('activation_code', $activationCode);
                $app->template->set ('contact', $contactData);
                $app->template->set ('meta', Meta::findById ($this->getPageId ()));
                $app->template->render ('account.php');
            }
            else {
                $testimonials = $db->query("SELECT * FROM testimonials t join testimonials_to_localized_landing_pages t2llp on t.id = t2llp.testimonial_id WHERE t2llp.localized_landing_page_id = " . $localizedData->getId())->fetchAll();

                if(!$testimonials){
                    $testimonials = $db->query("SELECT * FROM testimonials where active")->fetchAll();
                }
                $testimonial = $testimonials[array_rand($testimonials)];
                if(!empty($testimonial)) {
                    $app->template->set ('testimonial', $testimonial);
                }
                if(!empty($account->message)){
                    $app->template->set ('errors', array ($account->message));
                }

                $app->template->set ('page', $this->getPageSectionFields ());
                $app->template->set ('meta', Meta::findById (10));
                $app->template->render ('activate.php');
            }
        }
    }

    private function getAccount($account_number, $activation_code)
    {
        $data = array(
            "acct_num"          => $account_number,
            "verification_code" => $activation_code
        );

        $token = getSugarAPIAuthToken();

        return makeSugarApiCall('activate/load-account', $data, $token);
    }

    private function activateAccount($data)
    {
        $token = getSugarAPIAuthToken();

        $result = makeSugarApiCall('activate/save', $data, $token);

        return json_encode($result);
    }
}