<?php
return [

    /*
    |--------------------------------------------
    | Services
    |--------------------------------------------
    |
    | This value configures which services are available.
    | Set corresponding key in your ".env" file.
    |
    */
    'services' => [
		'google-analytics'   => explode(',', env('GA', '')),
		'google-tag-manager' => explode(',', env('GTM', ''))
    ],

    /*
    |--------------------------------------------
    | Inject
    |--------------------------------------------
    |
    | This value configures the service script to be 
    | injected into which section.
    |
    */
    'inject' => [
		'head'   => ['google-tag-manager'],
		'footer' => ['google-analytics']
    ],

    /*
    |--------------------------------------------
    | Environment
    |--------------------------------------------
    |
    | This value determines the environment for analytics to be injected.
    |
    */
    'environment' => 'production'
];