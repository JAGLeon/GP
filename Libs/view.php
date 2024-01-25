<?php 
class View{
    public $controlador;
    public function __construct(){

    }

    function render($nombre){
        require_once 'Views/header.php';
        require 'views/' . $this->controlador . '/' . $nombre . '.php';
        require_once 'Views/footer.php';
    }
}

?>