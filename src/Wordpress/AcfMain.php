<?php
namespace App\Wordpress;
use EvolveEngine\Core\WordpressBase;

class AcfMain extends WordpressBase
{
    /**
     * Custom ACF hooks and filters
     */
    
    /**
     * Register all custom hooks and filters here
     * Use $this->filter() and $this->action() to register filters and actions.
     *
     * @return void
     */
    public function init()
    {
        $this->action('acf/init', 'addGmapKey');
    }

    /**
     * Register Google Map API key to prevent map error
     */
    public function addGmapKey()
    {
        $key = env('GMAP_API_KEY', false);
        if (!$key) {
            return;
        }
        acf_update_setting('google_api_key', $key);
    }
    
}
