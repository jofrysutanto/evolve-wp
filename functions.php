<?php
function getAssetVersion() {
    $version = json_decode(file_get_contents(get_template_directory() . '/assets/version.json'), true);
    return isset($version['version'])
        ? $version['version']
        : 1;
}

define('ASSET_VERSION', getAssetVersion());


// Composer autoload
require __DIR__ . '/vendor/autoload.php';
// Roots
require __DIR__ . '/lib/roots/start.php';

// Kickstart custom engine
$engine = new EvolveEngine\Core\Application(ABSPATH . '../../', __DIR__);
$engine->start();