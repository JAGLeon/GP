<?php 
    require_once("Controllers/personas.php");
    $controller = new Personas();
    $controller->verificarSesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="Public/css/main.css">
    <link rel="stylesheet" type="text/css" href="Public/css/productCard.css">
    <title>Lion Store</title>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="/Inicio/principal">Lion</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu" id="cart"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cart-plus" style="font-size:18px"></i></a>
                <ul class="dropdown-menu" id="tableCart">
                  


                </ul>
              </li>
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="/personas/perfil/<?=$_SESSION["id"]?>"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                  <li><a href="/personas/cerrarSesion"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="../Public/img/imgProyecto.png" alt="User Image"></div>
            <div class="pull-left info">
              <p><?=$_SESSION['name']?></p>
              <p class="designation"><?=$_SESSION['roleTxt']?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="/Inicio/principal"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <?php 
              if($_SESSION['role'] == 1){
                echo '
                <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Productos</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="/Productos/index"><i class="fa fa-circle-o"></i> Productos</a></li>
                    <li><a href="/Productos/crear"><i class="fa fa-circle-o"></i> Agregar</a></li>
                  </ul>
                </li>
                ';
              } else{
                echo '
                <li class="treeview"><a href="/Inicio/principal"><i class="fa fa-laptop"></i><span>Productos</span></a></li>
                ';
              }
            ?>

          </ul>
        </section>
      </aside>