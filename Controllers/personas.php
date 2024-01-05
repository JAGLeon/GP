<?php

class Personas{

    function __construct()
    {
        echo "estoy en personas<br>";
    }

    function buscar(){
        $prueba="Palermitano";
        return "Eh $prueba estoy en el metodo buscar<br>";
    }
}

?>