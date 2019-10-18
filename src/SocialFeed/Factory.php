<?php
namespace App\SocialFeed;

class Factory extends AbstractFeedFactory
{

    /**
     * Get default service
     *
     * @return string
     */
    public function getDefaultProvider()
    {
        return $this->app['config']['social-feed.default'];
    }

    /**
     * Create Facebook feeds
     *
     * @param  array  $config
     *
     * @return AbstractFeed
     */
    public function createFacebookService($config)
    {
        $service = new Feeds\FacebookFeed($config);
        return $service;
    }

    /**
     * Create Instagram feeds
     *
     * @param  array  $config
     *
     * @return AbstractFeed
     */
    public function createInstagramService($config)
    {
        $service = new Feeds\InstagramFeed($config);
        return $service;
    }

    /**
     * Create Twitter feeds
     *
     * @param  array  $config
     *
     * @return AbstractFeed
     */
    public function createTwitterService($config)
    {
        $service = new Feeds\TwitterFeed($config);
        return $service;
    }
}
