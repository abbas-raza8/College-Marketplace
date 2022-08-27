<?php

// URL to website: https://cs4640.cs.virginia.edu/as9qp/sprint3/

// Register the autoloader
spl_autoload_register(function($classname) { 
    include "classes/$classname.php";
});

//**********************
// If we use Composer to include the Monolog Logger
// include "vendor/autoload.php";
//
// use \Monolog\Logger;
// use \Monolog\Handler\BrowserConsoleHandler;
// $log = new BrowserConsoleHandler();
//**********************

// Parse the query string for command
$command = "login-existing";
if (isset($_GET["command"]))
    $command = $_GET["command"];

// If the user's email is not set in the cookies, then it's not
// a valid session (they didn't get here from the login page),
// so we should send them over to log in first before doing
// anything else!
// if (!isset($_COOKIE["email"])) {
//     // they need to see the login
//     $command = "login-existing";
// }

// Instantiate the controller and run
$trivia = new CollegeController($command);
$trivia->run();

