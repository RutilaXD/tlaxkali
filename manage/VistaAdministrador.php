<?php 
require_once('../Connections/tlaxcalliconexion.php');
require_once('../Connections/convertidorsql.php');

if ((isset($_GET['nombre'])) && ($_GET['nombre'] != "")) {
  $deleteSQL = sprintf("DELETE FROM comprador WHERE nombre=%s",
   GetSQLValueString($_GET['nombre'], "text"));

  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  $Result1 = mysql_query($deleteSQL, $tlaxcalliconexion) or die(mysql_error());

  $deleteGoTo = "VistaAdministrador.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['id_comprador'])) && ($_GET['id_comprador'] != "")) {
  $deleteSQL = sprintf("DELETE FROM comprador WHERE id_comprador=%s",
   GetSQLValueString($_GET['id_comprador'], "int"));

  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  $Result1 = mysql_query($deleteSQL, $tlaxcalliconexion) or die(mysql_error());

  $deleteGoTo = "VistaAdministrador.php";
  header(sprintf("Location: %s", $deleteGoTo));
}

if ((isset($_GET['id_pedido'])) && ($_GET['id_pedido'] != "")) {
  $deleteSQL = sprintf("DELETE FROM pedido WHERE id_pedido=%s",
   GetSQLValueString($_GET['id_pedido'], "int"));

  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  $Result1 = mysql_query($deleteSQL, $tlaxcalliconexion) or die(mysql_error());

  $deleteGoTo = "VistaAdministrador.php";
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
$query_juegopedidos = "SELECT * FROM ventas";
$juegopedidos = mysql_query($query_juegopedidos, $tlaxcalliconexion) or die(mysql_error());
$row_juegopedidos = mysql_fetch_assoc($juegopedidos);
$totalRows_juegopedidos = mysql_num_rows($juegopedidos);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aministrador</title>
</head>

<body onblur="window.location.reload();">
  <div style="display: inline-flex;">
    <table width="80%" border="1">
      <tr>
        <th scope="col"># Pedido</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Total</th>
        <th scope="col">ID Comprador</th>
        <th scope="col">Nombre Comprador</th>
        <th scope="col">Direccion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        <th scope="col">Accion</th>
      </tr>
      <?php do { ?>
      <tr>
        <td><?php echo $row_juegopedidos['id_pedido']; ?></td>
        <td><?php echo $row_juegopedidos['producto']; ?></td>
        <td><?php echo $row_juegopedidos['cantidad']; ?></td>
        <td><?php echo $row_juegopedidos['precio']; ?></td>
        <td><?php echo $row_juegopedidos['total']; ?></td>
        <td><?php echo $row_juegopedidos['id_comprador']; ?></td>
        <td><?php echo $row_juegopedidos['nombre']; ?></td>
        <td><?php echo $row_juegopedidos['direccion']; ?></td>
        <td><?php echo $row_juegopedidos['telefono']; ?></td>
        <td><?php echo $row_juegopedidos['correo']; ?></td>
        <td><a href="VistaAdministrador.php?id_pedido=<?php echo $row_juegopedidos['id_pedido']; ?>">Borrar</a> | Entregado</td>
      </tr>
      <?php } while ($row_juegopedidos = mysql_fetch_assoc($juegopedidos)); ?>
    </table>
  </div>
</body>
</html>
<?php
mysql_free_result($juegopedidos);
?>
