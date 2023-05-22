<?php
/**
 * @author    Chris Neal
 * @version   1.0
 * @copyright Copyright (c) 2014, Analog Republic
 **/
include "vendor/kint/Kint.class.php";
class App {

    static $instance;

    private $vars = array();

    private function __contruct() {}

    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }
    public function __get($index) {
        return $this->vars[$index];
    }
    public function __isset($index) {
        return isset($this->vars[$index]);
    }
    public function __unset($index) {
        unset($this->vars[$index]);
    }

    public static function redirect($url, $code = 301) {
        header("Location: ".$url, true, $code);
        exit();
    }

    public static function getInstance() {
        if (!isset(App::$instance)) {
            App::$instance = new App();
        }
        return App::$instance;
    }

    public static function requireLogin($include_query_string = true) {
        if (!tep_session_is_registered('customer_id')) {
            setLoginRedirect($include_query_string);
            self::redirect(URL_BASE.'account/login');
        }
    }

}
