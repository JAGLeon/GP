<?php 

class People{
    private $pdo;
    private $id;
    private $name;
    private $lastName;
    private $dni;
    private $cuit;
    private $email;
    private $birthdate;
    private $password;
    private $img;

    public function __construct()
    {
        $this->pdo = DataBase::Conect();
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getCuit(){
        return $this->cuit;
    }
    public function setCuit($cuit){
        $this->cuit = $cuit;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }
    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function getImg(){
        return $this->img;
    }
    public function setImg($img){
        $this->img = $img;
    }

    public function InsertPeople(People $people){
        try {
            $query = "INSERT INTO crudstore.people(name,lastName,dni,cuit,email,password,birthdate) VALUES (?,?,?,?,?,?,?);";
            $this->pdo->prepare($query)->execute(array(
                $people->getName(),
                $people->getLastName(),
                $people->getDni(),
                $people->getCuit(),
                $people->getEmail(),
                $people->getPassword(),
                $people->getBirthdate(),
            ));
            return 1;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>