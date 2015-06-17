<?php

// Retrieve instance of the framework
require_once __DIR__ . '/vendor/autoload.php';
$f3 = \Base::instance();

// Initialize config
$f3->set('AUTOLOAD','classes/');
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', FALSE);
date_default_timezone_set('Europe/Stockholm');
// Set Web API response header (allow origin all)
header('Access-Control-Allow-Origin: *');  
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

// Define routes
$f3->route('POST /bowling/score','Controller\Bowling->Score');

// Execute application
$f3->run();
