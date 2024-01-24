<?php

class Personas extends Controller{

    function __construct()
    {
        parent::__construct();
        //echo "estoy en personas<br>";
    }

    function index(){
        echo"estoy en index de persona";
    }

    function buscar($params){
       $this->view->render('index');
    }
}

?>