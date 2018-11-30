<?php

namespace App\Wordpress;

use Illuminate\Support\Fluent;
use EvolveEngine\Core\WordpressBase;

class Main extends WordpressBase
{
    /**
     * Register all custom hooks and filters here
     * Use $this->filter() and $this->action() to register filters and actions.
     * Use $this->ajax() for ajax events
     * It is also possible to modularised this into multiple classes, all 
     * you have to do is register them in AppServiceProvider and extend WordpressBase
     *
     * @return void
     */
    public function init()
    {
        // 
        // Actions
        // ==

        $this->action('init', ['disableEmojis', 'disableEmbed']);

        //
        // Filters
        // ==

        // Contact Form 7
        $this->filter( 'wpcf7_load_js',  'cf7Js' );
        $this->filter( 'wpcf7_load_css', 'cf7Css' );

        // Login style
        $this->action('login_head', 'loginStyles');
    }

    //
    // Hooks, Actions, & Filters
    // 

    /**
     * Attempt to remove all emojis
     *
     * @return void
     */
    public function disableEmojis()
    {
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    }

    /**
     * Disable built-in media embed scripts
     *
     * @return void
     */
    public function disableEmbed()
    {
        if (!is_admin()) {
            wp_deregister_script('wp-embed');
        }
    }

    /**
     * Disable Contact Form 7 stylesheet
     *
     * @return boolean
     */
    public function cf7Css()
    {
        return false;
    }

    /**
     * Disable Contact Form 7 javascript
     * Ideally this is only enabled on pages which requires contact form
     * and not on front_page to optimise home page
     *
     * @return boolean
     */
    public function cf7Js()
    {
        return true;
    }
    
    /**
     * Login Styles
     */
    public function loginStyles()
    {
        ?>
        <style type="text/css">
            body {
                position: relative;
                background-color: #fff;
                background-position: bottom center;
                background-repeat: no-repeat;
            }
            h1 a {
                /** Change width and height according to logo */
                width:324px !important; height:100px !important;
                background: url('<?= \TrueLib::getImageURL('logoLogin.png')?>') no-repeat center center !important;
                -webkit-background-size: auto auto !important; background-size: auto auto !important;
            }
        </style>
        <?php
    }
}
