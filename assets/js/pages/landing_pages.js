
var equip = calcPayments(50000, 'equipment');

$(".slideout-details td.amount-to-finance").text(format_currency(50000));
$('div.payment-amount span.payment').text(equip.get(60)[0] + "/month");
$(".slideout-details td span.month-rate").text(equip.get(60)[0]);
var process_slider_el = function (event, ui) {
    equip = calcPayments(ui.value, 'equipment');
    $(".slideout-details td.amount-to-finance").text(format_currency(ui.value));
    $(".eq-loan-landing #eq-amount").val(format_currency(ui.value).replace("$", ""));
    $('div.payment-amount span.payment').text(equip.get(60)[0] + "/month");
    $(".slideout-details td span.month-rate").text(equip.get(60)[0]);
};
$('.eq-loan-landing #slider').slider({
    value: 50000,
    min: 5000,
    max: 250000,
    step: 1000,

    slide: process_slider_el,
    change: process_slider_el
});
$(".eq-loan-landing #eq-amount").change(function () {
    $(".eq-loan-landing #slider").slider("value", $(".eq-loan-landing #eq-amount").val().replace(",", ""));
});
$(".eq-loan-landing #eq-amount").val(format_currency($(".eq-loan-landing #slider").slider("value")).replace("$", ""));
$('.eq-calculator input[type="submit"]').click(function (e) {
    e.preventDefault();

    $(".eq-loan-landing #eq-amount").val($(".eq-loan-landing #eq-amount").val().replace(",", ""));
    $('.eq-calculator').attr('action', "https://apply.tritoncptl.com/go/tritoncapital/" + $(".eq-loan-landing #eq-amount").val());

    $('.eq-calculator').submit();

});


var auto_select_bridge = false;
var work_bridge = calcPaymentsCustom(50000, 'bridge');
$('#bridge-option span.payment-amt').text(work_bridge);
$(".slideout-details td span.day-rate").text(work_bridge);

var work_terms = calcPaymentsCustom(50000, 'term');
$('#term-option span.payment-amt').text(work_terms);
$(".slideout-details td span.month-rate").text(work_terms);
var process_slider_wc = function (event, ui) {
    $("#wc-amount").val(format_currency(ui.value).replace("$", ""));
    $(".slideout-details td.amount-to-finance").text(format_currency(ui.value));
    work_bridge = calcPaymentsCustom(ui.value, 'bridge');
    $('#bridge-option span.payment-amt').text(work_bridge);
    $(".slideout-details td span.day-rate").text(work_bridge);
    if (ui.value >= 25000) {
        if (!$('#term-option').is(":visible")) {
            $('#term-option').show();
        }
        if (auto_select_bridge) {
            $('#bridge_loan').prop("checked", false);
            auto_select_bridge = false;
        }
        work_terms = calcPaymentsCustom(ui.value, 'term');
        $('#term-option span.payment-amt').text(work_terms);
        $(".slideout-details td span.month-rate").text(work_terms);
    } else {
        if ($('#term-option').is(":visible")) {
            $('#bridge_loan').prop("checked", true);
            auto_select_bridge = true;
            $('.wc-loan-landing .term-loan-details').hide('slide', {direction: 'left'}, 300);
            $('#term-option').hide();
        }
    }
};
$('.wc-loan-landing #slider').slider({
    value: 50000,
    min: 5000,
    max: 250000,
    step: 1000,
    slide: process_slider_wc,
    change: process_slider_wc
});
$("#wc-amount").change(function () {
    $(".wc-loan-landing #slider").slider("value", $("#wc-amount").val().replace(",", ""));
});
$("#wc-amount").val(format_currency($(".wc-loan-landing #slider").slider("value")).replace("$", ""));

$('input[type=radio][name="loan_type"]').change(function () {

    if ($('.wc-loan-landing .term-loan-details').is(":visible") || $('.wc-loan-landing .bridge-loan-details').is(":visible")) {
        if (this.value == 'bridge') {
            $('.wc-loan-landing .term-loan-details').hide();
            $('.wc-loan-landing .bridge-loan-details').show('slide', {direction: 'left'}, 300);

        }
        else if (this.value == 'term') {
            $('.wc-loan-landing .bridge-loan-details').hide();
            $('.wc-loan-landing .term-loan-details').show('slide', {direction: 'left'}, 300);
        }
    }
});

