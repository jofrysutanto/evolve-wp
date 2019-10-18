<?php
namespace App\SocialFeed;

use Illuminate\Http\Request;

class Authenticator extends \EvolveEngine\Router\Controller
{
    public function init()
    {
        \Route::get('/social-feed/authentication', [
            'uses' => 'App\SocialFeed\Authenticator@handle',
            'as' => 'feed.auth'
        ]);
        \Route::post('/social/feed/oauth/:type', [
            'uses' => 'App\SocialFeed\Authenticator@oauth',
            'as' => 'feed.oauth'
        ]);
        \Route::get('/social/feed/oauth-redirect/:type', [
            'uses' => 'App\SocialFeed\Authenticator@oauthRedirect',
            'as' => 'feed.oauth-redirect'
        ]);
    }

    /**
     * Handle authentication
     *
     * @param  string $value
     *
     * @return void
     */
    public function handle()
    {
        $services = config('social-feed.services');

        echo app('blade')->render('social-feed/authenticator', [
            'auth' => $this,
            'services' => $services
        ]);
        die;
    }

    public function oauth(Request $request, $service)
    {
        $config = $this->pullConfig($service);
        switch ($config->provider) {
            case 'instagram':
                $redirectUrl = route('feed.oauth-redirect', [
                    'type' => $service
                ]);
                $queryParams = [
                    'app_id' => $config['instagram_app_id'],
                    'redirect_uri' => $redirectUrl,
                    'scope' => 'user_profile,user_media',
                    'response_type' => 'code',
                ];
                $url = sprintf(
                    "https://api.instagram.com/oauth/authorize/?%s",
                    http_build_query($queryParams)
                );
                break;
            case 'facebook':
                $fb = new \Facebook\Facebook([
                    'app_id'                => $config['app_id'],
                    'app_secret'            => $config['app_secret'],
                    'default_graph_version' => 'v2.2',
                ]);
                $helper = $fb->getRedirectLoginHelper();
                $redirectUrl = route('feed.oauth-redirect', [
                    'type' => $service
                ]);
                $permissions = $config['permissions']; // Optional permissions
                $url = $helper->getLoginUrl($redirectUrl, $permissions);
                break;
            default:
                break;
        }

        wp_redirect($url);
        die;

        // dump($request->all());
        // dump($service);
        // die;
    }

    public function oauthRedirect(Request $request, $service)
    {
        $config = $this->pullConfig($service);
        switch ($config->provider) {
            case 'instagram':
                $code = $request->get('code');
                $redirectUrl = route('feed.oauth-redirect', [
                    'type' => $service
                ]);
                $response = $this->curlPost("https://api.instagram.com/oauth/access_token", [
                    'app_id'        => $config['instagram_app_id'],
                    'app_secret'    => $config['instagram_app_secret'],
                    'redirect_uri'  => $redirectUrl,
                    'grant_type'    => 'authorization_code',
                    'code'          => $code
                ]);
                $data = json_decode($response, true);
                if ($errorMessage = array_get($data, 'error_message')) {
                    echo "<h5>$errorMessage</h5>";
                    die;
                }
                $token = array_get($data, 'access_token');
                echo "Your Instagram Access Token: <br>";
                echo $token;
                break;

            case 'facebook':
                $fb = new \Facebook\Facebook([
                    'app_id'                => $config['app_id'],
                    'app_secret'            => $config['app_secret'],
                    'default_graph_version' => 'v2.2',
                ]);
                $helper = $fb->getRedirectLoginHelper();
                try {
                    $accessToken = $helper->getAccessToken();
                } catch (\Facebook\Exceptions\FacebookResponseException $e) {
                    // When Graph returns an error
                    echo 'Graph returned an error: ' . $e->getMessage();
                    exit;
                } catch (\Facebook\Exceptions\FacebookSDKException $e) {
                    // When validation fails or other local issues
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    exit;
                }
                if (! isset($accessToken)) {
                    if ($helper->getError()) {
                        header('HTTP/1.0 401 Unauthorized');
                        echo "Error: " . $helper->getError() . "\n";
                        echo "Error Code: " . $helper->getErrorCode() . "\n";
                        echo "Error Reason: " . $helper->getErrorReason() . "\n";
                        echo "Error Description: " . $helper->getErrorDescription() . "\n";
                    } else {
                        header('HTTP/1.0 400 Bad Request');
                        echo 'Bad request';
                    }
                    exit;
                } else {
                    echo "Your Facebook Access Token: <br>";
                    echo $accessToken;
                }
                break;

            default:
                break;
        }

        die;
    }

    public function curlPost($url, $params = [])
    {
        $ch = curl_init();
        $params = http_build_query($params);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return $response;
    }

    protected function pullConfig($key)
    {
        return fluent(config('social-feed.services.' . $key, []));
    }
}
