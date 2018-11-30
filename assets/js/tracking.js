;(function ($, App) {

    'use strict';

    /**
     * Analytics tracking submission
     */
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            "event" : "cf7_form_submission",
            "formId" : event.detail.contactFormId,
            "response" : event.detail.inputs
        })
    });

    jQuery(document).ready(function() {
        jQuery(document).bind("gform_confirmation_loaded", function(event, formID) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "gf_form_submission",
                formId: formID
            });
        });
    });

})(jQuery, window.App);
