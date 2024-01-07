<?php
require_once("Models/people.php");
class Personas{
    public $model;
    function __construct()
    {
        $this->model = new People();
    }

    function crear()
    {
        require_once("Views/People/formRegister.php");
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
        session_start();
        $modelPeople = new People();
        $modelPeople->setEmail($_POST["email"]);
        $modelPeople->setPassword($_POST["password"]);

        $response = $this->model->getUserLogin($modelPeople);
        if(!$response){
            echo '<script>alert("Email o contraseña incorrecto");window.location = "../Personas/crear";</script>';
            exit();
        }
        $_SESSION['id'] = $response->getId();
        $_SESSION['name'] = $response->getName();
        header("location:/Productos/index");
    }

    function cerrarSesion(){
        session_start();
        session_destroy();
        header("location:/Personas/crear");
    }

    function verificarSesion(){
        session_start();
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