<?php

namespace lpccars\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use lpccars\service\VoitureService;

class HomeController {

    public function homeAction(Application $app) {
        return $app['twig']->render('home.html.twig');
    }

    public function voituresAction(Application $app) {
        $voitureService = new VoitureService();
        $voitures = $voitureService->findAll();
        //return $this->view('voitures', array('voitures' => $voitures));
        return $app['twig']->render('voitures.html.twig', array('voitures' => $voitures));
    }

    public function contactAction(Application $app) {
        return $app['twig']->render('contact.html.twig');
    }

    public function loginAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
       // return $app['twig']->render('login.html.twig');
    }

}
