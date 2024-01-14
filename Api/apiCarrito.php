<?php 

require_once('Models/cart.php');
class ApiCarrito{

    function accion(){
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            $cart = new Cart();

            switch ($action) {
                case 'mostrar':
                    $this->mostrar($cart);
                    break;
                case 'agregar':
                    $this->agregar($cart);
                    break;
                case 'eliminar':
                    $this->eliminar($cart);
                    break;
                default:
            }

        }else{
            echo json_encode(['status'=> 404,'response'=> 'No se puede procesar la solicitud']);
        }   
    }
    function mostrar($cart){// carga el carrito en la session, ademas se fija de tener stock
        $fullItems = [];
        $total = 0;
        $totalItems = 0;
        if($cart->load() != null){
            $itemsCart = json_decode($cart->load(),1);
            foreach ($itemsCart as $item){
                $httpRequest = file_get_contents('http://localhost/?/apiProductos/productos&item='.$item['id']);
                $itemProduct = json_decode($httpRequest,1)['response'];
                $itemProduct['cantidad'] = $item['cantidad'];
                $itemProduct['subTotal'] = $item['cantidad'] * $itemProduct['price'];
                $total += $itemProduct['subTotal'];
                $totalItems += $itemProduct['cantidad'];

                array_push($fullItems,$itemProduct);
            }
        }
        $responseArray = array('info' => ['count' => $totalItems, 'total' => $total] , 'items' => $fullItems);

        echo json_encode($responseArray);
    }

    function agregar($cart){
        if(isset($_GET['id'])){
            $itemsCart = json_decode($cart->load(),1);
            $arrayid = [];
            foreach ($itemsCart as $item){
                array_push($arrayid, $item['id']);
            }
    
            if(in_array($_GET['id'], $arrayid)){
                foreach ($itemsCart as $item){
                    $httpRequest = file_get_contents('http://localhost/?/apiProductos/productos&item='.$item['id']);
                    $jsonCart = json_decode($httpRequest,1);
                    if($item['cantidad'] < $jsonCart["response"]["quantity"]){ 
                        $response = $cart->add($_GET['id']);
                    }
                    //echo $jsonCart["response"]["quantity"] . "cantidad <br> " . $item['cantidad'] . "cartCant <br> " . $jsonCart["response"]['id']. "<br> " .  $item['id'];
                }
            }else{
                $response = $cart->add($_GET['id']);
            }
            echo $response;
        }else{
            echo json_encode(['status'=> 404,'response'=> 'No se puede procesar la solicitud, falta el id']); 
        }
    }

    function eliminar($cart){
        if(isset($_GET['id'])){
            $response = $cart->remove($_GET['id']);
            if($response){
                echo json_encode(['status'=> 200]);
            }else{
                echo json_encode(['status'=> 400]);
            }
            echo $response;
        }else{
            echo json_encode(['status'=> 404,'response'=> 'No se puede procesar la solicitud, falta el id']); 
        }
    }
}
?>
