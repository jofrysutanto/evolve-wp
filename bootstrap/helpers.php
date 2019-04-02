<?php

use EvolveEngine\Core\Application as Container;

/**
 * Get the sage container, proxy back to our core app()
 * for sage compatibility
 *
 * @param string $abstract
 * @param array  $parameters
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [])
{
    return app($abstract, $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\EvolveEngine\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
// function config($key = null, $default = null)
// {
//     if (is_null($key)) {
//         return app('config');
//     }
//     if (is_array($key)) {
//         return app('config')->set($key);
//     }
//     return app('config')->get($key, $default);
// }

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return app('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return app('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return app('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = '#^(' . implode('|', $paths) . ')/#';

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function find_template($templates)
{
    return locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

if (!function_exists('content')) {
    /**
     * Get acf content value, very similiar signature as get_field
     * however with dot syntax for safe retrieval.
     *
     * @param string      $key ACF name
     * @param string|null $id  ACF key, defaults to current post id
     * @param boolean     $format  Return formatted value
     * @param mixed       $default Default value if value don't exists
     *
     * @return mixed
     */
    function content($key, $id = false, $format = true, $default = null)
    {
        if (strpos($key, '.') === false) {
            $result = get_field($key, $id, $format);
            return !empty($result)
                ? $result
                : $default;
        }
        $fragments = explode('.', $key);
        $acfKey = array_shift($fragments);
        $acfResult = get_field($acfKey, $id, $format);
        if (!is_array($acfResult)) {
            return $default;
        }
        return array_get($acfResult, implode('.', $fragments), $default);
    }
}
