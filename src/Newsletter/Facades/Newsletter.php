<?php
namespace App\Newsletter\Facades;

use Illuminate\Support\Facades\Facade;

class Newsletter extends Facade
{
    
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'newsletter';
    }

}
