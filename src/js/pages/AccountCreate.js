$(function() {

    var
    CreateAccountFormEl = $('.CreateAccountForm'),
    CountryEl         = CreateAccountFormEl.find('select[name="customers_country"]'),
    StateEl           = CreateAccountFormEl.find('#customers_state'),
    StateFallbackEl   = CreateAccountFormEl.find('#customers_state_fallback').hide();

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

    var
    EmailAddressEl = CreateAccountFormEl.find('input[name="email_address"]').eq(0),
    PasswordEl     = CreateAccountFormEl.find('input[name="password"]').eq(0);
    var validator = CreateAccountForm.validateWrapper({
        rules: {
            customers_firstname: {
                required: true,
                minlength: 2
            },
            customers_lastname: {
                required: true,
                minlength: 2
            },
            customers_telephone: {
                required: true,
                minlength: 3
            },
            customers_country: {
                required: true
            },
            customers_street_address: {
                required: true,
                minlength: 5
            },
            customers_city: {
                required: true,
                minlength: 3
            },
            customers_state: {
                required: true
            },
            customers_state_fallback: {
                required: true,
                minlength: 2
            },
            customers_postcode: {
                required: true,
                minlength: 4
            },
            email_address: {
                required: true,
                email: true
            },
            confirm_email: {
                equalTo: EmailAddressEl
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                equalTo: PasswordEl
            },
        },
    });
});
