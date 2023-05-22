<?php
    /**
     * @author    Chris Neal
     * @version   1.0
     * @copyright Copyright (c) 2014, Analog Republic
     **/
    if($_SERVER['HTTP_HOST'] == 'semperfunding.com'){
        /*error_reporting (E_ALL);
        ini_set ("display_errors", 1);*/
    }


    class ActionException extends Exception
    {
    }

    class ClassException extends Exception
    {
    }

    class ModuleViewException extends Exception
    {
    }

    class NotFoundException extends Exception
    {
    }

    class TemplateException extends Exception
    {
    }

    define ('DS', DIRECTORY_SEPARATOR);
    define ('DIR_ROOT', dirname (__FILE__));
    define ('DIR_APP', DIR_ROOT . DS . 'app' . DS);
    /*define ('DIR_APP_CACHE', DIR_APP . 'cache' . DS);*/
    define ('DIR_APP_CONFIG', DIR_APP . 'config' . DS);
    define ('DIR_APP_CONTROLLERS', DIR_APP . 'controllers' . DS);
    define ('DIR_APP_LIB', DIR_APP . 'lib' . DS);
    define ('DIR_APP_MODELS', DIR_APP . 'models' . DS);
    define ('DIR_APP_MODULES', DIR_APP . 'modules' . DS);
    define ('DIR_APP_VIEWS', DIR_APP . 'views' . DS);

// Composer autoload
 require (DIR_APP . 'vendor/autoload.php');

    require (DIR_APP_LIB . 'functions.php');
    require (DIR_APP_LIB . 'shared.php');

    require (DIR_APP_CONFIG . 'config.php');
    require (DIR_APP_CONFIG . 'routes.php');

    ob_start ();

// Don't start the session manually if using OSC
 session_start();

    try {
        try {

            $app = App::getInstance ();
            $app->router = new Router($routes);
            $app->template = new Template;
            $app->router->parseRoute ();


            // Show stoppers
        } catch ( NotFoundException $e ) {
            header ("HTTP/1.0 404 Not Found");
            $app->template->render ('404.php');
        } catch ( TemplateException $e ) {
            if ( SITE_ENVIRONMENT == 'live' )
                throw $e;

            echo 'Missing template - ' . $e->getMessage ();
        } catch ( ModuleViewException $e ) {
            if ( SITE_ENVIRONMENT == 'live' )
                throw $e;

            echo 'Missing module view - ' . $e->getMessage ();
        } catch ( ClassException $e ) {
            if ( SITE_ENVIRONMENT == 'live' )
                throw $e;

            echo 'Missing class - ' . $e->getMessage ();
        } catch ( ActionException $e ) {
            if ( SITE_ENVIRONMENT == 'live' )
                throw $e;

            echo 'Missing class action - ' . $e->getMessage ();
        } catch ( PDOException $e ) {
            if ( SITE_ENVIRONMENT == 'live' )
                throw $e;

            header ("HTTP/1.0 500 Internal Server Error");
            echo 'PDOException - ' . $e->getMessage () . '<br />';
            echo '<pre>';
            print_r ($e->getTrace ());
            echo '</pre>';
        }
    } catch ( Exception $e ) {
        header ("HTTP/1.0 500 Internal Server Error");

        if ( SITE_ENVIRONMENT == 'live' ) {
            echo '<h1>Ooops, there has been a problem.</h1>';
            echo '<p>Our web team have been notified, and will fix the problem as soon as possible. Please stay tuned!</p>';

            $message = 'Exception - ' . $e->getMessage () . "\n";
            $message .= print_r ($e->getTrace (), true);
            $message .= print_r ($_SERVER, true);
            $message .= print_r ($_REQUEST, true);

            mail ('chris@tm5150.com', "Show stopper", $message);

        }
        else {
            echo 'Exception - ' . $e->getMessage () . '<br />';
            echo '<pre>';
            print_r ($e->getTrace ());
            echo '</pre>';
        }
    }
