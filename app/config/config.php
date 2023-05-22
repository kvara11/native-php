<?php

switch ($_SERVER['HTTP_HOST']) {

    case 'semperfunding.com':

        define ('SITE_ENVIRONMENT', 'dev');

        // Database Config
        define('DB_TYPE', 'mysql');
        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'semper');
        define('DB_PASSWORD', 'L]n2s](jG8^_H$s');
        define('DB_NAME', 'semperfunding');
        define('DB_CHARSET', 'utf8');

        define('PATH_FROM_ROOT', '/');
        define('HTTP_SERVER', 'http://semperfunding.com');
        define('HTTPS_SERVER', '');
        define('HTTP_URL_BASE', HTTP_SERVER.PATH_FROM_ROOT);
        define('ENABLE_SSL', false);

        define('ENABLE_MODULE_CACHE', false);
        define('DIR_APP_CACHE', '/var/www/semperfunding.com/public_html/app/cache');

        define('APPLY_BASE_URL', 'https://trtn-app.devel.ninja/');
        define('SUGAR_BASE_URL', 'https://trtn-crm.devel.ninja/rest/v10/');
        define('HELP_EMAIL', 'chris@tm5150.com');

        break;

    case 'trtn-web.devel.ninja':

        define ('SITE_ENVIRONMENT', 'dev');

        // Database Config
        define('DB_TYPE', 'mysql');
        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'website_dev');
        define('DB_PASSWORD', 'tOUWwzfzRnnC');
        define('DB_NAME', 'website_dev');
        define('DB_CHARSET', 'utf8');

        define('PATH_FROM_ROOT', '/');
        define('HTTP_SERVER', 'https://trtn-web.devel.ninja');
        define('HTTPS_SERVER', 'https://trtn-web.devel.ninja');
        define('HTTP_URL_BASE', HTTP_SERVER.PATH_FROM_ROOT);
        define('ENABLE_SSL', false);

        define('ENABLE_MODULE_CACHE', false);
        define('DIR_APP_CACHE', '/srv/www/trtn-web.devel.ninja/app/cache');

        define('APPLY_BASE_URL', 'https://trtn-app.devel.ninja/');
        define('SUGAR_BASE_URL', 'https://trtn-crm.devel.ninja/rest/v10/');
        //define('SUGAR_BASE_URL', 'https://sugar.tritoncptl.com/rest/v10/');
	define('HELP_EMAIL', 'danny@ninjacode.co');


        break;

    default: {

        define ('SITE_ENVIRONMENT', 'live');

        // Database Config
        define('DB_TYPE', 'mysql');
        define('DB_HOST', 'triton-db');
        define('DB_USERNAME', 'website');
        define('DB_PASSWORD', 'FyYxth3eFgC5');
        define('DB_NAME', 'website');
        define('DB_CHARSET', 'utf8');

        define('PATH_FROM_ROOT', '/');
        define('HTTP_SERVER', 'https://www.tritoncptl.com');
        define('HTTPS_SERVER', 'https://www.tritoncptl.com');
        define('HTTP_URL_BASE', HTTP_SERVER.PATH_FROM_ROOT);
        define('ENABLE_SSL', false);

        define('ENABLE_MODULE_CACHE', false);
        define('DIR_APP_CACHE', '/srv/www/tritoncptl.com/app/cache');

        define('APPLY_BASE_URL', 'https://apply.tritoncptl.com/');
        define('SUGAR_BASE_URL', 'https://sugar.tritoncptl.com/rest/v10/');
        define('HELP_EMAIL', 'chris@tm5150.com');

        break;
    }

}

define('SITE_NAME', 'Triton Capital');

define('HTTPS_URL_BASE', (ENABLE_SSL === true?HTTPS_SERVER.PATH_FROM_ROOT:HTTP_SERVER.PATH_FROM_ROOT));
define('URL_BASE', PATH_FROM_ROOT);

define('awsEnabled', false);
define('awsAccessKey', '');
define('awsSecretKey', '');
define('awsBucketName', '');
define('awsURL', 'http://'.awsBucketName.'.s3.amazonaws.com/');

define('FOLDER_ASSETS', 'assets');
define('FOLDER_IMG', 'img');

define('MAIN_IMAGE_FOLDER', '/assets/img/content-3000x3000/');
define('RESOURCE_ARTICLE_IMAGE_FOLDER', '/assets/img/content-800x450/');

define('FOLDER_FILES', 'files');

define('URL_ASSETS', URL_BASE . FOLDER_ASSETS . '/');
define('URL_IMG', URL_ASSETS . FOLDER_IMG . '/');
define('URL_FILES', URL_BASE . FOLDER_FILES . '/');


/*define('SUGAR_API_CLIENT', 'tm5150');
define('SUGAR_API_SECRET', 'fdJKjo023kjjacmNb68aaAzjw411wkjooal92la2uIQAlVz92');*/

define('SUGAR_API_CLIENT', 'triton_website');
define('SUGAR_API_SECRET', 'fOR0mIfOAETBimC6ohiy3PFh3oGydtUi');
define('SUGAR_API_USER', 'triton_cptl_website');
define('SUGAR_API_PASS', 'oEpDFgHGfEK4ke2doHxzFFpL');

