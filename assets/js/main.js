//$('.main-nav').hide();

$('.nav-toggle').click(function () {
    $('.main-nav').slideToggle(200);
    $(this).toggleClass('nav-open');
    $('.main-nav').delay(500).toggleClass('open');
    // if ($('.header nav').height() == 0) {
    //    $('.header nav').css('height', 'auto');
    //    // $('.header nav').animate({height: "auto"},100);
    // }
    // else if ($('.header nav').height() == "auto") {
    //    $('.header nav').animate({height: "0px"},100);
    // }
    return false;
});


// STICKY HEADER
$(window).scroll(function () {
    if ($(this).scrollTop() > 18) {
        $('.header').addClass("sticky");
        $('.bodywrap').addClass("sticky-active");
        //$('.main-nav').removeClass('not-scrolling');
    } else {
        $('.header').removeClass("sticky");
        $('.bodywrap').removeClass("sticky-active");
        //$('.main-nav').addClass('not-scrolling');
    }
});

//Toggles
$('.detail-text').hide();

// REUSABLE SHOW/HIDE TOGGLE
$('.toggle-btn').click(function (e) { //the button class to use
    e.preventDefault();
    $(this).parent().find('.toggle-content').slideToggle();
    $(this).toggleClass('toggle-open');
});

// Home Banner
$('.home-banner-form .select-results').hide();

$('.home-banner-form .options .select-option-radio').click(function (e) { //the button class to use
    e.preventDefault();
    $(this).addClass('selected');
    $('.home-banner-form .options').delay(250).fadeOut(400);
    $('.home-banner-text').delay(250).fadeOut(400, function () {
        $('.home-banner-form').addClass('results-showing');
        $('.home-banner-form .select-results').fadeIn(700);
    });

    var selectedOption = $('#' + $(this).attr('for')).val();
    var pretext = '', title = '', statement = '', link = '', linkText = '', linkTitle = '';

    if (selectedOption == 'Business Equipment' || selectedOption == 'Purchasing Technology') {

        pretext += 'You\u0027d like a loan for';
        title += 'an Equipment Loan';
        link += '/equipment-loans';
        linkTitle += 'equipment loans';

    } else if (selectedOption == 'Vendor Financing') {

        pretext += 'You\u0027d like to be set up for';
        title += 'Vendor Financing';
        link += '/offer-financing';
        linkTitle += 'vendor financing platform';

    } else {

        pretext += 'You\u0027d like a loan for';
        title += 'a Working Capital loan';
        link += '/working-capital';
        linkTitle += 'working capital';

    }

    $('.select-results span').text(pretext);
    $('.select-results h3').text(selectedOption);
    $('.select-results p').text('We\'d recommend ' + title);
    $('.select-results .learn-more-link').attr('href', link);
    $('.select-results .learn-more-link').text('Learn more about Triton\'s ' + linkTitle);

});
$('.home-banner-form .select-results .back-btn').click(function (e) { //the button class to use
    e.preventDefault();
    $('.home-banner-form .select-results').hide();
    $('.home-banner-form .options').fadeIn();
    $('.home-banner-form').removeClass('results-showing');
    $('.home-banner-text').fadeIn();
    $('.options label.selected').removeClass('selected');
});

// Working Capital - Qualify Form
$('.loan-type-message').on('click', '.loan-info-link', function (e) {

    e.preventDefault();
    $('.qualify-steps-numbers').hide();
    $('#' + loan_type + '-loan-table').fadeIn();
    $('.qualified-message-cta').addClass('table-open');

});

$('.qualified-message-cta').on('click', '.loan-info-table .close-btn', function (e) {

    e.preventDefault();
    $('.loan-info-table').hide();
    $('.qualified-message-cta').removeClass('table-open');

});

