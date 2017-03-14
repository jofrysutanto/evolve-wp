<?php

namespace App\Newsletter;

use EvolveEngine\Core\ServiceProvider;

class NewsletterServiceProvider extends ServiceProvider
{
    
    /**
     * Register this service provider
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('newsletter', function ($app)
        {
            $manager = new NewsletterManager($app);
            return $manager;
        });
    }

}
