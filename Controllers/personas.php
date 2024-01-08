<?php
require_once("Models/people.php");
session_start();

class Personas{
    public $model;
    function __construct()
    {
        $this->model = new People();
    }

    function crear()
    {
        $this->restriccionUsuario();
        require_once("Views/People/formRegister.php");
    }

    function restriccionUsuario(){
        if(isset($_SESSION['id'])){
            $this->rolePersona();
            exit();
        }
    }
    function registrar()
    {
        if(!empty($_POST["name"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["cuit"])){
            $encriptPass = password_hash($_POST["password"],PASSWORD_DEFAULT,["cost" => 10]);
            $modelPeople = new People();
            $modelPeople->setName($_POST["name"]);
            $modelPeople->setLastName($_POST["lastName"]);
            $modelPeople->setEmail($_POST["email"]);
            $modelPeople->setPassword($encriptPass);
            $modelPeople->setCuit($_POST["cuit"]);
            $response = $this->model->getPeopleEmail($_POST["email"]);
            if($response){
                echo '<script>alert("Este email esta registrado");window.location = "../Personas/crear";</script>';
                exit();
            }
            $response = $this->model->InsertPeople($modelPeople);
            if($response){
                echo '<script>alert("Se registro");window.location = "../Personas/crear";</script>';
            } else {
                echo '<script>alert("Ocurrio un error en la base de datos");window.location = "../Personas/crear";</script>';
            }
        } else {
            echo '<script>alert("Hay campos vacios");window.location = "../Personas/crear";</script>';
        }
    }
    function ingresar(){
        $modelPeople = new People();
        $modelPeople->setEmail($_POST["email"]);
        $modelPeople->setPassword($_POST["password"]);

        $response = $this->model->getUserLogin($modelPeople);
        if(!$response){
            echo '<script>alert("Email o contraseña incorrecto");window.location = "../Personas/crear";</script>';
            exit();
        }
        $this->redireccionPersona($response);
    }
    function redireccionPersona(People $people){
        $this->asignarSesion($people);
        $this->rolePersona();
    }
    function asignarSesion(People $people){
        $_SESSION['id'] = $people->getId();
        $_SESSION['name'] = $people->getName();
        $_SESSION['role'] = $people->getRole_id();
        $_SESSION['roleTxt'] = $people->getRoleTxt();
    }
    function rolePersona(){
        if (isset($_SESSION["role"])) {
            switch ($_SESSION["role"]) {
                case 1:
                    header("location:/Productos/crear");
                    break;
                case 2:
                    header("location:/Inicio/principal");
                    break;
                default;
            }
        }
    }
    function cerrarSesion(){
        session_destroy();
        header("location:/Personas/crear");
    }
    function verificarSesion(){
        if (!isset($_SESSION["id"])) {
            echo '<script>alert("Por favor debes iniciar sesion");window.location = "../Personas/crear";</script>';
            session_destroy();
            die();
        }
    }
    function perfil(){
        $tags = isset($_GET) ? array_keys($_GET) : null;
        $url = explode('/',$tags[0]);
        $id = $url[3];
        $modelPeople = new People();
        $modelPeople = $this->model->getUserId($id);
        require_once("Views/People/profile.php");
    }
}

?>