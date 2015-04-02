<?php

namespace lpccars\app;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use lpccars\service\UserService;

class App {

    public function run() {
        
        $app = new Application();

        // Register global error and exception handlers
        ErrorHandler::register();
        ExceptionHandler::register();

        //Register service providers
        $app->register(new TwigServiceProvider(), array(
            'twig.path' => ROOT . DIRECTORY_SEPARATOR . 'views',
        ));
        $app->register(new SessionServiceProvider());
        $app->register(new UrlGeneratorServiceProvider());
        $app->register(new SecurityServiceProvider(), array(
            'security.firewalls' => array(
                'secured' => array(
                    'pattern' => '^/',
                    'anonymous' => true,
                    'logout' => true,
                    'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
                    'users' => $app->share(function () {
                        return new UserService();
                    }),
                ),
            ),
            'security.role_hierarchy' => array(
                'ROLE_ADMIN' => array('ROLE_USER'),
            ),
            'security.access_rules' => array(
                array('^/admin', 'ROLE_ADMIN'),
            ),
        ));

        //$app['debug'] = true;

        require 'routes.php';

        $app->run();
    }

}
