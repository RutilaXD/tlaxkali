<?php
require_once('../Connections/tlaxcalliconexion.php');
require_once('../Connections/convertidorsql.php');

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
?>