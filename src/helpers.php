<?php

if (! function_exists('content')) {
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
        $acfKey    = array_shift($fragments);
        $acfResult = get_field($acfKey, $id, $format);
        if (!is_array($acfResult)) {
            return $default;
        }
        return array_get($acfResult, implode('.', $fragments), $default);
    }
}
