<?php 

class Controller{

    function __construct(){
        $this->log = new Logs;
        $this->view = new View;
        $this->security = new Security;
        $this->sess = new Session;
    }

    function loadController(){
        $this->security->loadSecurity($this->ctrlName);
        $this->view->controlador = $this->ctrlName;
        $this->loadModel($this->ctrlName);
    }

    function loadModel($model){
        $urlModel = "Models/$model"."Model.php";
        if(file_exists($urlModel)){
            require $urlModel;
            $modelName = $model."Model";
            $this->model = new $modelName;
        }
    }


    function existPOST($param){
        if(isset($_POST[$param]) && $_POST[$param] != ""){
            return true;
        }
        error_log("existPOST : No existe el parametro $param");
        return false;
    }

    function getPOST($param){
        if($this->existPOST($param)){
            return $_POST[$param];
        }
        return "";
    }
}
?>