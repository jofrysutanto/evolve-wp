<footer class="content-info">
  <div class="container">
    <div class="text-right">
      @include('partials.footer-agency')
    </div>
  </div>
</footer>

<?php if (env('WP_ENV', 'local') == 'production'): ?>
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
  if (typeof jQuery != 'undefined') {
    jQuery(document).ready(function() {
        jQuery(document).bind("gform_confirmation_loaded", function(event, formID) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: "gf_form_submission",
                formId: formID
            });
        });
    });
  }
  </script>
<?php endif; ?>