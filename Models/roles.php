<?php 

Class Roles{
    private $pdo;
    private $id;
    private $tipo;

    public function __CONSTRUCT() {
        $this->pdo = DataBase::Conect();
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getTipo() { 
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function listRoles() {
        try{
            $query = $this->pdo->prepare("SELECT * FROM crudstore.roles;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}

?>