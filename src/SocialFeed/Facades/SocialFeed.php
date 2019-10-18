<?php
namespace App\SocialFeed\Facades;

use Illuminate\Support\Facades\Facade;

class SocialFeed extends Facade
{
    
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'social-feed';
    }

}
