<?php

namespace App;

use EvolveEngine\Core\WordpressServiceProvider;

class AppServiceProvider extends WordpressServiceProvider
{

    /**
     * These are all custom logic classes we will write
     * to customise and extend our Wordpress site
     *
     * @var array  Assoc array of container alias and class name
     */
    protected $logicClasses = [
        'main'          => Main::class,
        'ajax-handlers' => AjaxHandlers::class,
        'acf-main'      => AcfMain::class
    ];

}
