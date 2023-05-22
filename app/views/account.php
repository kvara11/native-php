<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title><?php echo $meta->getTitle (); ?></title>
    <meta name="description" content="<?php echo $meta->getDescription (); ?>">
    <meta name="keywords" content="<?php echo $meta->getKeywords (); ?>">
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

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500italic,500,700'
          rel='stylesheet' type='text/css'>


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5MDSJFK');</script>
    <!-- End Google Tag Manager -->

</head>

<body class="landing-page account-page">

<div style="position:fixed;bottom:10px;right:20px;z-index:1000;">
    <img src="/img/chat-2-icon-sm.png" id="olarkit" style="cursor:pointer;">
</div>

<header class="header simple-header clear">
    <div class="wrapper">
        <a href="/" target="new"><img src="img/triton-logo.png" class="logo"/></a>
        <div class="landing-header-links">
            <a href="tel:8883193011">(888) 319-3011</a>
        </div>
    </div>
</header>

<main class="main" role="main">

    <section class="landing-top default"
             style="background-image: url(<?= ContentModel::getImageFolder ('3000x3000') . $localizedData->getBackgroundImage () ?>); background-size: cover;">
        <div class="wrapper">
            <h1><?php echo $page['Content']['headline']; ?></h1>
            <span class="landing-subhead"><?php echo $page['Content']['statement']; ?></span>
        </div>
    </section>

    <section class="intro-section account-activation-intro">
        <div class="text-on-white wrapper">
            <p>Hello<?php echo (isset($contact['first_name']) ? ' ' . $contact['first_name'] : ''); ?>,</p>
            <?php echo $welcome_msg; ?>
        </div>
        <a href="#" class="reveal-intro-btn">...</a>
    </section>

    <section class="thank-you-section center" style="display: none;">
        <div class="wrapper">
            <h2><?php echo $page['Content']['thank_you_message']; ?></h2>
        </div>
    </section>
    <section class="error-section center" style="display: none;">
        <div class="wrapper">
            <?php echo $page['Content']['already_active']; ?>
        </div>
    </section>
    <section class="application-section">
        <div class="wrapper">
            <h3 class="application-heading">Please verify the information below is correct, fill in any missing
                information, and activate your account to access your pre-qualified funding.</h3>
            <form class="form-standard clear landing-application" id="Top">
                <div class="trusted-logos desktop-logos">
                    <div><img src="/img/BBBa-dark.png"/></div>
                    <div><img src="/img/comodo-dark.png"/></div>
                    <div><img src="/img/NEFA-dark.png"/></div>
                </div>
                <input type="hidden" name="account_id" value="<?php echo $account['id']; ?>">
                <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">
                <input type="hidden" name="activation_code" value="<?php echo $activation_code; ?>">
                <div class="application-steps col33" id="steps-sidebar">
                    <ul>
                        <li class="name-selector selected">1. Name</li>
                        <li class="business-info-selector">2. Business Info</li>
                        <li class="submit-application-selector">3. ID Verification</li>
                    </ul>
                    <div class="fading-testimonials desktop-testimonials">
                        <blockquote>
                            <p class="testimonial-text">"I've been in the banking and finance industry a long time, and
                                Triton Capital exceeded my expectations in every way."</p>
                            <span class="quote-by">Mike Gilligan, Co-Founder, Burger Lounge</span>
                        </blockquote>
                        <blockquote>
                            <p class="testimonial-text">"Triton helped me get exactly what I needed and provided
                                top-of-the-line service."</p>
                            <span class="quote-by">Ronnie Carbone, President, R.C. Carbone Jr. Trucking, Inc.</span>
                        </blockquote>
                        <blockquote>
                            <p class="testimonial-text">"Thanks to Triton, we were able to get our equipment quickly and
                                easily. The loan process was much faster than other lenders we've used."</p>
                            <span class="quote-by">Jorge Torres, President, California Signs</span>
                        </blockquote>
                        <blockquote>
                            <p class="testimonial-text">"We needed a trusted financing partner, and that's what we
                                found."</p>
                            <span class="quote-by">Dr. Alfred Johnson, Owner, Johnson Medical Associates</span>
                        </blockquote>
                    </div>
                </div>
                <div class="col66 application-fields name">
                    <div>
                        <label>First name</label>
                        <input type="text" name="first_name"
                               value="<?php echo (isset($contact['first_name']) ? $contact['first_name'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Last name</label>
                        <input type="text" name="last_name"
                               value="<?php echo (isset($contact['last_name']) ? $contact['last_name'] : ''); ?>"/>
                    </div>
                    <div class="center type-of-funding">
                        <p><label>What type of funding are you looking for?</label></p>
                        <div class="loan-type-error-msg">Please select at least one</div>
                        <span class="funding-option">
                            <input type="checkbox" id="wc-loan" name="wc-loan" />
                            <label for="wc-loan">Working Capital</label>
                        </span>
                        <span class="funding-option">
                            <input type="checkbox" id="eq-loan" name="eq-loan" />
                            <label for="eq-loan">Equipment Loan</label>
                        </span>
                    </div>
                    <div>
                        <input type="button" value="Save & Continue" class="button"/>
                    </div>
                </div>
                <div class="col66 application-fields business-info" style="display: none;">
                    <div>
                        <label>Business name</label>
                        <input type="text" name="business_name"
                               value="<?php echo (isset($account['name']) ? $account['name'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Business Street Address</label>
                        <input type="text" name="business_address_street"
                               value="<?php echo (isset($account['shipping_address_street']) ? $account['shipping_address_street'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Business City</label>
                        <input type="text" name="business_address_city"
                               value="<?php echo (isset($account['shipping_address_city']) ? $account['shipping_address_city'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Business State</label>
                        <input type="text" name="business_address_state"
                               value="<?php echo (isset($account['shipping_address_state']) ? $account['shipping_address_state'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Business Zip</label>
                        <input type="text" name="business_address_postalcode"
                               value="<?php echo (isset($account['shipping_address_postalcode']) ? $account['shipping_address_postalcode'] : ''); ?>"/>
                    </div>
                    <!--<div>
                                <label>Business Country</label>
                                <input type="text" name="business_address_country" value="<?php /*echo (isset($account['shipping_address_country']) ? $account['shipping_address_country'] : ''); */ ?>"/>
                            </div>-->
                    <div>
                        <label>Office Phone</label>
                        <input type="text" name="office_phone"
                               value="<?php echo (isset($account['phone_office']) ? $account['phone_office'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Time In Business</label>
                        <input type="text" name="time_in_business"
                               value="<?php echo (isset($account['tib_c']) ? $account['tib_c'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Federal Tax ID</label>
                        <input type="text" name="fed_tax_id"
                               value="<?php echo (isset($account['fed_tax_id_c']) ? $account['fed_tax_id_c'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Total Employees</label>
                        <input type="text" name="total_employees"
                               value="<?php echo (isset($account['employees']) ? $account['employees'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Gross Revenue</label>
                        <input type="text" name="gross_revenue"
                               value="<?php echo (isset($account['annual_revenue']) ? $account['annual_revenue'] : ''); ?>"/>
                    </div>
                    <div>
                        <input type="button" value="Save & Continue" class="button"/>
                    </div>
                </div>
                <div class="col66 application-fields submit-application" style="display: none;">
                    <div>
                        <label>Job Title/Positon</label>
                        <input type="text" name="job_title"
                               value="<?php echo (isset($contact['title']) ? $contact['title'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>% of Ownership</label>
                        <input type="text" name="percentofownership_c"
                               value="<?php echo (isset($contact['percentofownership_c']) ? $contact['percentofownership_c'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Email Address</label>
                        <input type="text" name="email"
                               value="<?php echo (isset($contact['email']) ? $contact['email'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Cell Phone</label>
                        <input type="text" name="cell"
                               value="<?php echo (isset($contact['phone_mobile']) ? $contact['phone_mobile'] : ''); ?>"/>
                    </div>
                    <div>
                        <label>Social Security Number</label>
                        <input type="text" name="social_security_no"
                               value="<?php echo (isset($contact['ssn_c']) ? $contact['ssn_c'] : ''); ?>"/>
                        <a href="#" class="why-social-link">Why do you need this?</a>
                        <div class="social-text">
                            <p>Triton Capital requires a social security number to confirm your identity. Our credit
                                check is a soft pull and has no impact on your credit score.</p>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Activate My Account" class="button"/>
                    </div>
                </div>
            </form>

            <div class="mobile-logos-testimonials">
                <div class="trusted-logos">
                    <div><img src="/img/BBBa-dark.png"/></div>
                    <div><img src="/img/comodo-dark.png"/></div>
                    <div><img src="/img/NEFA-dark.png"/></div>
                </div>
                <div class="fading-testimonials">
                    <blockquote>
                        <p class="testimonial-text">"I've been in the banking and finance industry a long time, and
                            Triton Capital exceeded my expectations in every way."</p>
                        <span class="quote-by">Mike Gilligan, Co-Founder, Burger Lounge</span>
                    </blockquote>
                    <blockquote>
                        <p class="testimonial-text">"Triton helped me get exactly what I needed and provided
                            top-of-the-line service."</p>
                        <span class="quote-by">Ronnie Carbone, President, R.C. Carbone Jr. Trucking, Inc.</span>
                    </blockquote>
                    <blockquote>
                        <p class="testimonial-text">"Thanks to Triton, we were able to get our equipment quickly and
                            easily. The loan process was much faster than other lenders we've used."</p>
                        <span class="quote-by">Jorge Torres, President, California Signs</span>
                    </blockquote>
                    <blockquote>
                        <p class="testimonial-text">"We needed a trusted financing partner, and that's what we
                            found."</p>
                        <span class="quote-by">Dr. Alfred Johnson, Owner, Johnson Medical Associates</span>
                    </blockquote>
                </div>
            </div>
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

