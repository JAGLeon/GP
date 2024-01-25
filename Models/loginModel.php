<?php  

class LoginModel extends Model {
    public $msg = "";

    public function __construct() {
        parent::__construct();
    }

    public function login($usuario, $password) {
        try{
            $query = "SELECT * FROM usuarios WHERE usuario = '".$usuario."';";
            $pdo = $this->db->connect();
            $sql = $pdo->prepare($query);
            $sql->execute();
            if($sql->rowCount() == 1){
                $row = $sql->fetch();
                if($row['contrasenia'] == md5($password)){
                    $this->msg = "success";
                    $this->user = $row;

                    return true;
                } else {
                    $this->msg = "La contraseña no coincide.";
                    return false;
                }
            } else {
                $this->msg = "No existe el usuario";
                return false;
            }
        }catch(PDOException $e){
            error_log("LoginModel :: login ==> Exception $e");
            return false;
        }
    }

}

?>