<?php
return [

    /**
     * Wordpress will automatically crop and resize uploaded images to these sizes
     * @link https://codex.wordpress.org/Post_Thumbnails#Thumbnail_Sizes
     */
    'image-sizes' => [
        'full-width' => [1920, 999999],
        'half-width' => [960,  9999],
    ],

    /**
     * Limit number of revisions stored by Wordpress
     * @link https://wordpress.org/support/article/revisions/#revision-options
     */
    'limit_revision' => 5,

];
