<?php

namespace App\Wordpress;

use EvolveEngine\Core\WordpressBase;

class Cleanup extends WordpressBase
{
    /**
     * Hooks and filters for cleaning up Wordpress clutter
     * and general upgrade modifications
     *
     * @return void
     */
    public function init()
    {
        //
        // Actions
        // ==
        $this->action('init', ['disableEmojis', 'disableEmbed']);
        $this->action('wp_print_styles', ['removeGutenbergStyles']);
        // Disable this if this causes other plugins to break
        $this->action('wp_enqueue_scripts', 'enableJqueryCdn');
        $this->action('admin_menu', 'removeMetaBoxes');
        $this->action('wp_before_admin_bar_render', 'cleanupAdminBar');

        //
        // Filters
        // ==
        $this->filter('wp_revisions_to_keep', 'limitRevisions', 10, 2);
        // Contact Form 7, only load these on pages which requires them
        $this->filter('wpcf7_load_js', 'cf7Js');
        $this->filter('wpcf7_load_css', 'cf7Css');
        // Remove auto line-breaks
        add_filter('wpcf7_autop_or_not', '__return_false');
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
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
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
     * Removes additional styles given by gutenberg
     *
     * @return void
     */
    public function removeGutenbergStyles()
    {
        wp_dequeue_style('wp-block-library');
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
        if (is_front_page()) {
            return false;
        }
        return true;
    }

    /**
     * Limit number of revisions stored by Wordpress
     * @see https://wordpress.org/support/article/revisions/#revision-options
     *
     * @param integer $count
     * @param Post $post Use this variable to limit revisions for certain post_type
     * @return integer|false
     */
    public function limitRevisions($count, $post)
    {
        $config = config('theme.limit_revision');
        if (is_null($config)) {
            return $count;
        }
        return $config;
    }

    /**
     * Use our own version of jQuery
     *
     * @return void
     */
    public function enableJqueryCdn()
    {
        $version = '3.3.1';
        wp_deregister_script('jquery');
        wp_register_script(
            'jquery',
            'https://code.jquery.com/jquery-' . $version . '.min.js',
            [],
            null,
            true
        );
        add_filter('wp_resource_hints', function ($urls, $relation_type) {
            if ($relation_type === 'dns-prefetch') {
                $urls[] = 'code.jquery.com';
            }
            return $urls;
        }, 10, 2);
    }

    /**
     * Remove various meta boxes which isn't very useful for site admin
     *
     * @return void
     */
    public function removeMetaBoxes()
    {
        remove_meta_box('dashboard_right_now', 'dashboard', 'core');
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
        remove_meta_box('dashboard_plugins', 'dashboard', 'core');
        remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
        remove_meta_box('dashboard_primary', 'dashboard', 'core');
        remove_meta_box('dashboard_secondary', 'dashboard', 'core');
        remove_meta_box('dashboard_activity', 'dashboard', 'core');
    }

    /**
     * Clean up admin bar links
     *
     * @return void
     */
    public function cleanupAdminBar()
    {
        $toRemove = [
            'wp-logo',
            'comments',
            'customize',
            'widgets',
            'wpseo-menu',
            'itsec_admin_bar_menu',
            'sendgrid_statistics_widget',
        ];
        global $wp_admin_bar;
        collect($toRemove)
            ->each(function ($item) use ($wp_admin_bar) {
                $wp_admin_bar->remove_menu($item);
            });
    }
}
