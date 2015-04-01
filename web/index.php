<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once 'rb.php';

//use Symfony\Component\Debug\ErrorHandler;
//use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
//ErrorHandler::register();
//ExceptionHandler::register();

$app = new \Silex\Application();
$app['debug'] = true;

// Register service providers.
//$app->register(new Silex\Provider\TwigServiceProvider(), array(
//    'twig.path' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views',
//));


require __DIR__.'/../app/routes.php';

$app->run();

