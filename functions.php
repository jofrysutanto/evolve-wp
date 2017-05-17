<?php
// Composer autoload
require __DIR__ . '/vendor/autoload.php';
// Roots
require __DIR__ . '/lib/roots/start.php';

// Load environment file
$dotenv = new \Dotenv\Dotenv(__DIR__);
if (file_exists(__DIR__ . '/.env')) {
   $dotenv->load();
}

// Kickstart custom engine
$engine = new EvolveEngine\Core\Application(ABSPATH . '../../', __DIR__);
$engine->start();