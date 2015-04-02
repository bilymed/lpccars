<?php

namespace lpccars\model;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {

    private $id;
    private $username;
    private $password;
    private $salt;
    private $role;

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getSalt() {
        return $this->salt;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }

    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }

    public function getRoles() {
        return array($this->getRole());
    }

    public function eraseCredentials() {
        
    }

}
