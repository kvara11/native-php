$(function() {

    var FormEl = $('.LoginForm');
    FormEl.validateWrapper({
        submitHandler: function(form) {
            $.post(URL_BASE+'ajax/do-login', FormEl.serialize(), function(data) {
                if (data.error) {
                    FormEl.validate().showErrors({
                        email_address: 'Invalid Email/Password combination'
                    });
                } else {
                    window.location.href = data.redirect;
                }
            }, 'json');
        },
        rules: {
            email_address: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        }
    });

});
