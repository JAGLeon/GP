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

    public function getId() :?int{
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getName() :?string{
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getLastName() :?string{
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

    public function getEmail() :?string{
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
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
            $dni = substr(substr($people->getCuit(),2),0,-1) ;
            $query = "INSERT INTO crudstore.people(name,lastName,dni,cuit,email,password) VALUES (?,?,?,?,?,?);";
            $this->pdo->prepare($query)->execute(array(
                $people->getName(),
                $people->getLastName(),
                $dni,
                $people->getCuit(),
                $people->getEmail(),
                $people->getPassword(),
            ));
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getPeopleEmail($email){
        try {
            $query = $this->pdo->prepare("SELECT * FROM crudstore.people WHERE email=?");
            $query->execute(array($email));
            $response = $query->fetch(PDO::FETCH_OBJ);
            if(!$response){
                return false;
            } else {	
                return true;
            }
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function getUserLogin(People $people){
        try {
            $query = $this->pdo->prepare("SELECT * FROM crudstore.people WHERE email=?");
            $query->execute(array($people->getEmail()));
            $response = $query->fetch(PDO::FETCH_OBJ);
            if(!$response){
                return false;
            } else {	
                $modelUser = $this->setUserProperties($response);
                if(password_verify($people->getPassword(), $modelUser->getPassword())){
                    return $modelUser;
                }
                return false;
            }
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function getUserId($id){
        try {
            $query = $this->pdo->prepare("SELECT * FROM crudstore.people WHERE id=?");
            $query->execute(array($id));
            $response = $query->fetch(PDO::FETCH_OBJ);
            return $this->setUserProperties($response);
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function setUserProperties($response){
        $modelPeople = new People();
        $modelPeople->setId($response->id);
        $modelPeople->setName($response->name);
        $modelPeople->setLastName($response->lastName);
        $modelPeople->setEmail($response->email);
        $modelPeople->setCuit($response->cuit);
        $modelPeople->setDni($response->dni);
        $modelPeople->setPassword($response->password);
        return $modelPeople;
    }
}

?>