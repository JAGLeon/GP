<?php
require_once('Config/config.php');
require_once('Libs/controller.php');
require_once('Controllers/errors.php');
require_once('Controllers/logs.php');
require_once('Libs/view.php');
require_once('Libs/dataBase.php');
require_once('Libs/model.php');
require_once('Entities/context.php');
require_once('Controllers/security.php');


class App{
    function __construct()
    {
        $tags=isset($_GET) ? array_keys($_GET):null;

        if($tags==null){
            $controlador=constant('MAINPUBLIC');
            $archivoController='controllers/'.$controlador.'.php';
            if(file_exists($archivoController)){
                require_once $archivoController;
                $controller=new $controlador();
                $controller->ctrlName=$controlador;
                $controller->loadController();
                $controller->index();
            }            
            return false;
        }

        $url=explode('/',$tags[0]);        //personas/buscar
        $controlador=$url[1];
        $archivoController="controllers/".$controlador.'.php';

        if(file_exists($archivoController))
        {
            require_once $archivoController;

            $controller = new $controlador();
            $controller->ctrlName = $controlador;
            $controller->loadController();

            $nparams=sizeof($url);
            if($nparams>2 && $url[2]!=""){
                $method=$url[2];
                $params=[];
                if($nparams>3 && $url[3]!=""){
                    for($i=3; $i< $nparams; $i++){
                        array_push($params,$url[$i]);
                    }
                }
                $controller->{$method}($params);       

            }else{
                $controller->index();
            }
        }else{
            $controller = new Errors();
        }
    }


}

?>