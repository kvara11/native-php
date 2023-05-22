//Set variables for funding type and set default amounts from $50k
var funding_type = "equipment";
var term_scope = "/month";
var term_length = 60;
var fincanceType = "Equipment Financing";
var funding_data = chooseCalcType(50000, funding_type);
function modEstimateAmount(startAmount) {
    if (startAmount > 250000) {
        $("#slider").slider("option", "max", startAmount);
    }
    $("#slider").slider("value", startAmount);
    funding_data = chooseCalcType(startAmount, funding_type);
    $("#eq-amount").val(format_currency(startAmount).replace("$", ""));
    $('.eq-loan-details').show();
    $(".slideout-details td.amount-to-finance").text(format_currency(startAmount));
    $('div.payment-amount span.payment').text(funding_data + term_scope);
    $(".slideout-details td span.month-rate").text(funding_data);
};

//Handles the select list for loan types
$('#funding_type').change(function (e) {
    e.preventDefault();
    funding_type = $(this).val();
    term_scope = "/month";
    term_length = 60;
    fincanceType = "Equipment Financing";
    if(funding_type != "equipment"){
        term_scope = "/twice monthly";
        term_length = 36;
        fincanceType = "Working Capital";
    }
    $('#IntendedUse').text($('#funding_type option:selected').text());
    $('#FinanceType').text(fincanceType);
    $('#TermLength').text(term_length);
    $('#SmallTermLength').text("for " + term_length + " months");
    //We trigger the slider here so that it will fire its event to change the values when the select list changes
    slider.slider('option', 'slide')(null, {value: slider.slider('value')})
    return false;
});

//This function chooses the type of payments calculator to use based on the funding type.
function chooseCalcType(val, type) {
    if (type == "equipment") {
        var tmp = calcPayments(val, type);
        return tmp.get(60)[0];
    }
    return calcPaymentsCustom(val, type);
}

//On page load, set default amounts for fields
$(".slideout-details td.amount-to-finance").text(format_currency(50000));
$('div.payment-amount span.payment').text(funding_data + term_scope);
$(".slideout-details td span.month-rate").text(funding_data);

//This event fires each time the slider is moved or the slider values are manually changed.
var process_slider = function (event, ui) {
    funding_data = chooseCalcType(ui.value, funding_type);
    $(".slideout-details td.amount-to-finance").text(format_currency(ui.value));
    $(".homepage-calculator #calc-amount").val(format_currency(ui.value).replace("$", ""));
    $('div.payment-amount span.payment').text(funding_data + term_scope);
    $(".slideout-details td span.month-rate").text(funding_data + term_scope);
};

//This sets our slider ui element and sets its default values.
var slider = $('.homepage-calculator #slider').slider({
    value: 50000,
    min: 5000,
    max: 250000,
    step: 1000,

    slide: process_slider,
    change: process_slider
});
//This event handles when the input for the amount to borrow is changed. It sets the slider to the current value.
/*$(".homepage-calculator #calc-amount").change(function () {
 $(".homepage-calculator #slider").slider("value", $(".homepage-calculator #calc-amount").val().replace(",", ""));
 });*/
$('.homepage-calculator #calc-amount').change(function (e) {
    var costFormatted = format_currency($(this).val());
    $(this).val(costFormatted)
    modEstimateAmount(parseFloat(costFormatted.replace(/\$|,/g, '')));
});
//This sets the input for the amount to borrow to the default amount on page load
$(".homepage-calculator #calc-amount").val(format_currency($(".homepage-calculator #slider").slider("value")).replace("$", ""));

//This event handles when the user clicks the CTA. It chooses the correct endpoint based on the funding type.
$('.calculator-form input[type="submit"]').click(function (e) {
    e.preventDefault();

    $(".homepage-calculator #calc-amount").val($(".homepage-calculator #calc-amount").val().replace(",", ""));
    var uri = "https://apply.tritoncptl.com/app/loan/eq";
    if (funding_type == "bridge") {
        uri = "https://apply.tritoncptl.com/app/loan/wc";
    }
    //$('.calculator-form').attr('action', uri + $(".homepage-calculator #calc-amount").val());
    $('.calculator-form').attr('action', uri);

    $('.calculator-form').submit();

});


// These events handle the slide out panel
var slideOpen = false;
$('.homepage-calculator .view-payment-details').click(function (e) {
    e.preventDefault();

    if (!slideOpen) {
        $('.homepage-calculator .loan-details').show('slide', {direction: 'left'}, 300);
        slideOpen = true;
        if (parseInt($(window).width()) < 920) {
            $('body,html').css('overflow','hidden');
        }
        $('.homepage-calculator .view-payment-details').addClass('active');
    } else {
        $('.homepage-calculator .loan-details').hide('slide', {direction: 'left'}, 300);
        if (parseInt($(window).width()) < 920) {
            $('body,html').css('overflow','auto');
        }
        $('.homepage-calculator .view-payment-details').removeClass('active');
        slideOpen = false;
    }
    e.stopPropagation();
});
$('.homepage-calculator .loan-details .close-btn').click(function (e) {
    e.preventDefault();
    $('.homepage-calculator .loan-details').hide('slide', {direction: 'left'}, 300);
    $('.homepage-calculator .view-payment-details').removeClass('active');
    slideOpen = false;
    if (parseInt($(window).width()) < 670) {
        $('body,html').css('overflow','auto');
    }
});

$('.homepage-calculator .slideout-details .info-text').hide();
$('.homepage-calculator .slideout-details .more-info-icon').click(function (e) {
    e.preventDefault();
    $('.homepage-calculator .slideout-details .info-text').slideToggle();
});


/*$('.homepage-calculator .calculator-block').hoverIntent(function (e) {
    e.preventDefault();
    //$('.home-banner-image-container').css("-webkit-filter", "blur(10px)");
    $('.home-banner-image-container').addClass('zoomout');
    $('.home-banner-image-container').addClass('blur');
    $('.home-banner-overlay').fadeIn(500);
}, function (e) {
    e.preventDefault();
    $('.home-banner-image-container').removeClass('zoomout');
    $('.home-banner-image-container').removeClass('blur');
    $('.home-banner-overlay').fadeOut();
});*/
$(".homepage-calculator .calculator-block select").mouseout(function(e) {
    e.stopPropagation();
});
if (parseInt($(window).width()) >= 920) {
    $('.homepage-calculator .calculator-block').hoverIntent(function (e) {
        e.preventDefault();
        //$('.home-banner-image-container').css("-webkit-filter", "blur(10px)");
        $('.home-banner-image-container').addClass('zoomout');
        $('.home-banner-image-container').addClass('blur');
        $('.home-banner-overlay').fadeIn(500);
    }, function (e) {
        e.preventDefault();
        $('.home-banner-image-container').removeClass('zoomout');
        $('.home-banner-image-container').removeClass('blur');
        $('.home-banner-overlay').fadeOut();
    });
}