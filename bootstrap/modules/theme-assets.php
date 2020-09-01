<?php
/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('evolve-engine/main.css', asset_path('main.css'), [], asset_version());
    wp_enqueue_script('evolve-engine/main.js', asset_path('main.js'), ['jquery'], asset_version(), true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);
