<?php
/**
 * Created by PhpStorm.
 * User: ekkES
 * Date: 4/19/2017
 * Time: 5:15 PM
 */


date_default_timezone_set("Asia/Bangkok");

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

require  __DIR__.'/vendor/autoload.php';

// Instantiate the app
require  __DIR__.'/src/config.inc.php';


// Settings
$settings = require  __DIR__.'/src/settings.php';
$app = new \Slim\App($settings);


$container = $app->getContainer();

session_start();

// Custom functions
require  __DIR__.'/src/functions.php';

// Set up dependencies
require  __DIR__.'/src/dependencies.php';

// Set up controllers
require  __DIR__.'/src/controllers.php';

// Register middleware
require  __DIR__.'/src/middleware.php';

// Register routes
require  __DIR__.'/src/routes.php';

// Run app
$app->run();