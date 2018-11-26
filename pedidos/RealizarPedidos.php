<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Exquisitas Tortillas</title>
  <script> 
    function calculo(){ 
      var cantidad = document.getElementById('cantida').value;
      var precio = document.getElementById('preciocompra1').value;
      var inputtext = document.getElementById('totalcompra1');

      subtotal = (precio*cantidad); 
      inputtext.value= subtotal; 
    }
  </script> 
  <style type="text/css">
  body {
    background-image: url('../img/tortillas.jpg');
    background-size: cover;
  }

  table {
    width: 50%;
    background-color: antiquewhite;
    opacity: 0.8;
    text-align: justify;
    padding: 2% ;
    margin-top: 12%;
    border-radius: 4%;
    font-size: xx-large;
  }

  input.fields {
    width: 80%;
    font-size: x-large;
    margin-left: 4%;
  }

  #submitt {
    position: relative;
    display: block;
    margin: 5% 0 0 20%;
    border: none;
    color:white;
    width: 200px;
    height: 35px;
    background-color: #faa732;
    font-size: 15px;
    text-align: center;
    padding: 10px;
    border-radius: 3px;    
  }
</style>
</head>

<body onload="document.form1.reset();">
  <form action="../cliente/pedido.php" method="post" name="form1" id="form1">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Producto:</td>
        <td><input class="fields" name="producto" type="hiddentext" value="Tortilla" size="32" readonly="readonly"></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Cantidad:</td>
        <td><input class="fields" type="number" name="cantidad" id="cantida" value="1" size="32"  min="1"
          onblur="calculo();" required="required" />
        </td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Precio:</td>
        <td><input class="fields" name="precio" type="hiddentext" id="preciocompra1" value="13" size="32" readonly="readonly" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Total:</td>
        <td><input class="fields" name="total" type="hiddentext" id="totalcompra1" value="" size="32" readonly="readonly"
          /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input id="submitt" type="submit" value="Realizar Pedido" onclick="calculo();" /></td>
        </tr>
      </table>
    </form>
  </body>
  </html>