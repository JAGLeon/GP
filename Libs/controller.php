<?php 

class Controller{
    public $log;
    public $view;
    public $ctrlName;
    function __construct(){
        $this->log = new Logs;
        $this->view = new View;
    }

    function loadController(){
        $this->view->controlador = $this->ctrlName;
    }
}

?>