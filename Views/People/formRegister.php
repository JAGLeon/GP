<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lion Store</title>
  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="Public/css/registerLogin.css">
  <link href='https://fonts.googleapis.com/css?family=Jost:whgt@500&display=swap' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >

  <div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
      <form method="POST" action="personas/registrar">
        <label for="chk" aria-hidden="true">Registrar</label>
        <input type="text" name="name" placeholder="Nombres" required>
        <input type="text" name="lastName" placeholder="Apellidos" required>
        <input type="number" name="cuit" placeholder="CUIT" required>
        <input type="email" name="email" placeholder="Email" required>
        <div class="conteinerPsw">
          <input type="password" name="password" placeholder="Contraseña" id="password" required>
          <i class="fa-solid fa-eye-slash" id="eye"></i>
        </div>
        <button type="submit">Enviar</button>
      </form>
    </div>
    <div class="login">
      <form method="POST" action="personas/ingresar">
        <label for="chk" aria-hidden="true">Ingresar</label>
        <div class="containerInpLogin">
          <input type="email" name="email" placeholder="Email" reqired>
          <div class="conteinerPsw">
            <input type="password" name="password" placeholder="Contraseña" id="password2" required>
            <i class="fa-solid fa-eye-slash" id="eye2"></i>
          </div>
          <button type="submit">Enviar</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function qs(element) {
      return document.querySelector(element);
    };

    let $eye = qs('#eye'),
    $eye2 = qs('#eye2'),
    $pass = qs('#password'),
    $pass2 = qs('#password2');

    $eye.addEventListener("click",() => {
      if($pass.type == "password"){
          $pass.type = "text";
          $eye.style.opacity = 0.2;
      }else{
          $pass.type = "password";
          $eye.style.opacity = 1;
      }
    });
    $eye2.addEventListener("click",() => {
      if($pass2.type == "password"){
          $pass2.type = "text";
          $eye2.style.opacity = 0.2;
      }else{
          $pass2.type = "password";
          $eye2.style.opacity = 1;
      }
    });
  </script>
</body>
</html>