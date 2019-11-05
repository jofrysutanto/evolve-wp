<?php

namespace App\Wordpress;

use EvolveEngine\Core\WordpressBase;

class ApiHandlers extends WordpressBase
{
    /**
     * Independent class for ajax events
     * Use $this->ajax() to register ajax method
     *
     * @return void
     */
    public function init()
    {
        //
        // Filters
        // ==
        // $this->filter('rest_{custom_post_type}_query', ['defaultRestQuery', 'defaultRestLimit'], 10, 2);

        //
        // Ajax
        // ==
        $this->action('rest_api_init', ['registerEndpoints']);
    }

    /**
     * Set default 'order by' for API
     *
     * @param array $args
     * @param Object $request
     * @return void
     */
    public function defaultRestQuery($args, $request)
    {
        $args['orderby'] = 'menu_order';
        return $args;
    }

    /**
     * Set default 'post per page' for API
     *
     * @param array $args
     * @param Object $request
     * @return void
     */
    public function defaultRestLimit($args, $request)
    {
        $args['posts_per_page'] = 100;
        return $args;
    }

    /**
     * Register custom endpoints for our API handler
     *
     * @return void
     */
    public function registerEndpoints()
    {
        // register_rest_route('app/v1', '/ping', [
        //     'methods'  => 'GET',
        //     'callback' => [$this, 'sendPingResponse'],
        // ]);
        // register_rest_route('app/v1', '/secret-admin-endpoint', [
        //     'methods'  => 'GET',
        //     'callback' => [$this, 'sendPingResponse'],
        //     'permission_callback' => [$this, 'isAdmin'],
        // ]);
    }

    /**
     * Return simple ping-pong response
     *
     * @return Response
     */
    public function sendPingResponse()
    {
        // You may use app('request) to access request object
        // @see https://laravel.com/docs/5.5/requests
        return rest_ensure_response(['status' => 'Pong!']);
    }

    /**
     * Admin authentication guard
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return user_can(wp_get_current_user(), 'administrator');
    }
}
