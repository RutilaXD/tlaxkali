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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO comprador (nombre, direccion, telefono, correo) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['telefono'], "int"),
                       GetSQLValueString($_POST['correo'], "text"));

  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  $Result1 = mysql_query($insertSQL, $tlaxcalliconexion) or die(mysql_error());

  $insertGoTo = "Menu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
$query_compradores = "SELECT * FROM comprador";
$compradores = mysql_query($query_compradores, $tlaxcalliconexion) or die(mysql_error());
$row_compradores = mysql_fetch_assoc($compradores);
$totalRows_compradores = mysql_num_rows($compradores);

mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
$query_comprador = "SELECT * FROM comprador";
$comprador = mysql_query($query_comprador, $tlaxcalliconexion) or die(mysql_error());
$row_comprador = mysql_fetch_assoc($comprador);
$totalRows_comprador = mysql_num_rows($comprador);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
  <tr valign="baseline">
    <td><table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Nombre:</td>
        <td><input type="text" name="nombre" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right" valign="top">Direccion:</td>
        <td><textarea name="direccion" cols="50" rows="5"></textarea></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Telefono:</td>
        <td><input type="text" name="telefono" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Correo:</td>
        <td><input type="text" name="correo" value="" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Confirmar Pedido" /></td>
      </tr>
    </table></td>
  </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($compradores);

mysql_free_result($comprador);
?>
