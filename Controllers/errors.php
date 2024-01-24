<?php 
    class Errors extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->msg = "Hubo un error o no se encontro el controlador";
            $this->view->controlador="errors";
            $this->view->render('index');
        }


    }

?>