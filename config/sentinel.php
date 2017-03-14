<?php

return [
  
    'use-sentinel'   => env('SENTINEL_ACTIVE', true),
    
    'hq-url'         => env('SENTINEL_REMOTE_URL', 'https://hq.trueserver.com.au/'),
    
    'local-url-base' => env('SENTINEL_LOCAL_URL', '/sentinel-api/'),

];