$('.wc-calculator input[type="submit"]').click(function (e) {
    e.preventDefault();

    $("#wc-amount").val($("#wc-amount").val().replace(",", ""));
    var uri = "";

    if ($('.wc-calculator input[name="loan_type"]:checked').val() == "bridge") {
        uri = "https://apply.tritoncptl.com/working-capital/bridge/"
    } else {
        uri = "https://apply.tritoncptl.com/working-capital/";
    }

    $('.wc-calculator').attr('action', uri + $("#wc-amount").val());

    $('.wc-calculator').submit();

});


// EQ loan details slide
$('.eq-loan-landing .view-payment-details').click(function (e) {
    e.preventDefault();

    $('.eq-loan-landing .eq-loan-details').show('slide', {direction: 'left'}, 300);
});
$('.eq-loan-landing .eq-loan-details .close-btn').click(function (e) {
    e.preventDefault();
    $('.eq-loan-landing .eq-loan-details').hide('slide', {direction: 'left'}, 300);
});

// Bridge loan details slide
$('.wc-loan-landing .view-payment-details.bl-details-link').click(function (e) {
    e.preventDefault();
    $('.wc-loan-landing .term-loan-details').hide();
    $('#term_loan').prop("checked", false);
    $('#bridge_loan').prop("checked", true);
    $('.wc-loan-landing .bridge-loan-details').show('slide', {direction: 'left'}, 300);
});
$('.wc-loan-landing .bridge-loan-details .close-btn').click(function (e) {
    e.preventDefault();
    $('.wc-loan-landing .bridge-loan-details').hide('slide', {direction: 'left'}, 300);
});

// Term loan details slide
$('.wc-loan-landing .view-payment-details.tl-details-link').click(function (e) {
    e.preventDefault();
    $('.wc-loan-landing .bridge-loan-details').hide();
    $('#bridge_loan').prop("checked", false);
    $('#term_loan').prop("checked", true);
    $('.wc-loan-landing .term-loan-details').show('slide', {direction: 'left'}, 300);
});
$('.wc-loan-landing .term-loan-details .close-btn').click(function (e) {
    e.preventDefault();
    $('.wc-loan-landing .term-loan-details').hide('slide', {direction: 'left'}, 300);
});


$('.slideout-details .info-text').hide();
$('.slideout-details .more-info-icon').click(function (e) {
    e.preventDefault();
    $('.slideout-details .info-text').slideToggle();
});
$('#contact-form').validate({
    rules: {
        first_name: {
            required: true
        },
        last_name: {
            required: true
        },
        objective: {
            required: true
        },
        currently_finance: {
            required: true
        },
        email_address: {
            required: true,
            email: true
        },
        preferred_method: {
            required: true,
        },
        phone_number: {
            required: true,
            phoneUS: {
                depends: function () {
                    if ($('#contact-form #contact-method:selected').val() == 'phone' || $('#contact-form #contact-method:selected').val() == 'sms') {
                        return true;
                    }
                    return false;
                }
            },

        }
    },
    errorElement: "p",
    errorClass: "error",
    errorPlacement: function(error, element) {
        error.appendTo( element.closest("div") );
    },
    messages: {
        first_name: "Please provide your first name",
        last_name: "Please provide your last name",
        objective: "Please choose an option",
        currently_finance: "Please choose an option",
        email_address: {
            required: "Please provide your email address",
            email: "Your email address must be in the format of name@domain.com"
        },
        preferred_method: "Please provide your preferred contact method",
        phone_number: {
            required: "Please provide your phone number",
            phoneUS: "Your phone number must be in the format of 555-555-5555"
        },
    },
    submitHandler: function (form) {
        var form_data;
        if ($('#contact-form #contact-method:selected').val() == 'phone' || $('#contact-form #contact-method:selected').val() == 'sms') {
            form_data = $(form).serialize()
        } else {
            form_data = $(form).serialize().replace("&phone=", "");
        }
        $.ajax({
            url: $(form).attr('action'),
            type: "POST",
            data: form_data,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.success) {

                    $(form).hide();
                    $('#contact-form-success').show();
                } else {

                }
            },
            statusCode: {
                500: function () {
                    $(form).hide();
                    $('#contact-form-error').fadeIn();
                }
            }
        });

    },

});