//FAQs toggle
$('.equipment-loans-faqs').hide();
$('.working-capital-faqs').hide();
$('.offer-financing-faqs').hide();
$('.equipment-loans-toggle').click(function (e) { //the button class to use
    e.preventDefault();
    $('.equipment-loans-toggle').addClass('selected');
    $('.working-capital-toggle').removeClass('selected');
    $('.general-toggle').removeClass('selected');
    $('.offer-financing-toggle').removeClass('selected');
    $('.offer-financing-faqs').hide();
    $('.working-capital-faqs').hide();
    $('.general-faqs').hide();
    $('.equipment-loans-faqs').fadeIn();
});
$('.working-capital-toggle').click(function (e) { //the button class to use
    e.preventDefault();
    $('.working-capital-toggle').addClass('selected');
    $('.equipment-loans-toggle').removeClass('selected');
    $('.general-toggle').removeClass('selected');
    $('.offer-financing-toggle').removeClass('selected');
    $('.offer-financing-faqs').hide();
    $('.equipment-loans-faqs').hide();
    $('.general-faqs').hide();
    $('.working-capital-faqs').fadeIn();
});
$('.general-toggle').click(function (e) { //the button class to use
    e.preventDefault();
    $('.general-toggle').addClass('selected');
    $('.working-capital-toggle').removeClass('selected');
    $('.equipment-loans-toggle').removeClass('selected');
    $('.offer-financing-toggle').removeClass('selected');
    $('.offer-financing-faqs').hide();
    $('.working-capital-faqs').hide();
    $('.equipment-loans-faqs').hide();
    $('.general-faqs').fadeIn();
});
$('.offer-financing-toggle').click(function (e) { //the button class to use
    e.preventDefault();
    $('.offer-financing-toggle').addClass('selected');
    $('.working-capital-toggle').removeClass('selected');
    $('.equipment-loans-toggle').removeClass('selected');
    $('.general-toggle').removeClass('selected');
    $('.working-capital-faqs').hide();
    $('.general-faqs').hide();
    $('.equipment-loans-faqs').hide();
    $('.offer-financing-faqs').fadeIn();
});


// working capital form
var answers = [];
var url = '', url_top = '';
var gross_revenue, loan_ceiling_num, loan_type;

$('#back-step').click(function (e) {

    $('.qualify-steps-numbers').show();

    var current_index = $('.qualify-steps-content:visible, .qualified-message-cta:visible').data('steps-index');

    if (parseInt(current_index) != 1) {

        if (parseInt(current_index) == 2) {

            $(this).hide();
            $('#step-1-continue').attr('checked', false)

        }

        $('.qualify-steps-content:visible, .qualified-message-cta:visible').hide();
        $('.qualify-steps-numbers .steps-wrap a.active').removeClass('active');
        $('#qualify-step-' + (current_index - 1) + '-link').addClass('active');
        $('.qualify-steps-content[data-steps-index="' + (current_index - 1) + '"], .qualified-message-cta[data-steps-index="' + (current_index - 1) + '"]').fadeIn();
    }

});


// Equipment Loans
$('.equipment-loans #qualify-step-1-content input[type="text"]').keypress(function (e) {
    if (e.which == 13) {

        e.preventDefault();

        if (parseInt($('#equipment_cost').val().replace("$", "").split(",").join("")) >= 1000) {

            $('.equipment_cost_error').hide();

            $(this).parent().parent().hide();
            $('#qualify-step-2-content').fadeIn();

            $('#qualify-step-1-link').removeClass('active');
            $('#qualify-step-2-link').addClass('active');

            $('#back-step').fadeIn();

        } else {

            $('.equipment_cost_error').show();

        }

    }
});

$('.equipment-loans #qualify-step-1-content .options input[type="radio"]').click(function (e) {

    if (parseInt($('#equipment_cost').val().replace("$", "").split(",").join("")) >= 1000) {

        $('.equipment_cost_error').hide();

        $(this).parent().parent().hide();
        $('#qualify-step-2-content').fadeIn();

        $('#qualify-step-1-link').removeClass('active');
        $('#qualify-step-2-link').addClass('active');

        $('#back-step').fadeIn();

    } else {

        $('.equipment_cost_error').show();

    }

});

$('.equipment-loans #qualify-step-2-content input[type="text"]').keypress(function (e) {

    if (e.which == 13) {

        e.preventDefault();

        if ($('#equipment_name').val() != '') {

            $('.equipment_name_error').hide();

            $('.qualify-form').attr('action', 'https://apply.tritoncptl.com/');

            $('.qualify-form').submit();

        } else {

            $('.equipment_name_error').show();

        }

    }

});

