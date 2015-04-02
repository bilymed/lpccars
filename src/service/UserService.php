<?php

namespace lpccars\service;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserService implements UserProviderInterface {

    private $bdd;

    public function connection() {
        try {
            $this->bdd = new \PDO('mysql:host=localhost;dbname=lpc', 'root', '');
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function find($id) {
        $this->connection();
        $query = $this->bdd->query("SELECT * FROM user WHERE id=?");
        $query->execute(array(':id' => $id));
        $row = $query->fetch();
        
        var_dump($query);
        //$query->setFetchMode(\PDO::FETCH_CLASS, 'lpccars\model\User');
        //$query->bindParam($id, PDO::PARAM_INT);
        //$user = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row) {
            return $query;
        } else {
            throw new \Exception("No user matching id " . $id);
        }
    }

    public function loadUserByUsername($username) {
        $this->connection();
        
        $query = $this->bdd->prepare("SELECT * FROM user WHERE username = :username");
        $query->setFetchMode(\PDO::FETCH_CLASS, 'lpccars\model\User');
        
        $query->execute(array(':username' => $username));
        $row = $query->fetch();
        var_dump($row);
       
        //$query->setFetchMode(\PDO::FETCH_CLASS, 'lpccars\model\User');
        //$query->bindParam($username, PDO::PARAM_VARCHAR);
        //$user = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row) {
            //$query->setFetchMode(\PDO::FETCH_CLASS, 'lpccars\model\User');
            //$query->bindParam($username, PDO::PARAM_VARCHAR);
            return $row;
        } else {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
            
        }
    }

    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return 'lpccars\model\User' === $class;
    }

}
