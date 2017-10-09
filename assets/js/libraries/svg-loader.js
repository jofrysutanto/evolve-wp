/*
 * SvgLoader plugin
 *
 * Add svg loader animation
 *
 * Data attributes:
 * - data-template-id="#svgLoader"   - Template to use for svg loader, can be wrapped inside <script></script>
 * Example:
 * <script type="template" id="svgLoader">
 * <svg class="svg-loader" viewBox="25 25 50 50">
 *     <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
 * </svg>
 * </script>
 *
 * This scripts appends the svg to the element, and add 'is-loading' class, all CSS loading animation on the svg has
 * to be added separately.
 *
 * JavaScript API:
 * // Initialise the library
 * $('#someElement').svgLoader()
 * // Now show element
 * $('#someElement').svgLoader('show')
 * // Hiding element
 * $('#someElement').svgLoader('hide')
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

        var $loader = $('<div class="preloader-wrapper">' + this.template + '</div>')
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
