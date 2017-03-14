<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Main extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'main';
    }
}