$('.equipment-loans .qualify-form input[type="submit"]').click(function (e) {

    e.preventDefault();

    if ($('#equipment_name').val() != '') {

        $('.equipment_name_error').hide();

        $('.qualify-form').attr('action', 'https://apply.tritoncptl.com/');

        $('.qualify-form').submit();

    } else {

        $('.equipment_name_error').show();

    }

});
// End Equipment Loans

// Working Capital
$('.working-capital #qualify-step-1-content .options input[type="text"]').keypress(function (e) {

    if (e.which == 13) {

        e.preventDefault();

        if (parseInt($('#gross_revenue').val().replace("$", "").split(",").join("")) >= 20000) {

            $('.revenue_error').hide();

            $(this).parent().parent().hide();
            $('#qualify-step-2-content').fadeIn();

            answers["gross_revenue"] = $('#gross_revenue').val();

            $('#qualify-step-1-link').removeClass('active');
            $('#qualify-step-2-link').addClass('active');

            $('#back-step').fadeIn();

        } else {

            $('.revenue_error').show();

        }

    }

});

$('.working-capital #qualify-step-1-content .options input[type="radio"]').click(function (e) {

    if (parseInt($('#gross_revenue').val().replace("$", "").split(",").join("")) >= 20000) {

        $('.revenue_error').hide();

        $(this).parent().parent().hide();
        $('#qualify-step-2-content').fadeIn();

        answers["gross_revenue"] = $('#gross_revenue').val();

        $('#qualify-step-1-link').removeClass('active');
        $('#qualify-step-2-link').addClass('active');

        $('#back-step').fadeIn();

    } else {

        $('.revenue_error').show();

    }

});

$('.working-capital #qualify-step-2-content .options input[type="radio"]').click(function (e) {

    $(this).parent().parent().hide();
    $('#qualify-step-3-content').fadeIn();

    answers["how_soon"] = $(this).val().toLowerCase();

    $('#qualify-step-2-link').removeClass('active');
    $('#qualify-step-3-link').addClass('active');

});

$('.working-capital #qualify-step-3-content .options input[type="radio"]').click(function (e) {

    $(this).parent().parent().hide();

    $('#qualify-step-4-content').fadeIn();

    answers["profitable"] = $(this).val();

    $('#qualify-step-3-link').removeClass('active');
    $('#qualify-step-4-link').addClass('active');

});

$('.working-capital #qualify-step-4-content .options input[type="radio"]').click(function (e) {

    $(this).parent().parent().hide();
    $('.qualify-steps-numbers').hide();
    $('#qualify-step-5-content').fadeIn();

    answers["fico"] = $(this).val();

    // Bridge Loan
    /*if (answers["fico"] == '< 600' ||
        answers["how_soon"] == '1 - 4 days' ||
        answers["how_soon"] == '7 - 10 days' ||
        (answers["how_soon"] == '10-30 days' && answers["profitable"] == 'No') ||
        (answers["how_soon"] == 'Greater than 30 Days' && answers["profitable"] == 'No')) {*/

        var ranges = [];
        ranges["750 - 800"] = [.09, .12];
        ranges["700 - 750"] = [.09, .11];
        ranges["650 - 700"] = [.08, .10];
        ranges["600 - 650"] = [.06, .09];
        ranges["< 600"] = [.05, .07];

        gross_revenue = parseInt(answers["gross_revenue"].replace("$", "").split(",").join(""));

        var loan_floor = (parseInt(gross_revenue * ranges[answers["fico"]][0])).toString().slice(0, -3);
        var loan_ceiling = (parseInt(gross_revenue * ranges[answers["fico"]][1])).toString().slice(0, -3);
        loan_ceiling_num = parseInt(gross_revenue * ranges[answers["fico"]][1]);
        var loan_range = "$" + loan_floor + "K - $" + loan_ceiling + "K";
        if(parseInt(loan_ceiling) > 500){
            loan_ceiling = "500";
            loan_range = "$" + loan_ceiling + "K";
            loan_ceiling_num = 500000;
        }



        var message = '<h1>Your pre-qualified amount is ' + loan_range + ' with a 6-24 month term.<a href="javascript:void(0);" class="loan-info-link more-info-icon">?</a><br />Money can be wired to you in 1-2 business days.</h1>';

        url = 'https://apply.tritoncptl.com/working-capital';
        url_top = 'working-capital';
        loan_type = 'bridge';

    var mailtoLink ="mailto:info@tritoncptl.com?subject=Working Capital Inquiry&body=Gross Revenue: " + answers['gross_revenue'] + " %0A Need funding in: " + answers['how_soon'] + " %0A Profitable?: " + answers['profitable'] + " %0A Credit Score: " + answers['fico'] + " %0A Pre-qualified amount: " + loan_range;
    $('#emailCTABtn').attr('href', mailtoLink);
    $('.loan-type-message').html(message);

});

