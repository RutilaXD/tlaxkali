<?php require_once('Connections/tlaxcalliconexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
$query_Registrostlaxcalli = "SELECT * FROM pedido";
$Registrostlaxcalli = mysql_query($query_Registrostlaxcalli, $tlaxcalliconexion) or die(mysql_error());
$row_Registrostlaxcalli = mysql_fetch_assoc($Registrostlaxcalli);
$totalRows_Registrostlaxcalli = mysql_num_rows($Registrostlaxcalli);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="80%" border="1">
  <tr>
    <th scope="col">ID Pedido</th>
    <th scope="col">Producto</th>
    <th scope="col">Cantidad</th>
    <th scope="col">Precio</th>
    <th scope="col">Total</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Registrostlaxcalli['id_pedido']; ?></td>
      <td><?php echo $row_Registrostlaxcalli['producto']; ?></td>
      <td><?php echo $row_Registrostlaxcalli['cantidad']; ?></td>
      <td><?php echo $row_Registrostlaxcalli['precio']; ?></td>
      <td><?php echo $row_Registrostlaxcalli['total']; ?></td>
    </tr>
    <?php } while ($row_Registrostlaxcalli = mysql_fetch_assoc($Registrostlaxcalli)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Registrostlaxcalli);
?>