<div class="timeout-wrapper" style="display: none">
    <div class="timeout-message-container">
        <h2>Your session is about to end.</h2>
        <p>You've been inactive for a while. For your security we will automatically log you out in <span class="timeout-seconds-left"></span> seconds. You may stay signed in and resume your session, or log out.</p>
        <div class="session-buttons">
            <button class="button stay-signed-in">Stay Signed In</button>
            <button class="button log-out">Log Out</button>
        </div>
    </div>
</div>

<script>var URL_BASE = '<?php echo URL_BASE; ?>';</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.0/jquery.scrollTo.min.js"></script>
<script src="/<?php echo FOLDER_ASSETS; ?>/js/plugins.js"></script>
<script src="/<?php echo FOLDER_ASSETS; ?>/js/main.js"></script>
<script src="/<?php echo FOLDER_ASSETS; ?>/js/slick.min.js"></script>
<script>
    $('.timeout-wrapper').hide();
    function validateEmail(email) {
        var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return pattern.test(email);
    }
    function userActive() {
        $.get("ajax/user-active");
    }
    function killActiveUser() {
        //console.log('killActiveUser()');
        $.get("ajax/kill-user");
    }
    $('.name-selector').click(function () {
        $('.selected').removeClass('selected');
        $('.name-selector').addClass('selected');
        $('.application-fields').hide();
        $('.application-fields.name').fadeIn();
    });
    $('input[name="gross_revenue"]').keyup(function (e) {
        var costFormatted = format_currency($(this).val());
        $(this).val(costFormatted);
    });
    $('.business-info-selector,.application-fields.name input[type="button"]').click(function () {
        userActive();
        var errors = false;

        $(".application-fields.name").find(':input').each(function (index) {

            if ($(this).val() == '') {
                $(this).addClass('has-error');
                errors = true;
            } else {
                $(this).removeClass('has-error');
            }

            // force selection of loan type
            if ( ($(this).attr('name') == 'wc-loan') || ($(this).attr('name') == 'eq-loan') ) {
                if( ($('#wc-loan').is(':checked') === false) && ($('#eq-loan').is(':checked') === false) ) {
                    // add error class to label instead of input
                    $(this).next().addClass('has-error');
                    $('.loan-type-error-msg').show();
                    errors = true;
                }
                else {
                    $(this).next().removeClass('has-error');
                    $('.loan-type-error-msg').hide();
                }
            }
        });

        if (!errors) {
            $('.selected').removeClass('selected');
            $('.business-info-selector').addClass('selected');
            $('.application-fields').hide();
            $('.application-fields.business-info').fadeIn();

            $('.name-selector').addClass('complete');
            $.scrollTo($('#Top').offset().top-100,100);

            // silent submit of data to sugar
            activateSilentSave(1);
        } else {
            $('.name-selector').removeClass('complete');
        }
    });

    $('.submit-application-selector, .application-fields.business-info input[type="button"]').click(function () {
        userActive();
        var errors = false;

        $(".application-fields.business-info").find(':input').each(function (index) {

            if ($(this).val() == '') {
                $(this).addClass('has-error');
                errors = true;
            } else {
                $(this).removeClass('has-error');
            }
        });

        if (!errors) {

            $('.selected').removeClass('selected');
            $('.submit-application-selector').addClass('selected');
            $('.application-fields').hide();
            $('.application-fields.submit-application').fadeIn();

            $('.business-info-selector').addClass('complete');
            $.scrollTo($('#Top').offset().top-100,100);

            // silent submit of data to sugar
            activateSilentSave(2);
        } else {
            $('.business-info-selector').removeClass('complete');
        }
    });

    $('.landing-application').submit(function (e) {
        userActive();
        e.preventDefault();

        $.scrollTo($('#Top').offset().top-100,100);
        var errors = false;
        $(".application-fields.submit-application").find(':input[type="text"]').each(function (index) {
            var error = false;
            //console.log('{validating: ' + $(this).attr('name'));
            if ($(this).attr('name') == 'email') {

                if (!validateEmail($(this).val())) {
                    //console.log('Email: '+$(this).val());
                    //console.log($(this));
                    error = true;
                } else {
                    error = false;
                }
            }
            if ($(this).attr('name') == 'social_security_no') {
                //console.log($(this).val().length);
                if($(this).val().length < 11) {
                    //console.log('ssn error');
                    error = true;
                }
            }
            if ( ($(this).attr('name') == 'wc-loan') || ($(this).attr('name') == 'eq-loan') ) {
                if( ($('#wc-loan').is(':checked') === false) && ($('#wc-loan').is(':checked') === false) ) {
                    error = true;
                }
            }

            if ($(this).val() == '') {
                //console.log('error detected: ' + $(this).val());
                error = true;
            }
            if(error){
                errors = true;
                $(this).addClass('has-error');
                //console.log('has error! }')
            } else {
                $(this).removeClass('has-error');
                //console.log(' }')
            }
        });

        if (!errors) {
            // disable the submit button after first click
            $('.landing-application input[type=submit]').attr('disabled', true);

            $('.submit-application-selector').addClass('complete');
            $('.application-fields.business-info').fadeOut();

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/account/submit',
                data: formData,
                success: function (response) {

                    // re-enable the submit button
                    $('.landing-application input[type=submit]').attr('disabled', false);

                    //console.log(response.api_response.code);
                    if(response.api_response.code == 1005){
                        $('.intro-section').hide();
                        $('.application-section').hide();
                        $('.error-section').fadeIn();
                    } else {
                        $('.intro-section').hide();
                        $('.application-section').hide();
                        $('.thank-you-section').fadeIn();
                    }
                },
            });
            $.scrollTo($('#Top').offset().top-100,100);
        } else {
            $('.submit-application-selector').removeClass('complete');
        }
    });

    $('.fading-testimonials').slick({
        dots: false,
        arrows: false,
        infinite: true,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 6500
    });
    $('input[name="office_phone"]').mask('000-000-0000');
    $('input[name="cell"]').mask('000-000-0000');
    $('input[name="social_security_no"]').mask('000-00-0000');
    $('input[name="fed_tax_id"]').mask('00-0000000');

    //check user for inactivity
    var param = '';
    var checkUser = function() {
        //your jQuery ajax code
        var p1 = '<?= $params['v1'] ?>';
        var p2 = '<?= $params['v2'] ?>';

        if(p1 && p2){
            param = p1 + '-' + p2;
        }
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/ajax/check-user',
            success: function (response) {
                //console.log('ajax/check-user');
                //console.log(response);
                if(response.logout)
                {
                    //show timeout overlay & start timer.
                    /*<button class="button stay-signed-in">Stay Signed In</button>
                    <button class="button log-out">Log Out</button>*/
                    clearInterval(mainTimer);
                    $('.timeout-wrapper').show();
                    id = setInterval(function() {
                        counter--;
                        if(counter < 0) {
                            clearInterval(id);
                            killActiveUser();
                            window.location.replace('/activate/' + param +'?msg=inactive');

                        } else {
                            $('.timeout-seconds-left').text(counter.toString()) ;
                        }
                    }, 1000);

                }
            },
        });
    };
    var counter = 45;
    var id;
    var interval = 20000; // where X is your every X minutes
    var mainTimer = setInterval(checkUser, interval);
    checkUser();
    $('.button.stay-signed-in').click(function (e) {
        userActive();
        $('.timeout-wrapper').hide();
        clearInterval(id);
        counter = 45;
        mainTimer = setInterval(checkUser, interval);
    });
    $('.button.log-out').click(function (e) {
        clearInterval(id);
        killActiveUser();
        window.location.replace('/activate/' + param +'?msg=inactive');
    });
    $( "input" ).focus(function() {
        // Check input( $( this ).val() ) for validity here
        userActive();
    });


    // MAKE APPLICATION STEPS SIDEBAR STICKY ON SCROLL
    // Cache selectors outside callback for performance.
   /*var $window = $(window),
       $stickyEl = $('#steps-sidebar'),
       elTop = $stickyEl.offset().top;

   $window.scroll(function() {
        $stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);
        //console.log('test');
    }); */

    /* ANOTHER ATTEMPT
    $(window).scroll(function() {
        //var sidebar = $('#steps-sidebar')
        var scroll = $(window).scrollTop();

        if (scroll >= 500) {
            $("#steps-sidebar").addClass("sticky");
        }
    }); */

    var activateSilentSave = function(step) {
        if (step === 1) {
            var data = {
                step: 1,
                account_id: $("input[name='account_id']").val(),
                first_name: $("input[name='first_name']").val(),
                last_name: $("input[name='last_name']").val(),
                wc_loan: $("#wc-loan").is(':checked'),
                eq_loan: $("#eq-loan").is(':checked'),
            }
        }
        else if (step === 2) {
            var data = {
                step: 2,
                account_id: $("input[name='account_id']").val(),
                account_name: $("input[name='business_name']").val(),
                address: $("input[name='business_address_street']").val(),
                city: $("input[name='business_address_city']").val(),
                state: $("input[name='business_address_state']").val(),
                zip: $("input[name='business_address_postalcode']").val(),
                phone: $("input[name='office_phone']").val(),
                tib: $("input[name='time_in_business']").val(),
                ein: $("input[name='fed_tax_id']").val(),
                employees: $("input[name='total_employees']").val(),
                revenue: $("input[name='gross_revenue']").val(),
            }
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: data,
            url: '/account/silent-save',
            success: function (response) {
                //console.log(response);
                // this is silent, no need to interact with UI
            },
        });
    }

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