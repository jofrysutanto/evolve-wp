<?php

namespace App\Shop;

use EvolveEngine\Core\WordpressBase;

class ShopBase extends WordpressBase
{
    /**
     * Register all custom hooks and filters here
     * Use $this->filter() and $this->action() to register filters and actions.
     *
     * @return void
     */
    public function init()
    {
        add_theme_support('woocommerce');
        add_filter('woocommerce_template_path', function () {
            return 'templates/woocommerce/';
        });

        add_filter('woocommerce_enqueue_styles', '__return_false');
    }
}
