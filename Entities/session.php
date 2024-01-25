<?php 

class Session{
    private $sessionUser = 'user';
    private $sessionUserId = 'idUser';
    private $sessionInitial = 'init';
    private $sessionName = 'name';
    private $sessionLastName = 'lastName';

    public function __construct(){
        
    }

    public function setCurrentUser($user){
        $_SESSION[$this->sessionUser] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION[$this->sessionUser];
    }


    public function setCurrentUserId($userId){
        $_SESSION[$this->sessionUserId] = $userId;
    }
    public function getCurrentUserId(){
        return $_SESSION[$this->sessionUserId];
    }

    public function setCurrentInitial(){
        $_SESSION[$this->sessionInitial] = substr($this->getCurrentName(),0,1).substr($this->getCurrentLastName(),0,1);
    }
    public function getCurrentInitial(){
        return $_SESSION[$this->sessionInitial];
    }

    public function setCurrentName($userName){
        $_SESSION[$this->sessionName] = $userName;
    }
    public function getCurrentName(){
        return $_SESSION[$this->sessionName];
    }

    public function setCurrentLastName($userLastName){
        $_SESSION[$this->sessionLastName] = $userLastName;
    }
    public function getCurrentLastName(){
        return $_SESSION[$this->sessionLastName];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }

    public function exsistSession(){
        return isset($_SESSION[$this->sessionUser]);
    }
}

?>