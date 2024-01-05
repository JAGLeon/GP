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
        if(!empty($_POST["name"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["dni"]) && !empty($_POST["cuit"]) && !empty($_POST["birthdate"])){
            $modelPeople = new People();
            $modelPeople->setName($_POST["name"]);
            $modelPeople->setLastName($_POST["lastName"]);
            $modelPeople->setEmail($_POST["email"]);
            $modelPeople->setPassword($_POST["password"]);
            $modelPeople->setDni($_POST["dni"]);
            $modelPeople->setCuit($_POST["cuit"]);
            $modelPeople->setBirthdate($_POST["birthdate"]);

            $response = $this->model->InsertPeople($modelPeople);
            if($response == 1){
                echo '<div class="alert alert-success">Persona registrada correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Ocurrio un error en el servidor</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Hay campos vacios</div>';
        }
    }

}

?>