<?php
return [
    'default' => null,

    /**
     * Enable authenticator helper to obtain credentials
     * Url: http://mysite.dev/social-feed/authentication
     * Highly recommend to set to TRUE only when needed.
     */
    'enable_authenticator' => env('SOCIAL_FEED_AUTHENTICATOR_ENABLED', true),

    /**
     * Set to true to cache feeds locally
     * Highly recommend to set to true on production
     */
    'enable_cache' => env('SOCIAL_FEED_CACHE_ENABLED', true),

    /**
     * Each service provider requires different configuration value, except for these:
     * - provider : Support providers are 'facebook', 'instagram', 'twitter'
     *     - 'facebook' requires `facebook/graph-sdk`, see: https://developers.facebook.com/docs/reference/php/
     *     - 'twitter' requires `j7mbo/twitter-api-php`, see: https://github.com/J7mbo/twitter-api-php
     * - lifetime : Defines the cache lifetime, defaults to 15 minutes.
     *
     * For instagram,
     * - read in-depth step-by-step guide by instagram
     * @see https://developers.facebook.com/docs/instagram-basic-display-api/getting-started
     * - the api returned will follow these specs
     * @see https://developers.facebook.com/docs/instagram-basic-display-api/reference/media#fields
     */
    'services' => [
        'instagram' => [
            'provider'             => 'instagram',
            'account'              => '_instagram_handle',
            'instagram_app_id'     => '11111111111',
            'instagram_app_secret' => 'abcdef123456789',
            'access_token'         => '',
            'count'                => 6
        ],
    ]
];
