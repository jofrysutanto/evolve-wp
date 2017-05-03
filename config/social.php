<?php
return [
    
    /*
    |--------------------------------------------------------------------------
    | Social Sharing
    |--------------------------------------------------------------------------
    |
    | This value configures which social sharing services are available.
    | It is possible to define multiple configuration which can 
    | be specified whe rendering the share view.
    |
    */
    'share' => [
        'default' => [
            // Array of social providers
            // Valid values are: 'facebook', 'twitter', 'linkedin', 'googleplus'
            'services' => [
                'facebook', 'twitter', 'linkedin', 'googleplus'
            ],

            // Template used to render the share widget,
            // if set to null a default HTML markup will be used.
            // if string is given, will assume this points to a template file in the theme
            'template' => null,

            // Specify where the shared url will come from
            // - null   : Share current page (default behaviour)
            // - string : Force all share to use the given url. Useful if you only want to share specific url, such as homepage.
            'custom_resolver' => null,
        ]
    ]

];