$(function() {

    var
    CheckoutFormEl  = $('.CheckoutForm'),
    ButtonEl        = CheckoutFormEl.find('.ButtonContainer .Button').attr('disabled', true),
    CountryEl       = $('#bill_country'),
    StateEl         = $('#bill_state'),
    StateFallbackEl = $('#bill_state_fallback').hide();

    CountryEl.changeOptions({
        parent: {
            defaultText: 'Country',
            dataKeyId: 'id',
            dataValueId: 'name'
        },
        child: {
            defaultText: 'State',
            defaultEmptyText: 'State',
            element: StateEl,
            onHasOptions: function() {
                StateEl.show();
                StateFallbackEl.qtip('destroy');
                StateFallbackEl.hide();
            },
            onNoOptions: function() {
                StateFallbackEl.show();
                StateEl.qtip('destroy');
                StateEl.hide();
            },

            dataKey: 'states',
            dataKeyId: 'id',
            dataValueId: 'name'
        },
        usePreExistingOptions: true
    });

    var COD = CheckoutFormEl.find('input[name="payment"]').eq(1);
    var validator = CheckoutFormEl.validateWrapper({
        rules: {
            bill_firstname: {
                required: true,
                minlength: 2
            },
            bill_lastname: {
                required: true,
                minlength: 2
            },
            bill_country: {
                required: true
            },
            bill_street_address: {
                required: true,
                minlength: 5
            },
            bill_city: {
                required: true,
                minlength: 3
            },
            bill_state: {
                required: true
            },
            bill_state_fallback: {
                required: true,
                minlength: 2
            },
            bill_postcode: {
                required: true,
                minlength: 4
            },
            'payment_details[cc_owner]': {
                required: {
                    depends: function() {
                        return !COD.is(':checked');
                    }
                },
                minlength: 5
            },
            'payment_details[cc_number_nh-dns]': {
                required: {
                    depends: function() {
                        return !COD.is(':checked');
                    }
                },
                creditcardtypes: {
                    all: true
                }
            },
            'payment_details[cc_cvc_nh-dns]': {
                required: {
                    depends: function() {
                        return !COD.is(':checked');
                    }
                },
                minlength: 3,
                digits: true
            },
        }
    });

    ButtonEl.attr('disabled', false);

});
