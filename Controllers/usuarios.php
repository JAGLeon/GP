<?php
require_once("Models/people.php");
require_once("Models/roles.php");

Class Usuarios{
    public $model;
    public $roles;

    public function __construct(){
        $this->model = new People();
        $this->roles = new Roles();
    }

    public function lista(){
        $titulo = "Usuarios";
        require_once("Views/list.php");
    }

    public function editar(){
        $modelPeople = $this->model->getUserId($_GET['id']);
        require_once("Views/People/profile.php");
    }

    public function administradores(){
        $titulo = "Administradores";
        require_once("Views/list.php");
    }
}

?>