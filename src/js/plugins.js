// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());


function errorPlacement(error, element) {

    var
    elem    = $(element),
    corners = ['left center', 'right center'];

    if (error.text().indexOf('decline') > -1) {
        corners = ['bottom center', 'top center'];
    } else if (elem.hasClass('qtiptop')) {
        corners = ['bottom center', 'top center'];
    } else if (elem.hasClass('qtipleft')) {
        corners = ['right center', 'left center'];
    }

    var qtipel = elem.filter(':not(.valid)');
    var tooltipel = elem.data('tooltip');
    if (tooltipel)
        qtipel = $(tooltipel);

    if (!error.is(':empty')) {
        qtipel.qtip({
            overwrite: false,
            content: error,
            position: {
                my: corners[0],
                at: corners[1]
            },
            show: {
                event: false,
                ready: true
            },
            hide: false,
            style: {
                classes: 'qtip-red'
            }
        }).qtip('option', 'content.text', error);
    } else {
        qtipel.qtip('destroy');
    }
}

;(function ($, undefined) {

    // Create the defaults, only once!
    var defaults = {
        errorClass: 'form__error',
        validClass: 'form__valid'
    };

    var errortype_defaults = {}
    errortype_defaults.tooltips = {
        errorPlacement : errorPlacement,
        success        : $.noop
    }

    errortype_defaults.builtin = {
        errorPlacement: function (label, element) {
            if (element.hasClass('skinned-select__select')) {
                label.insertAfter(element.parent());
            } else {
                label.insertAfter(element);
            }
        },
        highlight: function( element, errorClass, validClass ) {
            if ( element.type === "radio" ) {
                this.findByName(element.name).addClass(errorClass).removeClass(validClass);
            } else if ( element.type == "select" || element.type == "select-one" ) {
                $(element).parent().addClass(errorClass).removeClass(validClass);
            } else {
                $(element).addClass(errorClass).removeClass(validClass);
            }
        },
        unhighlight: function( element, errorClass, validClass ) {
            if ( element.type === "radio" ) {
                this.findByName(element.name).removeClass(errorClass).addClass(validClass);
            } else if ( element.type === "select" || element.type == "select-one" ) {
                $(element).parent().removeClass(errorClass).addClass(validClass);
            } else {
                $(element).removeClass(errorClass).addClass(validClass);
            }
        }
    }

    errortype_defaults.singlelist = {
        errorContainer      : '.FormErrors',
        errorLabelContainer : '.FormErrors ul',
        wrapper             : 'li'
    }

    $.fn.validateWrapper = function (options) {
        options = $.extend({}, defaults, options);

        if (typeof options.errorType == 'undefined' || options.errorType == '') {
            options.errorType = 'builtin';
        }

        if (options.errorType == 'tooltips') {
            options = $.extend({}, errortype_defaults.tooltips, options);
            delete options.messages;
        } else if (options.errorType == 'singlelist') {
            options = $.extend({}, errortype_defaults.singlelist, options);
            var
            validateErrorContainer = $(options.errorContainer);
            if (validateErrorContainer.size()) {
                validateErrorContainer.append('<ul></ul>');
            } else {
                console.log('validateWrapper: Missing Error Container');
                return;
            }
        } else {
            options = $.extend({}, errortype_defaults.builtin, options);
        }
        delete options.errorType;

        if (options.submitOptions) {
          $(this[0]).attr('action', '#').attr('method', 'get');
          options.submitHandler = function(form) {
            if (options.onBeforeSubmit)
              options.onBeforeSubmit();

            var post_data = $(form).serialize();
            $.post((options.submitOptions.url?options.submitOptions.url:window.location.href), post_data, function(data) {
              try {
                data = $.parseJSON(data);
              } catch (e) {
                console.log(e.message);
                console.log(data);
                return;
              }

              if ((data.errors && Object.size(data.errors) > 0) || data.revalidate) {

                if (data.revalidate)
                    $(form).valid();

                if (data.errors && Object.size(data.errors) > 0)
                    validator.showErrors(data.errors);

                if (options.onSubmitError)
                  options.onSubmitError(data);

              } else {
                if (options.submitOptions.success && !options.submitOptions.success(data))
                  return;

                if (options.onSubmitSuccess)
                  options.onSubmitSuccess();

                if(data.redirect) {
                  window.location.href = data.redirect;
                } else {
                  window.location.reload();
                }

              }
            }, 'html');
          }
        }

        var validator = $(this[0]).validate(options);
        return validator;
    }

})(jQuery);

