/*
 * SubmitLoader plugin
 *
 * Enable loadIndicator to be activated with loading text upon normal POST form submission.
 * This script automatically search for closest parent form, and change its state when parent form is submitted
 *
 * Data attributes:
 * - data-submit-loader - enables the plugin on an element
 * - data-load-text     - Text to display while loading, defaults to 'Please wait..'
 * - data-show-svg      - Use SVG loading animation (additional dependencies, see svg-loader.js)
 *
 * Dependencies:
 * - svg-loader.js (Optional if svg loader to be shown)
 */

+function ($) { "use strict";

    var SubmitLoader = function(element, options) {
        var $el = $(element),
            $form = null,
            loadingText = options.loadText,
            useSvgLoader = options.showSvg,
            normalText  = $el.text()

        if ($el.attr('type') === 'submit') {
            $form = $el.closest('form')
            $form.on('submit', function () {
                $el
                    .text(loadingText)
                    .attr('disabled', 'disabled')
                if (useSvgLoader) {
                    $el.svgLoader({
                        loaderClass: 'small'
                    });
                    $el.svgLoader('show');
                }
            })
            $form.on('submitComplete', function () {
                if (useSvgLoader) {
                    $el.svgLoader('hide');
                }
                $el
                    .text(normalText)
                    .removeAttr('disabled')
            })
        }
    }

    SubmitLoader.DEFAULTS = {
        loadText: 'Please wait...',
        showSvg: false
    }

    // SubmitLoader PLUGIN DEFINITION
    // ============================

    var old = $.fn.submitLoader

    $.fn.submitLoader = function (option) {
        var args = Array.prototype.slice.call(arguments, 1)
        return this.each(function () {
            var $this   = $(this)
            var data    = $this.data('trueper.submit-loader')
            var options = $.extend({}, SubmitLoader.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('trueper.submit-loader', (data = new SubmitLoader(this, options)))
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    }

    $.fn.submitLoader.Constructor = SubmitLoader

    // SubmitLoader NO CONFLICT
    // =================

    $.fn.submitLoader.noConflict = function () {
        $.fn.submitLoader = old
        return this
    }

    // SubmitLoader DATA-API
    // ===============

    $(document).on('ready', function () {
       $('[data-submit-loader]').submitLoader()
    })


}(window.jQuery);
