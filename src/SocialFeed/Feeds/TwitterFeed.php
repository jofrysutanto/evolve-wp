<?php
namespace App\SocialFeed\Feeds;

class TwitterFeed extends AbstractFeed
{   
    /**
     * Fetch feed from current service
     *
     * @return array
     */
    public function fetch()
    {
        $account = $this->config['account'];
        $result = [];
        try {
            $settings = [
                'oauth_access_token'        => $this->config['oauth_access_token'],
                'oauth_access_token_secret' => $this->config['oauth_access_token_secret'],
                'consumer_key'              => $this->config['consumer_key'],
                'consumer_secret'           => $this->config['consumer_secret'],
            ];

            $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
            $requestMethod = 'GET';
            $curlOptions = [
                CURLOPT_SSL_VERIFYPEER => 0
            ];

            $twitter = new \TwitterAPIExchange($settings);
            $response = $twitter->setGetfield('?screen_name=' . $account . '&count=10')
                ->buildOauth($url, $requestMethod)
                ->performRequest(true, $curlOptions);

            $response = str_replace('\u2026', '', $response);
            $result = json_decode($response, true);
        } 
        catch(\Exception $e) {
            if (config('app.debug') === true) {
                throw $e;
            }
            return [];  
        }
        return $result;
    }

}
