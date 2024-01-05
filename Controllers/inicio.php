<?php
require_once("Models/product.php");
class Inicio
{
    private $model;
    public function __construct(){
        $this->model = new Product();
    }

    public function principal(){
        require_once("Views/header.php");
        require_once("Views/Inicio/principal.php");
        require_once("Views/footer.php");

    }    
}


?>