var validator_errors = {};
var validator_revalidate = false;
$(function() {

    var
    CheckoutFormEl           = $('.CheckoutForm'),
    ButtonEl                 = CheckoutFormEl.find('.Button').attr('disabled', true),
    CountryEl                = CheckoutFormEl.find('select[name="ship_country"]'),
    StateEl                  = CheckoutFormEl.find('#ship_state'),
    StateFallbackEl          = CheckoutFormEl.find('#ship_state_fallback').hide(),

    ShippingMethodsEl        = $('.ShippingMethods'),

    CheckoutCartEl           = $('.CheckoutCart'),
    CheckoutCartTotalsEl     = CheckoutCartEl.find('.Totals'),
    CheckoutCartTotalEl      = CheckoutCartEl.find('.Total'),

    hasLoadedShippingMethods = false;

    CountryEl.changeOptions({
        parent: {
            defaultText: 'Country',
            dataKeyId: 'id',
            dataValueId: 'name'
        },
        child: {
            defaultText: 'Select State',
            defaultEmptyText: 'Select State',
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

    function getShippingMethods() {
        ButtonEl.show().attr('disabled', true).text('Loading Shipping Methods...');

        CheckoutFormEl.find('input[type="text"],select').unbind('change').bind('change', function() {
           getShippingMethods();
        });

        if (!CheckoutFormEl.valid()) {
            ShippingMethodsEl.hide();
            ShippingMethodsEl.html('');
            ButtonEl.attr('disabled', false).text('Choose Shipping Method');
            getOrderTotals();
            return;
        }

        $.post(URL_BASE+'ajax/get-shipping-methods', CheckoutFormEl.serialize(), function(data) {

            try {
                data = $.parseJSON(data);
            } catch (err) {
                alert('There has been a problem. Please contact us.');
                return;
            }

            ShippingMethodsEl.find('input[type="radio"]').unbind();
            ShippingMethodsEl.html('');
            var html = '<div class="Title">Shipping Methods</div>';
            var shippingCount = data.shipping.length;
            $.each(data.shipping, function (i, module) {
                if (typeof(module.module) == 'undefined')
                    return false;
                if (shippingCount > 1)
                    html += '<div class="MethodTitle">'+module.module+'</div>';

                html += '<div class="Methods'+(shippingCount < 2?' Single':'')+'">';
                if (module.error != '') {
                    html += '<div class="Error">'+module.error+'</div>';
                    if (shippingCount < 2)
                        html += '<input type="hidden" name="shipping" value="" />';
                } else {
                    $.each(module.methods, function(ii, method) {
                        html += '<label><input type="radio" name="shipping" value="'+module.id+'_'+method.id+'"'+(method.cheapest == 1?' checked="checked"':'')+' />&nbsp;&nbsp;'+method.cost+'&nbsp;-&nbsp;<strong>'+method.title+'</strong></label>';
                    });
                }
                html += '</div>';
            });

            ShippingMethodsEl.html(html);

            ShippingMethodsEl.find('input[type="radio"]').change(function() {
                ShippingMethodsEl.data('selected', $(this).val());
                getOrderTotals();
            });

            if (ShippingMethodsEl.data('selected')) {
                ShippingMethodsEl.find('input[value="'+ShippingMethodsEl.data('selected')+'"]').attr('checked', true);
            }

            hasLoadedShippingMethods = true;
            ShippingMethodsEl.show();
            ButtonEl.attr('disabled', false).text('Continue to Billing');
            getOrderTotals();

        }, 'html');
    }


    function getOrderTotals() {
        $.post(URL_BASE+'ajax/get-order-totals', CheckoutFormEl.serialize(), function(data) {
            var ot_total = {};
            var totals_html = '';
            $.each(data, function(i, total) {
                if (total.code == 'ot_total') {
                    ot_total = total;
                    return true;
                }
                totals_html += '<tr><td class="Label">'+total.title+'</td><td class="Value">'+total.text+'</td></tr>';
            });
            totals_html = '<div class="Totals"><table>'+totals_html+'</table></div>';

            var total_html = '<div class="Total">\
                                    <table>\
                                        <tr>\
                                            <td class="Label">Total</td>\
                                            <td class="Value">'+ot_total.text+'</td>\
                                        </tr>\
                                    </table>\
                                </div>';

            CheckoutCartTotalsEl.remove();
            CheckoutCartTotalEl.remove();
            CheckoutCartEl.append(totals_html);
            CheckoutCartEl.append(total_html);

            CheckoutCartTotalsEl = CheckoutCartEl.find('.Totals');
            CheckoutCartTotalEl = CheckoutCartEl.find('.Total');
        }, 'json');
    }

    getOrderTotals();

    window.getOrderTotalsGlobal = getOrderTotals;

    var EmailAddressEl = CheckoutFormEl.find('input[name="email_address"]').eq(0);
    var validator = CheckoutFormEl.validateWrapper({
        submitHandler: function(form) {
            if (hasLoadedShippingMethods) {
                form.submit();
            } else {
                getShippingMethods();
            }
        },
        rules: {
            ship_firstname: {
                required: true,
                minlength: 2
            },
            ship_lastname: {
                required: true,
                minlength: 2
            },
            customers_telephone: {
                required: true,
                minlength: 3
            },
            email_address: {
                required: true,
                email: true
            },
            confirm_email: {
                equalTo: EmailAddressEl
            },
            ship_country: {
                required: true
            },
            ship_street_address: {
                required: true,
                minlength: 5
            },
            ship_city: {
                required: true,
                minlength: 3
            },
            ship_state: {
                required: true
            },
            ship_state_fallback: {
                required: true,
                minlength: 2
            },
            ship_postcode: {
                required: true,
                minlength: 4
            },
            shipping: {
                required: true
            }
        }
    });


    if (validator_revalidate || Object.keys(validator_errors).length > 0) {
        ButtonEl.attr('disabled', true);
    }

    if (validator_revalidate) {
        if (validator.valid()) {
            getShippingMethods();
        }
    }

    if (Object.keys(validator_errors).length > 0) {
        validator.showErrors(validator_errors);
    }

    if (!validator_revalidate && Object.keys(validator_errors).length < 1) {
        ButtonEl.attr('disabled', false);
    }

});
