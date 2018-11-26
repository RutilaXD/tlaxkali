<?php
session_start();
if (!empty($_SESSION)) {
  print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/manage/VistaAdministrador.php'>";
}else{ ?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Administrador - Iniciar Sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="../js/validaciones.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
  <div id="caja">
   <p class="preg">Administrador</p>
   <form action="validar.php" method="POST" name="forma">
     <table id="tabla">
       <tr>
        <td style="text-align: center"><label style="text-align: center" for="password">Usuario: </label></td>
        <td><input placeholder="Usuario" type="text" id="usuario" name="usr" required onkeypress="return letnum(event)" maxlength="30"></td>
      </tr>
      <tr>
        <td style="text-align: center"><label style="text-align: center" for="password">Contraseña: </label></td>
        <td><input placeholder="Contraseña" type="password" id="password" name="contra" required onkeypress="return letnum(event)" maxlength="30"></td>
      </tr>
    </table>
    <input type="submit" value="Acceder">
  </form>
</div>	
</body>
</html>
<?php
}?>
