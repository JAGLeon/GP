<?php 
  require_once("Views/Layout/header.php");
?>
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Lista de <?=$titulo?></h1>
          </div>
          <?php if($titulo == "Productos"){?>
            <div>
              <a class="btn btn-primary btn-flat" href="/Productos/crear"><i class="fa fa-lg fa-plus"> Agregar</i></a>
            </div>
          <?php } ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                    <?php if($titulo == "Productos") {?>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Marca</th>
                      <th>Cantidad</th>
                      <th>Costo</th>
                      <th>Precio</th>
                      <th>Imagen</th>
                      <th>Acciones</th>
                    <?php }elseif($titulo == "Usuarios" || $titulo == "Administradores"){?>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Dni</th>
                      <th>Cuit</th>
                      <th>Email</th>
                      <?php if($_SESSION['role'] == 3){  ?>
                      <th>Rol</th>
                      <?php } ?>
                      <th>Acciones</th>
                    <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($titulo == "Productos"){foreach($this->model->listProducts() as $product): ?>
                      <tr>
                        <td><?= $product->id?></td>
                        <td><?= $product->name?></td>
                        <td><?= $product->brand?></td>
                        <td><?= $product->quantity?></td>
                        <td><?= $product->cost?></td>
                        <td><?= $product->price?></td>
                        <td>
                          <div style="height: 50px;width: 50px;">
                            <img src="<?= $product->img?>" style="width: 100%;height: 100%;object-fit: cover;">
                          </div>
                        </td>
                        <td> 
                          <a class="btn btn-info btn-flat" href="/productos/crear/<?= $product->id?>"><i class="fa fa-lg fa-pencil"></i>
                          </a>
                          <a class="btn btn-danger btn-flat" href="/productos/borrar/<?=$product->id?>"><i class="fa fa-lg fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; }elseif($titulo == "Usuarios"  || $titulo == "Administradores"){?>
                    <?php $rolId = $titulo == "Usuarios" ? 2 : 1; foreach($this->model->listUsers($rolId) as $user): ?>
                      <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name?></td>
                        <td><?= $user->lastName?></td>
                        <td><?= $user->dni?></td>
                        <td><?= $user->cuit?></td>
                        <td><?= $user->email?></td>
                        <?php if($_SESSION['role'] == 3){  ?>
                          <td><?= $user->tipo?></td>
                        <?php } ?>
                        <td> 
                          <a class="btn btn-info btn-flat" href="/Personas/perfil/<?= $user->id?>"><i class="fa fa-lg fa-pencil"></i>
                          </a>
                          <a class="btn btn-danger btn-flat" href="/Usuarios/eliminar/<?=$user->id?>"><i class="fa fa-lg fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  require_once("Views/Layout/footer.php");
?>