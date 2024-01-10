<?php

require_once('Models/product.php');
class ApiProductos{
    function productos(){
        if(isset($_GET['todos'])){
            $allProducts = $_GET['todos'];
        
            if($allProducts == ''){
                echo json_encode(['status'=> 400, 'response' => 'No existe']);
            }else{
                $products = new Product();
                $items = $products->listProducts();
                echo json_encode(['status'=> 200, 'response' => $items]);
            }
        }elseif(isset($_GET['item'])){
            $id = $_GET['item'];

            if($id == ''){
                echo json_encode(['status'=> 400, 'response' => 'No hay valor para este id']);
            }else{
                $products = new Product();
                $item =$products->getProductApi($id);
                echo json_encode(['status'=> 200, 'response' => $item]);
            }
        }
        else{
            echo json_encode(['status'=> 400, 'response' => 'No hay accion']);
        }
    }

    
}




?>