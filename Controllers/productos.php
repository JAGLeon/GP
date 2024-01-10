<?php 
require_once("Models/product.php");
require_once("Controllers/personas.php");
class Productos{

    private $model;
    private $modelPersonas;


    public function __construct(){
        $this->model = new Product();
        $this->modelPersonas = new Personas();

    }
    function restriccionUsuario(){
        if(isset($_SESSION['id']) && $_SESSION["role"] != 1){
            header("location:/Inicio/principal");
            exit();
        }
    }
    public function index(){
        require_once("Views/Products/index.php");
    }
    public function crear(){
        $this->restriccionUsuario();
        $title = "Registrar";
        $tags = isset($_GET) ? array_keys($_GET) : null;// ?/dasd/metodo/1
        $url = explode('/',$tags[0]);
        $modelProduct = new Product();
        if(count($url) > 3){
            $id = $url[3];
            $title = "Editar";
            $modelProduct = $this->model->getProduct($id);
            //echo "<pre>"; echo var_dump($modelProduct); echo "</pre>" ;
        }
        require_once("Views/Products/formCreate.php");
    }
    public function guardar(){
        $this->restriccionUsuario();
        $modelProduct = new Product();
        $modelProduct->setId(intval($_POST["idProduct"]));
        $modelProduct->setName($_POST['nameProduct']);
        $modelProduct->setBrand($_POST['brandProduct']);
        $modelProduct->setCost($_POST['costProduct']);
        $modelProduct->setPrice($_POST['priceProduct']);
        $modelProduct->setQuantity($_POST['quantityProduct']);
        $modelProduct->setImg($_POST['imgProduct']);


        // $pathInfo = pathinfo($_FILES["imgProduct"]["name"]);
        // echo var_dump($pathInfo);
        // if(isset($img) && $img != ""){
        //     move_uploaded_file($location,'./Public/img'.$img);
        //     $modelProduct->setImg($img);
        // }
        $modelProduct->getId() > 0 ? $this->model->updateProducts($modelProduct) : $this->model->insertProducts($modelProduct);
        
        header("location:/Productos/index");
    }
    public function borrar(){
        $this->restriccionUsuario();
        $tags = isset($_GET) ? array_keys($_GET) : null;
        $url = explode('/',$tags[0]);
        $id = $url[3];
        $this->model->deleteProducts($id);
        header("location:/Productos/index");
    }

}

?>