<?php 
    session_start();
    if (!isset($_SESSION["name"])) {
        echo '<script>alert("Por favor debes iniciar sesion");window.location = "../Personas/crear";</script>';
        session_destroy();
        die();
    }
?>
<?php 
  require_once("Views/header.php");
?>

<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Lista de Productos</h1>
          </div>
          <div>
            <a class="btn btn-primary btn-flat" href="/Productos/crear"><i class="fa fa-lg fa-plus"> Agregar</i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Marca</th>
                      <th>Cantidad</th>
                      <th>Costo</th>
                      <th>Precio</th>
                      <th>Imagen</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->model->listProducts() as $product): ?>
                    <tr>
                      <td><?= $product->id?></td>
                      <td><?= $product->name?></td>
                      <td><?= $product->brand?></td>
                      <td><?= $product->quantity?></td>
                      <td><?= $product->cost?></td>
                      <td><?= $product->price?></td>
                      <td><?= $product->img?></td>
                      <td> 
                        <a class="btn btn-info btn-flat" href="/productos/crear/<?=$product->id?>"><i class="fa fa-lg fa-pencil"></i>
                        </a>
                        <a class="btn btn-danger btn-flat" href="/productos/borrar/<?=$product->id?>"><i class="fa fa-lg fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  require_once("Views/footer.php");
?>