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

    public function administradores(){
        $titulo = "Administradores";
        require_once("Views/list.php");
    }

    public function eliminar(){
        $tags = isset($_GET) ? array_keys($_GET) : null;
        $url = explode('/',$tags[0]);
        $id = $url[3];
        $this->model->deletePeople($id);
        echo '<script>window.history.back();</script>';
    }
}

?>