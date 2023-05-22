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

        <script src="/<?php echo FOLDER_ASSETS; ?>/js/vendor/modernizr-2.6.2.min.js"></script>

        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

        <link rel="stylesheet" href="/<?php echo FOLDER_ASSETS; ?>/css/normalize.min.css">

        <!-- Slick Slider Styles -->
        <link rel="stylesheet" type="text/css" href="/<?php echo FOLDER_ASSETS; ?>/css/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/<?php echo FOLDER_ASSETS; ?>/css/slick/slick-theme.css"/>

        <link rel="stylesheet" href="/<?php echo FOLDER_ASSETS; ?>/css/main.css">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500italic,500,700' rel='stylesheet' type='text/css'>



        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5MDSJFK');</script>
        <!-- End Google Tag Manager -->

        <style type="text/css">
            ::-webkit-input-placeholder { color: #fff; opacity: .6 !important; font-weight: 300; text-transform: none; }
            :-moz-placeholder { color: #fff; opacity: .6; font-weight: 300; text-transform: none; }
            ::-moz-placeholder {color: #fff; opacity: .6; font-weight: 300; text-transform: none; }
            :-ms-input-placeholder {color: #fff; opacity: .6; font-weight: 300; text-transform: none; }

            .landing-login-top{
                background-image: url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>);
                background-image: url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>), rgba(45,57,67,.8); /* For browsers that do not support gradients */
                background-image: -webkit-linear-gradient(rgba(45,57,67,1),rgba(45,57,67,.3)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>); /*Safari 5.1-6*/
                background-image: -o-linear-gradient(rgba(45,57,67,1),rgba(45,57,67,.3)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>); /*Opera 11.1-12*/
                background-image: -moz-linear-gradient(rgba(45,57,67,1),rgba(45,57,67,.3)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>); /*Fx 3.6-15*/
                background-image: linear-gradient(rgba(45,57,67,1), rgba(45,57,67,.3)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>); /*Standard*/
            }
            .landing-login-top.step2{
                background-image: url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>);
                background-image: url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>), rgba(45,57,67,.8);
                background-image: -webkit-linear-gradient(rgba(45,57,67,1),rgba(45,57,67,.8)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>);
                background-image: -o-linear-gradient(rgba(45,57,67,1),rgba(45,57,67,.8)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>);
                background-image: -moz-linear-gradient(rgba(45,57,67,1),rgba(45,57,67,.8)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>);
                background-image: linear-gradient(rgba(45,57,67,1), rgba(45,57,67,.8)), url(<?=ContentModel::getImageFolder ('3000x3000').$localizedData->getBackgroundImage()?>);
            }

        </style>

    </head>

    <body class="fullscreen-bg landing-login">

            <div style="position:fixed;bottom:10px;right:20px;z-index:1000;">
                <img src="/img/chat-2-icon-sm.png" id="olarkit" style="cursor:pointer;">
            </div>

        <header class="header simple-header clear">
            <div class="wrapper">
                <a href="/" target="new"><img src="/img/triton-logo.png" class="logo" /></a>
                <div class="landing-header-links">
                    <a href="tel:8883193011">(888) 319-3011</a>
                </div>
            </div>
        </header>

        <main class="main" role="main">

            <section class="landing-login-top login-top-default">
                <div class="landing-form-wrapper">

                    <?php /*
                    // activate maintenance mode
                    <style>
                      h1 { font-size: 50px; }
                      article {font: 20px Helvetica, sans-serif; color: #fff; display: block; text-align: left; width: 650px; margin: 0 auto; }
                      a.maint:link, a.maint:visited, a.maint:hover { color: #3CC6A5; text-decoration: none; }
                    </style>

                    <article>
                        <h1>We&rsquo;ll be back soon!</h1>
                        <div>
                            <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a class="maint" href="mailto:info@tritoncptl.com">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
                            <p>&mdash; Triton Capital</p>
                        </div>
                    </article>
                    */ ?>


                    <div class="activation-welcome">
                        <p><strong>Hi <?=ucfirst($params['v1'])?>,</strong></p>
                        <?= $localizedData->getWelcomeMessage(); ?>
                        <a href="#" class="button get-started-btn">Get Started</a>
                    </div>
                    <div class="activation-login-wrapper" style="<?php (count($errors) > 0) ? 'display:block;' : '' ?>">
                        <a href="javascript:void(0);"class="landing-back-btn"><img src="/img/white-arrow-left.png"></a>
                        <h2>Please enter your account number and activation code.</h2>
                        <form class="form-standard activation-login-form" action="/account" method="post">
                            <?php
                                if (count($errors) > 0) {
                                    echo '<div class="error">';
                                    foreach ($errors as $error) {
                                        echo '<p>' . $error . '</p>';
                                    }
                                    echo '</div>';
                                }
                            ?>
                            <div>
                                <label>Account number:</label>
                                <input type="tel" name="account_number" placeholder="Enter your 16 digit account number" />
                                <a href="#" class="helper-link">Where do I find this?</a>
                            </div>
                            <div>
                                <label>Activation code:</label>
                                <input type="text" name="activation_code" placeholder="Enter your 8 digit activation code" />
                                <a href="#" class="helper-link">Where do I find this?</a>
                            </div>
                            <div>
                                <input type="submit" value="Access My Account" class="button"/>
                            </div>

                        </form>
                        <div class="trusted-logos">
                            <div><img src="/img/BBBa-.png" /></div>
                            <div><img src="/img/comodo.png"/></div>
                            <div><img src="/img/NEFA.png" /></div>
                        </div>
                        <div class="center helper-text">
                            <a href="#" class="helper-close-link">close</a>
                            <p>Your account number and confirmation code are located on the mail piece you received from Triton Capital, as shown below.</p>
                            <img src="/img/mailer-demo.jpg" alt="Mailer Example" />
                            <p>If you have any questions, feel free to call us at <a href="tel:8883193011">(888) 319-3011</a>.</p>
                        </div>
                    </div>

                </div>
            </section><!-- landing-login-top -->


            <section class="landing-login-testimonial">
                <div class="wrapper">
                    <div class="testimonial-wrap clear">
                        <div class="testimonial-img-frame" style="background-image: url('<?php echo RESOURCE_ARTICLE_IMAGE_FOLDER . $testimonial['image']; ?>')"></div>
                        <blockquote>
                            <p class="testimonial-text">"<?php echo $testimonial['quote']; ?>"</p>
                            <span class="quote-by"><?php echo $testimonial['name']; ?>, <?php echo $testimonial['title']; ?>, <?php echo $testimonial['company']; ?></span>
                        </blockquote>
                    </div>
                    <a href="/success-stories" target="_blank" class="learn-more-link blue">Read More Success Stories</a>
                </div>
            </section>

            <section class="lowest-payment-callout">
                <div class="wrapper">
                    <img src="/img/lowest-payment-badge-white.png" class="lowest-payment-badge" />
                    <div class="textwrap">
                        <h2>Lowest Payment Guarantee</h2>
                        <p>You'll always get the best price - we guarantee it.</p>
                        <a href="/lowest-payment" target="new" class="learn-more-link white">Find Out More</a>
                    </div>
                </div>
            </section>

            <section class="landing-login-featured-in">
                <div class="clear wrapper">
                    <h2>At Triton Capital, we specialize in small business funding, as featured in:</h2>
                    <img src="/img/bloomberg-logo-white.png" class="featured-in-logo">
                    <img src="/img/new-york-times-logo-white.png" class="featured-in-logo">
                    <img src="/img/cnbc-logo-white.png" class="featured-in-logo">
                    <img src="/img/forbes-logo-white.png" class="featured-in-logo">
                    <img src="/img/entrepreneur-logo-white.png" class="featured-in-logo">
                </div>
            </section>

        </main>

        <footer class="footer">
            <div class="wrapper clear app-footer">
                <div class="landing-footer-nav">
                    <ul>
                        <li><a href="/about" target="new">About Us</a></li>
                        <li><a href="/success-stories" target="new">Success Stories</a></li>
                        <li><a href="/faqs" target="new">FAQs</a></li>
                        <li><a href="/privacy-policy" target="new">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col33">
                    <div class="footer-contact-wrapper">
                        <img src="/img/triton-logo-white.png" class="footer-logo">
                    </div>
                </div>
                <div class="col33">
                    &nbsp;
                </div>
                <div class="col33 rights">
                    Copyright <?php echo date('Y'); ?>. All rights reserved.<br>
                    CFLL No. 60DBO42128
                </div>
                <div class="clear"></div>
            </div>
        </footer>

        <script>var URL_BASE = '<?php echo URL_BASE; ?>';</script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="/<?php echo FOLDER_ASSETS; ?>/js/plugins.js"></script>
        <script src="/<?php echo FOLDER_ASSETS; ?>/js/main.js"></script>
            <script>
                $(function () {
                    $('input[name="account_number"]').mask('0000-0000-0000-0000');
                    $('input[name="activation_code"]').keypress(function (e) {
                        var regex = new RegExp("^[a-zA-Z0-9]+$");
                        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                        if (regex.test(str)) {
                            return true;
                        }
                        e.preventDefault();
                        return false;
                    });

                <?php if(count($errors)> 0) { ?>
                    $('.activation-welcome').fadeOut(400);
                    $('.landing-login-top').addClass('step2');
                    $('.activation-login-wrapper').delay(420).fadeIn(600);
                    <?php } ?>
                });
            </script>
            <!-- begin olark code -->
            <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
                    f[z]=function(){
                        (a.s=a.s||[]).push(arguments)};var a=f[z]._={
                    },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
                        f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
                        0:+new Date};a.P=function(u){
                        a.p[u]=new Date-a.p[0]};function s(){
                        a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
                        hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
                        return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
                        b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
                        b.contentWindow[g].open()}catch(w){
                        c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
                        var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
                        b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
                    loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
                /* custom configuration goes here (www.olark.com/documentation) */
                olark.identify('9735-628-10-7109');/*]]>*/</script><noscript><a href="https://www.olark.com/site/9735-628-10-7109/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
            <!-- end olark code -->
            <style>
                button.olark-launch-button {
                    display : none !important;
                }
            </style>
    </body>
</html>