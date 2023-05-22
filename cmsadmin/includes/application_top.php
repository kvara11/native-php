<?php
    ini_set ('display_errors', '1');
    ini_set('error_reporting','E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED');
    define ('DS', DIRECTORY_SEPARATOR);
    define ('DIR_ADMININCLUDES', dirname (__FILE__) . (substr (dirname (__FILE__), -1) != DS ? DS : ''));
    define ('DIR_ADMINROOT', realpath (DIR_ADMININCLUDES . '..' . DS) . DS);
    define ('DIR_ROOT', dirname (__FILE__) . DS . '..' . DS . '..' . DS);
    define ('DIR_APP', DIR_ROOT . 'app' . DS);
    define ('DIR_APP_CACHE', DIR_APP . 'cache' . DS);
    define ('DIR_APP_CONFIG', DIR_APP . 'config' . DS);
    define ('DIR_APP_CONTROLLERS', DIR_APP . 'controllers' . DS);
    define ('DIR_APP_LIB', DIR_APP . 'lib' . DS);
    define ('DIR_APP_MODELS', DIR_APP . 'models' . DS);
    define ('DIR_APP_MODULES', DIR_APP . 'modules' . DS);
    define ('DIR_APP_VIEWS', DIR_APP . 'views' . DS);
    
    require (DIR_ADMININCLUDES . 'functions.php');
    require (DIR_ADMININCLUDES . 'html_functions.php');
    require (DIR_APP_LIB . 'functions.php');
    
    require (DIR_APP_CONFIG . 'config.php');
    require (DIR_APP_LIB . 'shared.php');

