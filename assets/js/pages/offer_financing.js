// OFFER FINANCING

// SCROLLTO
$('a.financing-contact-link').click(function () {
    $.scrollTo(this.hash, 800, {easing: 'swing'});
    return false;
});
$('a.financing-calculator-link').click(function () {
    $.scrollTo(this.hash, 800, {easing: 'swing'});
    return false;
});
//var FormEl = $('#contact-form');
$('#contact-form').validate({
    rules: {
        first_name: {
            required: true
        },
        last_name: {
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
                    if ($('#contact-method:selected').val() == 'phone' || $('#contact-method:selected').val() == 'sms') {
                        return true;
                    }
                    return false;
                }
            },

        }
    },
    errorElement: "p",
    errorClass: "error",
    messages: {
        first_name: "Please provide your first name",
        last_name: "Please provide your last name",
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
        if ($('#contact-method:selected').val() == 'phone' || $('#contact-method:selected').val() == 'sms') {
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
var term = $(".financing-calculator-section .offer-term.selected").data('term');
var amount = $('.financing-calculator-section #financing-amount').val().replace(",", "");
var monthly = calcPaymentsOffer(amount, term);
$('#offer-monthly-payment').text(monthly);
$('.financing-calculator-section #financing-amount').keyup(function (e) {
    var term = $(".financing-calculator-section .offer-term.selected").data('term');
    $(this).val(format_currency($(this).val()).replace("$", ""));
    var amount = $(this).val().replace(",", "");
    var monthly = calcPaymentsOffer(amount, term);
    $('#offer-monthly-payment').text(monthly);
});
$('.financing-calculator-section .offer-term').click(function(e){
    $('.financing-calculator-section .offer-term.selected').removeClass("selected");
    $(this).addClass("selected");
    var term = $(this).data('term');
    var amount = $('.financing-calculator-section #financing-amount').val().replace(",", "");
    var monthly = calcPaymentsOffer(amount, term);
    $('#offer-monthly-payment').text(monthly);
});

//offer financing form
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

//var FormEl = $('#contact-form');
$('#financing-contact .finance-form').validate({
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
                    if ($('#financing-contact .finance-form #contact-method:selected').val() == 'phone' || $('#financing-contact .finance-form #contact-method:selected').val() == 'sms') {
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
        if ($('#financing-contact .finance-form #contact-method:selected').val() == 'phone' || $('#financing-contact .finance-form #contact-method:selected').val() == 'sms') {
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
                    $('#financing-contact #contact-form-success').show();
                } else {

                }
            },
            statusCode: {
                500: function () {
                    $(form).hide();
                    $('#financing-contact #contact-form-error').fadeIn();
                }
            }
        });

    },

});