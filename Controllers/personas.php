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

            $encriptPass = hash('sha512',$_POST["password"]);
            $modelPeople = new People();
            $modelPeople->setName($_POST["name"]);
            $modelPeople->setLastName($_POST["lastName"]);
            $modelPeople->setEmail($_POST["email"]);
            $modelPeople->setPassword($encriptPass);
            $modelPeople->setCuit($_POST["cuit"]);
            $response = $this->model->getPeopleEmail($_POST["email"]);
            if(!$response){
                echo '<script>alert("Este email esta registrado");window.location = "../Personas/crear";</script>';
                exit();
            }

            $response = $this->model->InsertPeople($modelPeople);
            if($response == 1){
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
        $encriptPass = hash('sha512',$_POST["password"]);
        $modelPeople = new People();
        $modelPeople->setEmail($_POST["email"]);
        $modelPeople->setPassword($encriptPass);

        $response = $this->model->getUserLogin($modelPeople);
        if(!$response){
            echo '<script>alert("Email o contraseña incorrecto");window.location = "../Personas/crear";</script>';
            exit();
        }
        $_SESSION['name'] = $_POST["email"];
        header("location:/Productos/index");
    }

    function cerrarSesion(){
        session_start();
        session_destroy();
        header("location:/Inicio/principal");
    }
}

?>