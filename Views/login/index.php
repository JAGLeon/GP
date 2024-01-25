<form id="fromLogin" action="" method="POST">

    <input type="text" name="usuario" id="usuario" placeholder="Usuario">
    <br>
    <br>
    <input type="password" name="clave" id="clave" placeholder="Clave">
    <br>
    <br>
    <div id="msgin"></div>
    <button type="button" id="btnIngresar" dataUrlIn="<?php if(isset($this->urllin)){ echo $this->urllin;}?>">INGRESAR</button>
    <input type="hidden" name="formIn" value="<?php echo session_id();?>">
</form>