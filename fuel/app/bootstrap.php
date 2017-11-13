<?php

// Load in the Autoloader
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');
Autoloader::add_namespace('Util', APPPATH.'vendor/util/');

// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';


Autoloader::add_classes(array(
	// Add classes you want to override here
	// Example: 'View' => APPPATH.'classes/view.php',
));

// Register the autoloader
Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
switch (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : ''){
    case 'production.co.jp':
        //本番
        Fuel::$env = Fuel::PRODUCTION;
        break;
    case 'staging.co.jp':
        //テスト環境 
        Fuel::$env = Fuel::STAGING;
        break;
    default:
        //ローカル環境
        Fuel::$env = Fuel::DEVELOPMENT;
        break;
}
// Initialize the framework with the config file.
Fuel::init('config.php');
