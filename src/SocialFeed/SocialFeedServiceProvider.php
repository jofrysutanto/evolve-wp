<?php
namespace App\SocialFeed;

use EvolveEngine\Core\ServiceProvider;

class SocialFeedServiceProvider extends ServiceProvider
{
    
    /**
     * Register this service provider
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('social-feed', function ($app) {
            $factory = new Factory($app);
            return $factory;
        });
        if ($this->app['config']['social-feed.enable_authenticator']) {
            $authenticator = with(new Authenticator())->init();
        }
    }

}
