<?php
class App{

    function __construct()
    {
        $tags = isset($_GET) ? array_keys($_GET) : null; // Si existe el metodo GET
        
        $url = explode('/',$tags[0]); // Divide la url por cada '/'. Esto lo convierte en array
        $controlador= $url[1]; // Trae el 1º parametro, para el controllador
        $archivoController = "Controllers/".$controlador.".php"; // La ubicacion del controllador
        if(file_exists($archivoController))// Si existe ese archivo(Controlador)
        { 
            require_once $archivoController; // Trae el archivo
            $controller = new $controlador(); // Invoca el controlador
            $metodo = $url[2]; // Metodo
            $strretornado = $controller->$metodo(); // Invoca el metodo
        }
    }
}

?>