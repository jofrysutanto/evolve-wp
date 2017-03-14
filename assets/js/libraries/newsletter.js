/*
 * Newsletter form custom script
 */

+function ($) { "use strict";

    // Newsletter CLASS DEFINITION
    // ============================

    var Newsletter = function(element, options) {
        var self        = this;
        this.options    = options;
        this.$form      = $(element)
        this.isSubmitting = false

        this.init()
    }

    Newsletter.DEFAULTS = {
        ajaxAction : 'newsletter_subscribe'
    }
 
    Newsletter.prototype.init = function() {
        var self = this;

        // Prepare loader
        this.$form.on('submit', $.proxy(this.onSubmit, this));
    }

    Newsletter.prototype.onSubmit = function() {
        if (this.isSubmitting) { return; }

        var data = this.$form.serializeArray();
        data.push({'name' : 'action', 'value':  this.options.ajaxAction});

        $.ajax({
            url: ajaxurl,
            data: data,
            success: $.proxy(this.onSuccess, this),
            complete: $.proxy(this.onComplete, this)
        })

        // Prevent default submission
        return false;
    }

    Newsletter.prototype.onComplete = function(jqXHR, status, result2) {
        this.$form.trigger('submitComplete')
    }

    Newsletter.prototype.onSuccess = function(result) {

        if (result.status !== 'OK') {
            var errorMessage = result.error_message || 'An error occurred when submitting your details, please try again later.';
            this.showErrorMessage(errorMessage)
            return;
        }

        this.$form.get(0).reset();
        this.showSuccessMessage();
    }

    Newsletter.prototype.showErrorMessage = function(errorMessage) {
        var $error = $('<p class="form__errors"></p>').text(errorMessage);

        this.removeMessages();
        this.$form.append($error);
    }

    Newsletter.prototype.showSuccessMessage = function() {
        this.removeMessages();
        this.$form.addClass('is-completed');

        this.$form.trigger('submitSuccess')
    }

    Newsletter.prototype.removeMessages = function() {
        this.$form.find('.form__errors').remove();
    }

    // Newsletter PLUGIN DEFINITION
    // ============================

    var old = $.fn.unicoNewsletter

    $.fn.unicoNewsletter = function (option) {
        var args = Array.prototype.slice.call(arguments, 1)
        return this.each(function () {
            var $this   = $(this)
            var data    = $this.data('trueper.newsletter')
            var options = $.extend({}, Newsletter.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('trueper.newsletter', (data = new Newsletter(this, options)))
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    }

    $.fn.unicoNewsletter.Constructor = Newsletter

    // Newsletter NO CONFLICT
    // =================

    $.fn.unicoNewsletter.noConflict = function () {
        $.fn.unicoNewsletter = old
        return this
    }

}(window.jQuery);
