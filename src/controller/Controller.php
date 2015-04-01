<?php

namespace myapp\controller;

class Controller {

    public function view($view, $var) {
        $loader = new \Twig_Loader_Filesystem(dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'views');
        //$twig = new \Twig_Environment($loader, array(
        //    'cache' => dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'cache',
        //));
        $twig = new \Twig_Environment($loader, array('debug' => true));
        return $twig->render($view . '.html.twig', $var);
    }

}
