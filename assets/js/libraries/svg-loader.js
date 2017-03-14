/*
 * SvgLoader plugin
 *
 * Add svg loader animation
 *
 * Data attributes:
 *
 * JavaScript API:
 * $('#someElement').svgLoader()
 *
 * Dependencies:
 * - ....
 */

+function ($) { "use strict";

    // SvgLoader CLASS DEFINITION
    // ============================

    var loaders = {}

    var SvgLoader = function(element, options) {
        var self        = this;
        this.options    = options;
        this.$container = $(element);

        if (!loaders[options.templateId]) {
            loaders[options.templateId] = $(options.templateId).html()
        }
        this.template   = loaders[options.templateId]
    }

    SvgLoader.DEFAULTS = {
        'size': 50,
        'templateId' : '#svgLoader',
        'loaderClass' : ''
    }

    SvgLoader.prototype.show = function() {

        if (this.$container.hasClass('is-loading')) {
            return;
        }

        var $loader = $(this.template)
        if (this.options.loaderClass.length) {
            $loader
                .addClass(this.options.loaderClass);
        }

        this.$container
            .append($loader)
            .addClass('is-loading')
    }

    SvgLoader.prototype.hide = function () {
        this.$container
            .find('> .preloader-wrapper')
            .remove()
        this.$container.removeClass('is-loading')
    }

    // SvgLoader PLUGIN DEFINITION
    // ============================

    var old = $.fn.svgLoader

    $.fn.svgLoader = function (option) {
        var args = Array.prototype.slice.call(arguments, 1)
        return this.each(function () {
            var $this   = $(this)
            var data    = $this.data('trueper.svg-loader')
            var options = $.extend({}, SvgLoader.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('trueper.svg-loader', (data = new SvgLoader(this, options)))
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    }

    $.fn.svgLoader.Constructor = SvgLoader

    // SvgLoader NO CONFLICT
    // =================

    $.fn.svgLoader.noConflict = function () {
        $.fn.svgLoader = old
        return this
    }

    // SvgLoader DATA-API
    // ===============

}(window.jQuery);