$(function() {
    if ($.validator) {
        $.validator.prototype.checkForm = function() {
            this.prepareForm();
            var checked = {}
            for ( var i = 0, elements = (this.currentElements = this.elements()); elements[i]; i++ ) {
                if (checked[elements[i].name])
                    continue;
                checked[elements[i].name] = true;
                var namedElements = this.findByName( elements[i].name );
                if (namedElements.length != undefined && namedElements.length > 1) {
                    for (var cnt = 0; cnt < namedElements.length; cnt++) {
                            this.check( namedElements[cnt] );
                    }
                } else {
                    this.check( elements[i] );
                }
            }
            return this.valid();
        }
    }
});

;(function ($, undefined) {

    var defaults = {
        parent: {
            element: $([]),
            defaultText: 'Select',
            selected: null,

            data: [],
            dataKeyId: 'id',
            dataValueId: 'value'
        },
        child: {
            element: $([]),
            onHasOptions: null,
            onNoOptions: null,
            defaultText: 'Select',
            defaultEmptyText: 'Select Parent',
            selected: null,

            dataKey: 'data',
            dataKeyId: 'id',
            dataValueId: 'value',

            includeData: []
        },

        usePreExistingOptions: true,
        optionDataId: 'key',
    };

    function changeOptions(element, options) {
        this.element = $(element);
        this.options = $.extend(true, {}, defaults, options);
        this.init();
        if (!this.i)
            this.i = 0;
        this.i++;
    }

    changeOptions.prototype.init = function () {
        if (
                this.options.child.element.size() < 1
                ||
                (!this.options.usePreExistingOptions && this.options.parent.data.length < 1)) {
            return false;
        }

        this.options.parent.element = this.element;

        var self = this;
        if (!this.options.usePreExistingOptions) {
            this.element.html('<option value="">'+this.options.parent.defaultText+'</option>');
            this.options.child.element.html('<option value="">'+this.options.child.defaultText+'</option>');
            this.options.child.element.append('<option value="">'+this.options.child.defaultEmptyText+'</option>');

            var key = this.options.parent.dataKeyId;
            var value = this.options.parent.dataValueId;

            var ckey = this.options.child.dataKeyId;
            var cvalue = this.options.child.dataValueId;

            $.each(this.options.parent.data, function(i, v) {
                self.element.append('<option value="'+v[key]+'">'+v[value]+'</option>');
                var childData = v[self.options.child.dataKey];
                $.each(childData, function(ci, cv) {
                    var datahtml = '';
                    if (self.options.child.includeData.length > 0) {
                        $.each(self.options.child.includeData, function(di, dv) {
                            datahtml += ' data-'+dv+'="'+cv[dv]+'"';
                        });
                    }
                    self.options.child.element.append('<option value="'+cv[ckey]+'"'+datahtml+' data-'+self.options.optionDataId+'="'+v[key]+'">'+cv[cvalue]+'</option>');
                });
            });
        }

        if (this.element.data('selected'))
            this.options.parent.selected = this.element.data('selected');

        if (this.options.parent.selected)
            this.element.val(this.options.parent.selected);

        this.options.child.options = this.options.child.element.find('option');
        if (this.options.child.options.eq(1).val() != '') {
            var empty = $('<option value="" data-'+self.options.optionDataId+'="">'+this.options.child.defaultEmptyText+'</option>');
            empty.insertAfter(this.options.child.options.eq(0));
            this.options.child.options = this.options.child.element.find('option');
        }
        this.options.child.options.remove();

        if (this.options.child.element.data('selected'))
            this.options.child.selected = this.options.child.element.data('selected');

        var firstChange = true;
        self = this;
        this.element.change(function() {
            var id = $(this).val();
            self.options.child.options.remove();

            var newOptions = self.options.child.options.filter('[data-'+self.options.optionDataId+'="'+id+'"]');

            if (newOptions.size() < 1 || id == '') {
                self.options.child.element.append(self.options.child.options.eq(1));
                if (id != '' && self.options.child.onNoOptions) {
                    self.options.child.onNoOptions();
                }
            } else {
                if (self.options.child.onHasOptions)
                    self.options.child.onHasOptions();

                var firstDefault = self.options.child.options.eq(0);
                self.options.child.element.append(firstDefault)
                                          .append(newOptions);

                if (!firstChange) {
                    self.options.child.element.val('');
                    firstDefault.attr('selected', true);
                }

                if (firstChange && self.options.child.selected) {
                    self.options.child.element.val(self.options.child.selected);
                } else {
                    self.options.child.element.val('');
                    firstDefault.attr('selected', true);
                }

                firstChange = false;
            }

            self.options.child.element.trigger('change');
        }).trigger('change');

    };

    $.fn.changeOptions = function (options) {
        return this.each(function () {
            // Allow for multiple instances on the same parent element
            new changeOptions(this, options);
            //if (!$.data(this, "changeOptions")) {
                //$.data(this, "changeOptions", new changeOptions(this, options));
                //new changeOptions(this, options);
            //}
        });
    }

})(jQuery);


Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
