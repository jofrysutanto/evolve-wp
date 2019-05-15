<?php

collect([
    'theme-assets',
    'theme-setup',
    'sidebars',
    'remove-comment',
    'blade-setup',
])->each(function ($module) {
    include __DIR__ . '/modules/' . $module . '.php';
});

/**
 * Boot the engine
 */
add_action('after_setup_theme', function () {
    app()->start();
});
