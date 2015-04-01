<?php

namespace myapp\controller;

use myapp\service\VoitureService;

class HomeController extends Controller {

    public function homeAction() {
        return $this->view('home', array());
    }

    public function voituresAction() {
        $voitureService = new VoitureService();
        $voitures = $voitureService->findAll();
        return $this->view('voitures', array('voitures' => $voitures));
    }

    public function contactAction() {
        return $this->view('contact', array());
    }
    
    public function saveAction(){
        
    }

}
