<?php 
  require_once("Views/Layout/header.php");
?>
<?php 

if(isset($_SESSION["msjExito"])){
    echo '<div class="modelExito"><div class="contentExito"><a class="closeA" href="/productos/cerrarCompra">X</a><div class="spinner"></div><p class="sessionMsj">';
    echo $_SESSION["msjExito"];
    echo '</p><a class="closeBtn" href="/productos/cerrarCompra">Cerrar</a></div></div>';
}

?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Tienda</h1>
            <p>Oferta y demanda</p>
        </div>
    </div>
    <div class="row">
        <?php 
            $response = json_decode(file_get_contents('http://localhost/?/apiProductos/productos&todos=1'),true);
            if($response['status'] == 200){
                foreach($response['response'] as $item){
                    if($item["quantity"] != '0'){
                        require("Views/Products/productCard.php");
                    }
                }
            }
        ?>        
    </div>
</div>
<?php 
    require_once("Views/Layout/footer.php");
?>