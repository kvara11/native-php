<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $meta->getTitle(); ?></title>
        <meta name="description" content="<?php echo $meta->getDescription(); ?>">
        <meta name="keywords" content="<?php echo $meta->getKeywords(); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL_BASE; ?>apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL_BASE; ?>apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL_BASE; ?>apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL_BASE; ?>apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL_BASE; ?>apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL_BASE; ?>apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL_BASE; ?>apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL_BASE; ?>apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL_BASE; ?>apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="<?php echo URL_BASE; ?>favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo URL_BASE; ?>favicon-194x194.png" sizes="194x194">
        <link rel="icon" type="image/png" href="<?php echo URL_BASE; ?>favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?php echo URL_BASE; ?>android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="<?php echo URL_BASE; ?>favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="<?php echo URL_BASE; ?>manifest.json">
        <meta name="apple-mobile-web-app-title" content="Triton Capital">
        <meta name="application-name" content="Triton Capital">

        <?php $this->outputRequiredCSS(); ?>

        <script src="/<?php echo FOLDER_ASSETS; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        
        <script src="/assets/js/jquery-1.11.2.min.js"></script>


        <link rel="stylesheet" href="/<?php echo FOLDER_ASSETS; ?>/css/normalize.min.css">
        <link rel="stylesheet" href="/<?php echo FOLDER_ASSETS; ?>/js/jquery-ui-1.11.4.custom/jquery-ui.min.css">
        <link rel="stylesheet" href="/<?php echo FOLDER_ASSETS; ?>/js/jquery-ui-1.11.4.custom/jquery-ui.structure.min.css">
        
        <!-- Slick Slider Styles -->
        <link rel="stylesheet" type="text/css" href="/<?php echo FOLDER_ASSETS; ?>/css/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/<?php echo FOLDER_ASSETS; ?>/css/slick/slick-theme.css"/>

        <link rel="stylesheet" href="/<?php echo FOLDER_ASSETS; ?>/css/main.css?v=05042017">
        
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500italic,500,700' rel='stylesheet' type='text/css'>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56c7728efd91b45c"></script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5MDSJFK');</script>
        <!-- End Google Tag Manager -->

        <script>
            $(document).ready(function() {
               olark('api.box.hide');
                olark('api.box.onHide', function() {
                    $('#olarkit').fadeIn();
                });
                olark('api.box.onShrink', function() {
                   olark('api.box.hide');
                });
                olark('api.box.onExpand', function() {
                   $('#olarkit').hide();
                });
               $('#olarkit').click(function() {
                   olark('api.box.expand');
               });
            });
        </script>

        <meta name="google-site-verification" content="CzrYLvRFHEnzLy3U-foIzDfgeXy_Xvlr1uAafSNEHGo" />

    </head>

    <body class="landing-template">
            <div style="position:fixed;bottom:10px;right:20px;z-index:1000;">
                <img src="/img/chat-2-icon-sm.png" id="olarkit" style="cursor:pointer;">
            </div>
            <header class="landing-header clear">
                <div class="wrapper">
                    <a href="/"><img src="/img/triton-logo-white-shadow.png" class="logo" /></a>
                    <a href="tel:8778221333" class="phone">877.822.1333</a>
                    
                </div>
            </header>

            <div class="bodywrap">