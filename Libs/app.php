<?php

class App{
    function __construct()
    {
        $tags=isset($_GET) ? array_keys($_GET):null;

        $url=explode('/',$tags[0]);        

        $controlador=$url[1];

        $archivoController="controllers/".$controlador.'.php';

        if(file_exists($archivoController))
        {
            require_once $archivoController;

            $controller=new $controlador();

            $metodo=$url[2];

            $strretornado=$controller->$metodo();

            echo $strretornado;
            
        }
    }
}

?>