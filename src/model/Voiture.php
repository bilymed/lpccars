<?php

namespace lpccars\model;

class Voiture {

    private $id;
    private $name;
    private $url;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getUrl() {
        return $this->url;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setUrl($url) {
        $this->url = $url;
    }

}
