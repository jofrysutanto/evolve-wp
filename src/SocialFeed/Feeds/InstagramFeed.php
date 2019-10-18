<?php
namespace App\SocialFeed\Feeds;

class InstagramFeed extends AbstractFeed
{
    /**
     * Fetch feed from current service
     *
     * @return array
     */
    public function fetch()
    {
        $result = [];
        $accessToken  = $this->config['access_token'];

        try {
            $params = [
                'count'        => $this->config['count'],
                'access_token' => $accessToken,
                'fields' => 'id,caption,media_url,media_type',
            ];
            $params = http_build_query($params);
            $url = "https://graph.instagram.com/me/media/?" . $params;

            $curl = curl_init($url);
            curl_setopt_array($curl, [
                CURLOPT_URL            => $url,
                CURLOPT_TIMEOUT        => 50,
                CURLOPT_RETURNTRANSFER => 1,
            ]);

            $result = json_decode(curl_exec($curl), true);
            if(isset($result['data'])) {
                $result = $result['data'];
            }

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
