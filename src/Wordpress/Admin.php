<?php

namespace App\Wordpress;

use EvolveEngine\Core\WordpressBase;

class Admin extends WordpressBase
{
    /**
     * Hooks and filters for Wordpress Admin backend environment
     *
     * @return void
     */
    public function init()
    {
        //
        // Actions
        // ==
        $this->action('login_head', ['addFavIcon', 'loginStyles'], 99);
        $this->action('admin_head', 'addFavIcon');
        $this->action('admin_init', 'activateAcf');

        //
        // Filters
        // ==
    }

    //
    // Hooks, Actions, & Filters
    //

    /**
     * Custom admin styling for login
     *
     * @return void
     */
    public function loginStyles()
    {
        echo app('blade')->render('admin.login');
    }

    /**
     * Adding favicon
     *
     * @return void
     */
    public function addFavIcon()
    {
        $url = asset_path('images/brand/favicon.png');
        echo sprintf('<link rel="shortcut icon" href="%s" />', $url);
    }

    /**
     * Activates ACF license if NOT already activated
     *
     * @return void
     */
    public function activateAcf()
    {
        if (
            function_exists('acf') &&
            is_admin() &&
            !acf_pro_get_license_key() &&
            env('ACF_PRO_LICENSE')
        ) {
            acf_pro_update_license(env('ACF_PRO_LICENSE'));
        }
    }
}
