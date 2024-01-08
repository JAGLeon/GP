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
        <div class="col-md-4">
        <div class="card">
            <h3 class="card-title">Cantidad Productos</h3>
            <h5>
                <?php $p=$this->model->quantityProducts() ?>
                <?= $p->cantidad ?>
            </h5>
        </div>
        </div>
    </div>
    </div>
</div>

<?php 
    require_once("Views/Layout/footer.php");
?>