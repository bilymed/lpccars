<?php

namespace myapp\service;
//use myapp\model\Voiture;

class VoitureService {

    public function findAll() {
        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=lpc', 'root', '');
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
        
        $query = $bdd->query('SELECT * FROM voiture');
        $query->setFetchMode(\PDO::FETCH_CLASS, 'myapp\model\Voiture');
        $voitures = array();
        while ($r = $query->fetch()){
            array_push($voitures, $r );
        }
        return $voitures;
    }

}
