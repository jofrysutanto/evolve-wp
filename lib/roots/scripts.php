<?php
/**
* Enqueue scripts and stylesheets
*/
function roots_scripts() {
    $themeUri = get_template_directory_uri();

    // Queue our customs styles
    wp_enqueue_style('roots_main', $themeUri . '/assets/css/main.min.css', false, asset_version());

    // jQuery is loaded using the same method from HTML5 Boilerplate:
    // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
    // It's kept in the header instead of footer to avoid conflicts with plugins.
    if (!is_admin() && current_theme_supports('jquery-cdn')) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', [], null, true);
        add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
    }
    wp_enqueue_script('jquery');

    // Optionally add comments script
    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Our site's main scripts, based on environment we either pack all scripts into one
    // or separate vendor and main scripts
    if(!app()->environment('production')) {
        wp_register_script('roots_scripts', $themeUri . '/assets/js/dist/vendor.min.js', [], asset_version(), true);
        wp_register_script('main_scripts', $themeUri . '/assets/js/dist/main.min.js', [], asset_version(), true);
        wp_enqueue_script('roots_scripts');
        wp_enqueue_script('main_scripts');
    } else {
        wp_register_script('true_packed', $themeUri . '/assets/js/dist/packed.min.js', [], asset_version(), true);
        wp_enqueue_script('true_packed');
    }

}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
    static $add_jquery_fallback = false;

    if ($add_jquery_fallback) {
        echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery-1.11.0.min.js"><\/script>\')</script>' . "\n";
        $add_jquery_fallback = false;
    }

    if ($handle === 'jquery') {
        $add_jquery_fallback = true;
    }

    return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');
