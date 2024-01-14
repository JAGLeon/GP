<?php 
  require_once("Views/Layout/header.php");
?>
<div class="content-wrapper">
<div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Perfil</h1>
            <p>Ingrese sus datos</p>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="personas/editarPerfil" enctype="multipart/form-data">
                      <fieldset>
                        <legend>Perfil</legend>
                        <div class="form-group">
                            <input name="id" value="<?=$modelPeople->getId()?>" type="hidden">
                            <label class="col-lg-2 control-label" for="name">Nombres</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Lukinhas" value="<?=$modelPeople->getName()?>" required>
                            </div>    
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="lastName">Apellidos</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Feliz cumple" value="<?=$modelPeople->getLastName()?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="dni">DNI</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="dni" name="dni" type="number" placeholder="13000456" value="<?=$modelPeople->getDni()?>" disabled>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="cuit">CUIT</label>
                          <div class="col-lg-10">
                          <input class="form-control" id="cuit" name="cuit" type="number" placeholder="20130004569" value="<?=$modelPeople->getCuit()?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="email">Correo</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="email" name="email" type="text" placeholder="prueba@gmail.com" value="<?=$modelPeople->getEmail()?>" <?php if($_SESSION['role'] == 2){?> disabled <?php } ?>>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="role">Rol</label>
                          <div class="col-lg-10">
                            <?php if($_SESSION['role'] == 3){?>
                              <select class="form-control" id="role" name="role">
                                <?php foreach($this->roles->listRoles() as $rol): ?>
                                  <?php if($rol->id != 3 || ($_SESSION['id'] == $modelPeople->getId())){?>
                                    <option value="<?=$rol->id?>" <?php if($modelPeople->getRole_id() == $rol->id){?> selected <?php } ?>><?=$rol->tipo?></option>
                                  <?php } ?>
                                <?php endforeach; ?>
                              </select>
                            <?php } else { ?>
                              <input class="form-control" id="role" name="role" type="role" value="<?=$modelPeople->getRoleTxt()?>" disabled >
                            <?php } ?>
                          </div>
                        </div>

                        <!-- <div class="form-group">
                          <label class="col-lg-2 control-label" for="imgUser">Imagen</label>
                          <div class="col-lg-10">
                             <input class="form-control" id="imgUser" name="imgUser" type="file"> 
                          </div>
                        </div> -->
             
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
<?php
  require_once("Views/Layout/footer.php");
?>