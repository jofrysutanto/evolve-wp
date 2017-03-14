<?php

/**
 * Roots includes
 */
$rootPath = '/lib/roots/';
$rootModules = [
    'utils',            // Utility functions
    'init',             // Initial theme setup and constants
    'wrapper',          // Theme wrapper class
    'sidebar',          // Sidebar class
    'config',           // Configuration
    'titles',           // Page titles
    'cleanup',          // Cleanup
    'nav',              // Custom nav modifications
    'gallery',          // Custom [gallery] modifications
    'comments',         // Custom comments modifications
    'relative-urls',    // Root relative URLs
    'widgets',          // Sidebars and widgets
    'scripts',          // Scripts and stylesheets
    'custom',           // Custom functions
];
foreach ($rootModules as $mod) {
    require_once locate_template($rootPath . $mod . '.php');
} 