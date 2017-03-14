<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
    'footer_top_navigation' => __('Footer Top Navigation', 'roots'),
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');
