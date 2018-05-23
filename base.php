<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
    <?= Analytics::render("google-tag-manager.noscript") ?>
    <!--[if lte IE 9]>
        <div class="alert alert-warning">
            <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
        </div>
    <![endif]-->
    <?php
        do_action('get_header');
    ?>
    <?=view('header/header'); ?>
    <main class="main" role="main">
        <?php include roots_template_path(); ?>
    </main><!-- /.main -->

    <?=view('footer'); ?>
</body>
</html>
