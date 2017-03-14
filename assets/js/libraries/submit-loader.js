/*
 * SubmitLoader plugin
 *
 * Enable loadIndicator to be activated upon normal POST form submission
 *
 * Data attributes:
 * - data-submit-loader - enables the plugin on an element
 *
 *
 * Dependencies:
 * - svg-loader.js
 */

+function ($) { "use strict";

    function submitLoader($el) {
    }

    // SubmitLoader DATA-API
    // ===============
    $(document).ready(function () {

        $('[data-submit-loader]').each(function () {
            var $el = $(this),
                $form = null,
                loadingText = $el.data('load-text') || "Please wait...",
                normalText  = $el.text()
            if ($el.attr('type') === 'submit') {
                $form = $el.closest('form')
                $form.on('submit', function () {
                    $el
                        .text(loadingText)
                        .attr('disabled', 'disabled')
                    $el.svgLoader({
                        loaderClass: 'small'
                    });
                    $el.svgLoader('show');
                })
                $form.on('submitComplete', function () {
                    $el.svgLoader('hide');
                    $el
                        .text(normalText)
                        .removeAttr('disabled')
                })
            }
        })
    })


}(window.jQuery);
