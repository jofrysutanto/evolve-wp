<?php
namespace App\SocialFeed\Feeds;

class FacebookFeed extends AbstractFeed
{   
    /**
     * Fetch feed from current service
     *
     * @return array
     */
    public function fetch()
    {
        $result = [];
        $account = $this->config['account'];
        $accessToken = $this->config['access_token'];

        $params = [
            'fields'       => 'message,link,attachments',
            'limit'        => 20,
            'access_token' => $accessToken
        ];
        $params   = http_build_query($params);
        $url      = sprintf("https://graph.facebook.com/%s/posts?%s", $account, $params);

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT        => 50,
        ]);
        try {
            $response = json_decode(curl_exec($curl), true);
            foreach(array_get($response, 'data', []) as $post) {
                if(!isset($post['message']) || trim($post['message']) == '') {
                    continue;
                }
                $newPost = [];
                $newPost['message'] = $post['message'];

                if(isset($post['attachments']['data'])) {
                    $linkedPost = array_shift($post['attachments']['data']);
                    if(isset($linkedPost['media']['image'])) {
                        $newPost['photo'] = $linkedPost['media']['image']['src'];
                    }
                }
                $result[] = $newPost;
            }
        } catch (\Exception $e) {
            if (config('app.debug') === true) {
                throw $e;
            }
            return $e;
        }
        return $result;
    }

}
