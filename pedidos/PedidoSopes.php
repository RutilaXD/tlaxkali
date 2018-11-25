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
  $insertSQL = sprintf("INSERT INTO pedido (producto, cantidad, precio, total) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['producto'], "text"),
                       GetSQLValueString($_POST['cantidad'], "float"),
                       GetSQLValueString($_POST['precio'], "float"),
                       GetSQLValueString($_POST['total'] = $_POST['cantidad'] * $_POST['precio'] , "float"));

  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  $Result1 = mysql_query($insertSQL, $tlaxcalliconexion) or die(mysql_error());
   $insertGoTo = "DatosComprador.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO pedido (producto, cantidad, precio, total) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['producto'], "text"),
                       GetSQLValueString($_POST['cantidad'], "float"),
                       GetSQLValueString($_POST['precio'], "float"),
                       GetSQLValueString($_POST['total'], "float"));

  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  $Result1 = mysql_query($insertSQL, $tlaxcalliconexion) or die(mysql_error());
}

mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
$query_Recordset1 = "SELECT * FROM pedido";
$Recordset1 = mysql_query($query_Recordset1, $tlaxcalliconexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sabrosos Sopes</title>
<script> 
function calculo(cantidad,precio,inputtext,totaltext){ 
gndtotal= totaltext.value - inputtext.value ; 
// Calculo subtotal / 
subtotal = (precio*cantidad); 
inputtext.value= subtotal; 
total = eval(gndtotal); 
totaltext.value= total + subtotal; 
}
</script> 
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Producto:</td>
      <td><input name="producto" type="hiddentext" value="Sopes" size="32" readonly="readonly"</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cantidad:</td>
      <td><input type="text" name="cantidad" id="cantida" value="" size="32" 
      onChange="calculo(this.value,preciocompra1.value,totalcompra1,total);"
      />
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Precio:</td>
      <td><input name="precio" type="hiddentext" id="preciocompra1" value="13" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Total:</td>
      <td><input name="total" type="hiddentext" id="totalcompra1" value="" size="32" readonly="readonly"
          /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Realizar Pedido" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
