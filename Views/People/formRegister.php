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
        <input type="email" name="email" placeholder="Email" id="email" required>
        <div class="conteinerPsw">
          <input type="password" name="password" placeholder="Contraseña" id="password" required>
          <i class="fa-solid fa-eye-slash" id="eye"></i>
        </div>
        <button type="submit">Enviar</button>
      </form>
    </div>
    <div class="login">
      <form method="POST" action="personas/ingresar" id="formLogin">
        <p id="errors2"></p>
        <label for="chk" aria-hidden="true">Ingresar</label>
        <div class="containerInpLogin">
          <input type="email" name="email" placeholder="Email" id="email2">
          <div class="conteinerPsw">
            <input type="password" name="password" placeholder="Contraseña" id="password2">
            <i class="fa-solid fa-eye-slash" id="eye2"></i>
          </div>
          <button type="submit">Enviar</button>
        </div>
      </form>
    </div>
  </div>
  <script src="Public/js/login.js"></script>


</body>
</html>