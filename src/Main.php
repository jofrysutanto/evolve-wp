<?php

namespace App;

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
        $this->filter( 'wpcf7_load_js', 'cf7Js' );
        $this->filter( 'wpcf7_load_css', 'cf7Css' );

        // Page speed optimisations
        $this->filter('script_loader_tag', 'addAsyncToScripts', 10, 2);

        //
        // Ajax
        // ==
        // Moved to its own class
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

    public function disableEmbed()
    {
        if (!is_admin()) {
            wp_deregister_script('wp-embed');
        }
    }



    /**
     * Disable Contact Form 7 asset
     *
     * @return boolean
     */
    public function cf7Css()
    {
        return false;
    }

    /**
     * Disable Contact Form 7 asset
     *
     * @return boolean
     */
    public function cf7Js()
    {
        return false;
    }

    /**
     * Add 'async' attributes to our scripts
     * 
     * @param string $tag    
     * @param string $handle
     *
     * @return void
     */
    public function addAsyncToScripts($tag, $handle)
    {
        if ( !in_array($handle, ['main_scripts', 'true_packed']) ) {
            return $tag;
        }
        return str_replace( ' src', ' async="async" src', $tag );
    }
    
}
