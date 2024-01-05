<?php 
require_once("Models/product.php");
class Productos{

    private $model;

    public function __construct(){
        $this->model = new Product();
    }

    public function index(){
        require_once("Views/Products/index.php");
    }

    public function crear(){
        $title = "Registrar";
        $tags = isset($_GET) ? array_keys($_GET) : null;
        $url = explode('/',$tags[0]);
        $modelProduct = new Product();
        if(count($url) > 3){
            $id = $url[3];
            $title = "Editar";
            $modelProduct = $this->model->getProduct($id);
            //echo "<pre>"; echo var_dump($url); echo "</pre>" ;
        }
        require_once("Views/Products/formCreate.php");
    }

    public function guardar(){
        $modelProduct = new Product();
        $modelProduct->setId(intval($_POST["idProduct"]));
        $modelProduct->setName($_POST['nameProduct']);
        $modelProduct->setBrand($_POST['brandProduct']);
        $modelProduct->setCost($_POST['costProduct']);
        $modelProduct->setPrice($_POST['priceProduct']);
        $modelProduct->setQuantity($_POST['quantityProduct']);

        // $img = $_FILES['imgProduct'];
        // $location = $_FILES['imgProduct']['tmp_name'];
        // echo var_dump($location);
        // if(isset($img) && $img != ""){
        //     move_uploaded_file($location,'./Public/img'.$img);
        //     $modelProduct->setImg($img);
        // }

        $modelProduct->getId() > 0 ? $this->model->UpdateProducts($modelProduct) : $this->model->InsertProducts($modelProduct);
        
        header("location:/Productos/index");
    }

    public function borrar(){
        $tags = isset($_GET) ? array_keys($_GET) : null;
        $url = explode('/',$tags[0]);
        $id = $url[3];
        $this->model->DeleteProducts($id);
        header("location:/Productos/index");
    }

}

?>