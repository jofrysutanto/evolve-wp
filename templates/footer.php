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