<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use Illuminate\Support\Fluent;

class App extends Controller
{
    /**
     * Get website name
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name');
    }

    /**
     * Retrieve agency's UTM tracking meta information
     *
     * @return Fluent
     */
    public function utm()
    {
        $params = [
            'utm_source'   => 'client',
            'utm_campaign' => env('UTM_CAMPAIGN', ''),
            'utm_medium'   => 'website',
        ];
        $theme = env('TRUE_LOGO') === 'white' ? 'white' : 'dark';
        $siteUrl = 'https://trueagency.com.au?' . http_build_query($params);
        $label = 'Digital Agency';
        return new Fluent([
            'label'      => $label,
            'link_title' => 'Digital Agency Melbourne',
            'url'        => $siteUrl,
            'theme'      => $theme,
            'logo'       => $theme === 'white'
                ? asset('images/common/true-logo-white.svg')
                : asset('images/common/true-logo.svg'),
        ]);
    }

    /**
     * Retrieve current page's title
     *
     * @return string
     */
    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
