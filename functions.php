<?php
// Composer autoload
require __DIR__ . '/vendor/autoload.php';
// Roots
require __DIR__ . '/lib/roots/start.php';

// Kickstart custom engine
$engine = new EvolveEngine\Core\Application(ABSPATH . '../../', __DIR__);
$engine->start();