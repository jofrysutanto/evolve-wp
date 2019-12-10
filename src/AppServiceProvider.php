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
        'cleanup'        => Wordpress\Cleanup::class,
        'admin-override' => Wordpress\Admin::class,
        'acf-main'       => Wordpress\AcfMain::class,

        // Your custom logic providers
        'main'           => Wordpress\Main::class,
        'ajax-handlers'  => Wordpress\AjaxHandlers::class,
        'api-handlers'   => Wordpress\ApiHandlers::class,
    ];
}
