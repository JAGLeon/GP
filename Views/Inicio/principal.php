<?php 
  require_once("Views/Layout/header.php");
?>
<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>Oferta y demanda</p>
        </div>
    </div>
    <div class="row">
        <?php 
            $response = json_decode(file_get_contents('http://localhost/?/apiProductos/productos&todos=1'),true);
            if($response['status'] == 200){
                foreach($response['response'] as $item){
                    require("Views/Products/productCard.php");
                }
            }
        ?>        
    </div>
</div>
<?php 
    require_once("Views/Layout/footer.php");
?>