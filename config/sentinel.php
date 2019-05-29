<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable Sentinel
    |--------------------------------------------------------------------------
    |
    | Sentinel is opt-in only, disabling sentinel is completely safe.
    |
    */
    'enabled'    => env('SENTINEL_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Page Title
    |--------------------------------------------------------------------------
    |
    | The name of the page for Sentinel management screen
    |
    */
    'title'      => 'Sentinel',

    /*
    |--------------------------------------------------------------------------
    | Public Path
    |--------------------------------------------------------------------------
    |
    | This the public-ly accessible path for Sentinel to serve public assets,
    | the default setting should most likely work for usual setup.
    |
    */
    'public_path'  => get_theme_file_uri() . '/vendor/trueagency/evolve-sentinel/',

    /*
    |--------------------------------------------------------------------------
    | Menu Title
    |--------------------------------------------------------------------------
    |
    | The name of the manu
    |
    */
    'menu-title' => 'Sentinel',

    /*
    |--------------------------------------------------------------------------
    | User Capability
    |--------------------------------------------------------------------------
    |
    | User's capability to access the page (Wordpress capability)
    |
    */
    'capability' => 'install_themes',

    /*
    |--------------------------------------------------------------------------
    | Menu Slug
    |--------------------------------------------------------------------------
    |
    | Unique slug for sentinel page
    |
    */
    'menu-slug'  => 'sentinel',

    /*
    |--------------------------------------------------------------------------
    | Menu Position
    |--------------------------------------------------------------------------
    |
    | The position of Sentinel menu in the backend
    |
    */
    'menu-position'  => 2,

    /*
    |--------------------------------------------------------------------------
    | Menu Icon
    |--------------------------------------------------------------------------
    |
    | The icon used as the menu.
    | For consistency, it is highly recommended to pick one from dashicon
    | @link https://developer.wordpress.org/resource/dashicons
    |
    */
    'menu-icon'  => 'dashicons-admin-site-alt',

    /*
    |--------------------------------------------------------------------------
    | Sentinel API Action Hook
    |--------------------------------------------------------------------------
    |
    | This determine when the API will be handled in relation to
    | Wordpress action/hook flow. A sensible value will be 'init',
    | however you may need it to run a bit later, such as
    | `woocommerce_init` to load Woocommerce classes
    |
    */
    'action_hook' => 'wp_loaded'

];
