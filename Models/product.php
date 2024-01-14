<?php

class Product{
    private $pdo;
    private $id;
    private $name;
    private $brand;
    private $price;
    private $cost;
    private $img;
    private $quantity;

    public function __CONSTRUCT() {
        $this->pdo = DataBase::Conect();
    }
    public function getId() : ?int {
        return $this->id;
    }
    public function setId(int $id){
        $this->id = $id;
    }
    public function getName() : ?string {
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function getBrand() : ?string {
        return $this->brand;
    }
    public function setBrand(string $brand){
        $this->brand = $brand;
    }
    public function getPrice() : ?float{
        return $this->price;
    }   
    public function setPrice(float $price){
        $this->price = $price;
    }
    public function getCost() : ?float{
        return $this->cost;
    }
    public function setCost(float $cost){
        $this->cost = $cost;
    }
    public function getImg() : ?string{
        return $this->img;
    }
    public function setImg(string $img){
        $this->img = $img;
    }

    public function getQuantity() : ?int{
        return $this->quantity;
    }
    public function setQuantity(int $quantity){
        $this->quantity = $quantity;
    }


    public function quantityProducts(){
        try{
            
            $query = $this->pdo->prepare("SELECT SUM(quantity) AS cantidad FROM crudstore.products;");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listProducts(){
        try{
            $query = $this->pdo->prepare("SELECT * FROM crudstore.products;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function insertProducts(Product $p){
        try{
            $query = "INSERT INTO crudstore.products(name,brand,cost,price,quantity,img) VALUES (?,?,?,?,?,?);";
            $this->pdo->prepare($query)->execute(array(
                $p->getName(),
                $p->getBrand(),
                $p->getCost(),
                $p->getPrice(),
                $p->getQuantity(),
                $p->getImg(),
            ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function getProductApi($id){
        try{
            $query = $this->pdo->prepare("SELECT * FROM crudstore.products WHERE id =?;");
            $query->execute(array($id));
            $response = $query->fetch(PDO::FETCH_OBJ);
            return $response;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getProduct($id){
        try{
            $query = $this->pdo->prepare("SELECT * FROM crudstore.products WHERE id =?;");
            $query->execute(array($id));
            $response = $query->fetch(PDO::FETCH_OBJ);
            $modelProduct = new Product();
            $modelProduct->setId($response ->id);
            $modelProduct->setName($response ->name);
            $modelProduct->setBrand($response ->brand);
            $modelProduct->setCost($response ->cost);
            $modelProduct->setPrice($response ->price);
            $modelProduct->setQuantity($response ->quantity);
            $modelProduct->setImg($response ->img);
            return $modelProduct;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function updateProducts(Product $p){
        try{
            $query = "UPDATE crudstore.products SET name=?, brand=?, cost=?, price=?, quantity=?, img=? WHERE id=?;";
            $this->pdo->prepare($query)->execute(array(
                $p->getName(),
                $p->getBrand(),
                $p->getCost(),
                $p->getPrice(),
                $p->getQuantity(),
                $p->getImg(),
                $p->getId(),
            ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function deleteProducts($id){
        try {
            $query = "DELETE FROM crudstore.products WHERE id=?";
            $this->pdo->prepare($query)->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function updateQuantityBuy(Array $products){
        try{
            $product = $this->getProduct($products[1]);
            $newQuantity = $product->getQuantity() - $products[0];
            $query = "UPDATE crudstore.products SET quantity=? WHERE id=?;";
            $this->pdo->prepare($query)->execute(array($newQuantity,$products[1]));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}


?>