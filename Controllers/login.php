<?php 

class Login extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->urllin = constant('URL')."login/in";
        $this->view->render('index');
    }

    public function in(){
        $msgError = "";
        $accErr=true;
        $logueado = false;
        if(!$this->existPOST('usuario')){
            $msgError = $msgError."Debo competar el campo usuario. <br>";
            $accErr=false;
        }

        if(!$this->existPOST('clave')){
            $msgError = $msgError."Debo competar el campo clave. <br>";
            $accErr=false;
        }

        if(!$this->existPOST('formIn') || $this->existPOST('formIn') != session_id()){
            $msgError = $msgError."El formulario no es de Confianza. <br>";
            $accErr=false;
        }

        if(!$accErr){
            echo "ERROR|$msgError";
            return;
        }

        if($this->model->login($this->getPOST('usuario'),$this->getPOST('clave'))){
            $rowUser = $this->model->user;
            $this->sess->setCurrentUser($rowUser['usuario']);
            $this->sess->setCurrentUserId($rowUser['id']);
            $this->sess->setCurrentName($rowUser['nombre']);
            $this->sess->setCurrentLastName($rowUser['apellido']);
            echo constant('URL');
        } else {
            echo 'ERROR|'.$this->model->msg;
        }
    }

}

?>