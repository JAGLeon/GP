<?php
class App{
    private $model;
    function __construct()
    {
        $tags = isset($_GET) ? array_keys($_GET) : null; // Si existe el metodo GET
        
        $url = explode('/',$tags[0]); // Divide la url por cada '/'. Esto lo convierte en array
        $controlador= $url[1]; // Trae el 1º parametro, para el controllador
        switch ($controlador){
            case 'apiProductos':
                $this->controllerMetodo($controlador, $url);
                break;
            case "apiCarrito":
                $this->controllerMetodo($controlador, $url);
                break;
            default:
                $this->controllerMetodo($controlador, $url);
                break;
        }
    }

    function controllerMetodo(string $controlador,array $url){
        if( strpos($controlador,"api") === false){
            $archivoController = "Controllers/".$controlador.".php"; // La ubicacion del controllador
        } else {
            $archivoController = "Api/".$controlador.".php"; // La ubicacion del controllador
        }

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