// loadLib('vendor'.DS.'S3');
    
    try {
        $db = Database::getInstance ();
    } catch ( Exception $e ) {
        echo $e;
        die();
    }
    
    function getPages ()
    {
        
        global $db;
        
        $pages = $db->query ("select id, name, icon, active from pages");
        $pages = $pages->fetchAll (PDO::FETCH_ASSOC);
        
        if ( $pages ) {
            
            $returnArrayOne = array ();
            
            foreach ( $pages as $page ) {
                
                $returnArrayTwo = array (
                    'name'     => $page['name'] . " <span style='font-size: 9px; color: #dfdfdf;'>(pid: ".$page['id'].")</span>",
                    'icon'     => $page['icon'],
                    'children' => array (
                        array (
                            'name' => 'Meta',
                            'url'  => 'meta.php?id=' . $page['id'],
                        ),
                    )
                );
                
                $pageSections = $db->query ("select id, name from page_sections where page_id = " . $page['id'] . " ORDER BY id ASC");
                $pageSections = $pageSections->fetchAll (PDO::FETCH_ASSOC);
                
                if ( $pageSections ) {
                    
                    foreach ( $pageSections as $pageSection ) {
                        if ( ($page['name'] == 'Working Capital' || $page['name'] == 'Equipment Loans') && $pageSection['name'] == 'Landing Pages' ) {
                            $parent = ($page['name'] == 'Working Capital' ? 1 : 2);
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'landing_pages.php?parent=' . $parent,
                            );
        
                        }
                        else if ( $page['name'] == 'Equipment Loans' && $pageSection['name'] == 'Landing Pages' ) {
        
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'landing_pages.php?parent=2',
                            );
        
                        }
                        else if ( $page['name'] == 'Resources' && $pageSection['name'] == 'Articles' ) {
                            
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'resource_articles.php',
                            );
                            
                        }
                        else if ( $page['name'] == 'Success Stories' ) {
                            
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'edit-page-section-fields.php?id=' . $pageSection['id']
                            );
                            $returnArrayTwo['children'][] = array (
                                'name' => 'Edit',
                                'url'  => 'success_stories.php',
                            );
                            
                        }
                        else if ( $page['name'] == 'Careers' ) {
    
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'edit-page-section-fields.php?id=' . $pageSection['id']
                            );
                            $returnArrayTwo['children'][] = array (
                                'name' => 'Job Listings',
                                'url'  => 'job_listings.php',
                            );
    
                        }
                        else if ( $page['name'] == 'Activation Pages' ) {
                            
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'edit-page-section-fields.php?id=' . $pageSection['id']
                            );
                            $returnArrayTwo['children'][] = array (
                                'name' => 'Localized Landing Pages',
                                'url'  => 'localized_landing_pages.php',
                            );
                            
                        }
                        else if ( $page['name'] == 'Testimonials' ) {
                            
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => 'edit-page-section-fields.php?id=' . $pageSection['id']
                            );
                            $returnArrayTwo['children'][] = array (
                                'name' => 'Edit',
                                'url'  => 'testimonials.php',
                            );
                            
                        }
                        else if ( $page['name'] == 'FAQs' ) {
                            
                            $url = '';
                            
                            if ( $pageSection['name'] == 'General FAQs' ) {
                                $url = 'general_faqs.php';
                            }
                            else if ( $pageSection['name'] == 'Equipment Loan FAQs' ) {
                                $url = 'equipment_loan_faqs.php';
                            }
                            else if ( $pageSection['name'] == 'Working Capital FAQs' ) {
                                $url = 'working_capital_faqs.php';
                            }
                            else if ( $pageSection['name'] == 'Offer Financing FAQs' ) {
                                $url = 'offer_financing_faqs.php';
                            }
                            else {
                                $url = 'edit-page-section-fields.php?id=' . $pageSection['id'];
                            }
                            
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'],
                                'url'  => $url,
                            );
                            
                        }
                        else {
                            
                            $returnArrayTwo['children'][] = array (
                                'name' => $pageSection['name'] ,
                                'url'  => 'edit-page-section-fields.php?id=' . $pageSection['id'],
                            );
                            
                        }
    
                        
                    }
                    
                }
                $returnArrayTwo['children'][] = array (
                    'name' => 'Add Section',
                    'url'  => 'add-page-section.php?id=' . $page['id'],
                );
                $returnArrayOne[] = $returnArrayTwo;
                
            }
            
            return $returnArrayOne;
            
        }
        
    }
    
    function getPageSections ($pageId, $db)
    {
        
        $pageSections = $db->query ("select id, name from page_sections where page_id = " . $pageId);
        $pageSections = $pageSections->fetchAll (PDO::FETCH_ASSOC);
        
        if ( $pageSections ) {
            $returnArray = array ();
            foreach ( $pageSections as $pageSection ) {
                $returnArray[] = array (
                    'name' => $pageSection['name'],
                    'url'  => 'edit-page-section-fields.php?id=' . $pageSection['id'],
                );
            }
            return $returnArray;
        }
        
    }
    
    session_start ();
    
    ob_start ();
    
    define ("CLI", !isset($_SERVER['HTTP_USER_AGENT']));
    
    if ( !preg_match ('/^(.*)\/login\.php$/', $_SERVER['PHP_SELF']) && !preg_match ('/^(.*)\/logout\.php$/', $_SERVER['PHP_SELF']) ) {
        
        if ( CLI === false ) {
            if ( empty($_SESSION['admin_user']) ) {
                $_SESSION['redir'] = $_SERVER['REQUEST_URI'];
                header ('Location: login.php', true, 302);
                exit(0);
            }
            
            $admin_user = $db->query ('select * from admin_users where id = ' . (int)$_SESSION['admin_user']['id'] . ' limit 1')->fetch (PDO::FETCH_ASSOC);
            if ( !$admin_user || !$admin_user['active'] ) {
                unset($_SESSION['admin_user']);
                $_SESSION['redir'] = $_SERVER['REQUEST_URI'];
                header ('Location: login.php', true, 302);
                exit(0);
            }
        }
    }
    
    $required_js = array ();
    $required_css = array ();
    
    include DIR_APP_LIB. "vendor/kint/Kint.class.php";