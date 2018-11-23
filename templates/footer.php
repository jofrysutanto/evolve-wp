<?php wp_footer(); ?>

<?php
   if(env('LIVERELOAD', false)):
       ?>
       <script>document.write('<script src="http://'
           + (location.host || 'localhost').split(':')[0]
           + ':35729/livereload.js?snipver=1"></'
           + 'script>')</script>
       <?php
   endif;
?>

<!-- Analytics tracking submission -->
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        "event" : "cf7_form_submission",
        "formId" : event.detail.contactFormId,
        "response" : event.detail.inputs
    })
});
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(document).bind("gform_confirmation_loaded", function(event, formID) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            event: "gf_form_submission",
            formId: formID
        });
    });
});
</script>