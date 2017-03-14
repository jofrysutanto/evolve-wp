<?php
namespace App\Newsletter;

use App\Newsletter\Subscribers\MailchimpSubscriber;
use Illuminate\Support\Manager;

class NewsletterManager extends Manager
{

    /**
     * Create new mailchimp driver
     *
     * @return NewsletterContract
     */
    protected function createMailchimpDriver()
    {
        $config = $this->app['config']['newsletter.connections.mailchimp'];

        return new MailchimpSubscriber($config);
    }
    
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver() 
    {
        $default = $this->app['config']['newsletter.default'];

        return $default ? $default : 'mailchimp';
    }

}