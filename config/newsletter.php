<?php

return [

    /**
     * Supported drivers:
     * 'mailchimp'
     */
    'default'     => 'mailchimp',

    'defaultList' => env('MAILCHIMP_LIST_ID'),

    'connections' => [

        'mailchimp' => [
            'api_key' => env('MAILCHIMP_API_KEY')
        ]

    ]

];
