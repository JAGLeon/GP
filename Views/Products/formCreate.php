<?php 
  require_once("Views/header.php");
?>
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Lion Components</h1>
            <p>Ingrese los datos de los productos</p>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="productos/guardar" enctype="multipart/form-data">
                      <fieldset>
                        <legend><?=$title?> Productos</legend>
                        <div class="form-group">
                            <input class="form-control" name="idProduct" type="hidden" value="<?=$modelProduct->getId()?>">
                            <label class="col-lg-2 control-label" for="nameProduct">Nombre</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="nameProduct" name="nameProduct" type="text" placeholder="GTA VI" value="<?=$modelProduct->getName()?>" required>
                            </div>    
                        </div>

                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="brandProduct">Marca</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="brandProduct" name="brandProduct" type="text" placeholder="Rockstar Games" value="<?=$modelProduct->getBrand()?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="costProduct">Costo</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="costProduct" name="costProduct" type="number" placeholder="110000" value="<?=$modelProduct->getCost()?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="priceProduct">Precio</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="priceProduct" name="priceProduct" type="number" placeholder="230000" value="<?=$modelProduct->getPrice()?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="quantityProduct">Cantidad</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="quantityProduct" name="quantityProduct" type="number" placeholder="104" value="<?=$modelProduct->getQuantity()?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="imgProduct">Imagen</label>
                          <div class="col-lg-10">
                             <input class="form-control" id="imgProduct" name="imgProduct" type="file"> 
                          </div>
                        </div>
             
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
<?php
  require_once("Views/footer.php");
?>