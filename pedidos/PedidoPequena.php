<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Deliciosas Tortillas Pequeñas</title>
  <script> 
    function calculo(){ 
      var cantidad = document.getElementById('cantida').value;
      var precio = document.getElementById('preciocompra1').value;
      var inputtext = document.getElementById('totalcompra1');

      subtotal = (precio*cantidad); 
      inputtext.value= subtotal; 
    }
  </script> 
</head>

<body onload="document.form1.reset();">
  <form action="../cliente/pedido.php" method="post" name="form1" id="form1">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Producto:</td>
        <td><select name="producto">
          <option value="Tortilla Pequena">Tortilla Pequeña</option>
        </select></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Cantidad:</td>
        <td><input type="number" name="cantidad" id="cantida" value="1" size="32"  min="1"
          onblur="calculo();" required="required" />
        </td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Precio:</td>
        <td><input name="precio" type="text" id="preciocompra1" value="13" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Total:</td>
        <td><input name="total" type="text" id="totalcompra1" value="" size="32" readonly="readonly"
          /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Realizar Pedido" onclick="calculo();"/></td>
        </tr>
      </table>
    </form>
  </body>
  </html>