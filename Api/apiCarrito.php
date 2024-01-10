<?php 

require_once('Models/cart.php');

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $cart = new Cart();

    switch ($action) {
        case '':
            mostrar($cart);
            break;
        case '':
            agregar($cart);
            break;
        case '':
            eliminar($cart);
            break;
        default:
    }

}else{
    echo json_encode(['status'=> 404,'response'=> 'No se puede procesar la solicitud']);
}

function mostrar($cart){// carga el carrito en la session, ademas se dija de tener stock
    $itemsCart = json_decode($cart->load(),1);
    $fullItems = [];
    $total = 0;
    $totalItems = 0;

    foreach ($itemsCart as $item){
        $httpRequest = file_get_contents('http://localhost/?/apiProductos/producto&item='.$itemsCart['id']);
    }
}

function agregar($cart){
    
}

function eliminar($cart){
    
}
?>
