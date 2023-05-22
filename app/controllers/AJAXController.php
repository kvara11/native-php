<?php

class AJAXController extends BaseController {

    protected $routes = array(
        '/start-active-check' => array('action' => 'startActiveCheck'),
        '/check-user' => array('action' => 'checkUser'),
        '/user-active' => array('action' => 'userActive'),
        '/kill-user' => array('action' => 'killUser'),
        '/submit-contact-form' => array('action' => 'submitContactForm'),
    );
    public function startActiveCheck(){

    }
    public function checkUser() {
        $app = App::getInstance();
        $return = array('logout' => false, 'init' => true);
        $logout = false;
        if(isset($_SESSION)){

            if(empty($_SESSION['timestamp'])){
                userIsActive();
            }
            $check = time() - $_SESSION['timestamp'];
            if($check >= 120) { //subtract new timestamp from the old one
                $logout = true;
               /* $_SESSION['logged_in'] = false;
                unset($_SESSION['user_info']);*/
            }

            $return = array(
                'logout'=> $logout,
                'init'=> false,
                'check' => $check,
                'timestamp' => time()
            );
        }
        $app->template->set ('return', $return);
        $app->template->render ('ajax/check-user.php');
    }

    public function userActive() {
        userIsActive();
    }

    public function killUser() {
        killActiveUser();
    }

    public function submitContactForm()
    {
        $first_name = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
        $last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
        $sms = filter_var(trim($_POST['sms']), FILTER_SANITIZE_STRING);
        $email_address = filter_var(trim($_POST['email_address']), FILTER_SANITIZE_EMAIL);
        $preferred_method = filter_var(trim($_POST['preferred_method']), FILTER_SANITIZE_STRING);
        $origination = filter_var(trim($_POST['origination']), FILTER_SANITIZE_STRING);

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'sms' => $sms,
            'email_address' => $email_address,
            'preferred_method' => $preferred_method,
            'origination' => $origination,
        );

        $token = getSugarAPIAuthToken();

        $result = makeSugarApiCall('new-contact/add', $data, $token);

        echo json_encode($result);
    }
}
