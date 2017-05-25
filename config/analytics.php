<?php
return [
    'services' => [
		'google-analytics'   => explode(',', env('GA', '')),
		'google-tag-manager' => explode(',', env('GTM', ''))
    ]
];