$('.working-capital .qualify-form input[type="submit"]').click(function (e) {
    e.preventDefault();

    $('.qualify-form').attr('action', base_url + url_top);

    $('#loan_amount').val(loan_ceiling_num);
    $('#loan_type').val(loan_type);

    $('.qualify-form').submit();

});

// end working capital form
$(function () {
    $('#olarkit').click(function () {

        olark('api.box.expand');

    });
});




// LOAN LANDING PAGES
var format_currency = function (num) {
    var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
    if (str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ",") {
            output.push(str[j]);
            if (i % 3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return ("$" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};

var calcPaymentsCustom = function (amount, type) {
    var amt;
    switch (type) {
        case 'bridge':
            var termLength = 36;
            var loanAmount = amount;
            var defaultRate = 10;
            var monthlyRate = defaultRate / 100 / 12;
            var paymentAmount = (monthlyRate + monthlyRate / (Math.pow(1 + monthlyRate, termLength) - 1)) * loanAmount;

            // working capital payments are twice monthly

            paymentAmount = paymentAmount / 2;


            amt = paymentAmount.toFixed(2);
            break;
        case 'term':
            var princ = amount;
            var term = 60;
            var intr = 13 / 1200;
            amt = (princ * intr / (1 - (Math.pow(1 / (1 + intr), term)))).toFixed(2);
            break;
    }
    return format_currency(amt);
};

var calcPaymentsOffer = function (amount, term) {
    var princ = amount;
    var intr = 6.5 / 1200;
    var amt = (princ * intr / (1 - (Math.pow(1 / (1 + intr), term)))).toFixed(2);
    return format_currency(amt);
};

//moved to /pages/landingpages.js

$(function () {
    $('#phone-field input[type="text"]').mask('000-000-0000');
    $('#phone-field').hide();
    $('#contact-method').change(function () {
        var selected = $('#contact-method option:selected').val();
        switch (selected) {
            case 'email':
                $('#phone-field').hide();
                break;

            case 'phone':
                $('#phone-field > label').text('Phone number');
                $('#phone-field').show();
                break;

            case "sms":
                $('#phone-field > label').text('Mobile phone number');
                $('#phone-field').show();
                break;
        }
    });


});


// -- ACCOUNT ACTIVATION PAGES

// - activate.php
$('.get-started-btn').click(function (e) {
    e.preventDefault();
    $('.activation-welcome').fadeOut(400);
    $('.landing-login-top').addClass('step2');
    $('.activation-login-wrapper').delay(420).fadeIn(600);
});
$('.landing-back-btn').click(function (e) {
    e.preventDefault();
    $('.activation-login-wrapper').fadeOut(300);
    $('.activation-welcome').delay(300).fadeIn(500);
    $('.landing-login-top').removeClass('step2');
});

$('.account-activation-intro').delay(6000).animate({height: "150"}, 600);
$('.reveal-intro-btn').delay(6600).fadeIn(600);
$('.reveal-intro-btn').click(function (e) {
    e.preventDefault();
    $('.account-activation-intro').css({height: "auto"}, 800);
    $('.reveal-intro-btn').fadeOut(200);
});

$('.helper-link').click(function (e) {
    e.preventDefault();
    $('.helper-text').show();
});
$('.helper-close-link').click(function (e) {
    e.preventDefault();
    $('.helper-text').fadeOut();
});

$('.why-social-link').click(function (e) {
    e.preventDefault();
    $('.social-text').toggle();
});




