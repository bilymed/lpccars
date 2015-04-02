<?php

namespace lpccars\controller;
use lpccars\app\App;
use Silex\Application;

class Controller extends App{

    public function views($view, $var) {
        //$loader = new \Twig_Loader_Filesystem(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'views');
        //$twig = new \Twig_Environment($loader, array(
        //    'cache' => dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'cache',
        //));
        //$twig = new \Twig_Environment($loader, array('debug' => true));
       // return $twig->render($view . '.html.twig', $var);
    }
    
    public function view(Application $app,$view, $var){
        return $app['twig']->render($view . '.html.twig', $var);
    }

}
