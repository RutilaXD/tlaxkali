<?php 
if(!empty($_POST)){ //verificamos que no venga vacío el formulario
	if(!empty($_POST['cantidad']) && $_POST['cantidad']>0){ // verificamos que haya escrito una cantidad y válida
		//obtenemos todos los valores del formulario enviado
		$_producto = $_POST['producto'];
		$_cantidad = $_POST['cantidad'];
		$_precio = $_POST['precio'];
		$_total = $_POST['total'];

		//Por si el navegador no alcanzó a calcular el total, lo calculamos aquí
		if(empty($_total)){
			$_total = $_cantidad * $_precio;
		}

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Pedido - Datos del comprador</title>
		</head>
		<body onload="document.form1.reset();">
			<form action="realizado.php" method="post" name="form1" id="form1">
				<table align="center">
					<tr valign="baseline">
						<td><table align="center">
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">Nombre:</td>
								<td><input type="text" name="nombre" value="" size="32" required="required" /></td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right" valign="top">Direccion:</td>
								<td><textarea name="direccion" cols="50" rows="5" required="required" ></textarea></td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">Telefono:</td>
								<td><input type="text" name="telefono" value="" size="32" required="required" /></td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">Correo:</td>
								<td><input type="text" name="correo" value="" size="32" /></td>
							</tr>

							<!-- datos del pedido -->
							<tr valign="baseline">
								<td><input type="hidden" value="<?php echo $_producto; ?>" name="producto" /></td>
								<td><input type="hidden" value="<?php echo $_cantidad; ?>" name="cantidad" /></td>
							</tr>
							<tr>
								<td><input type="hidden" value="<?php echo $_precio; ?>" name="precio" /></td>
								<td><input type="hidden" value="<?php echo $_total; ?>" name="total" /></td>
							</tr>
							<tr valign="baseline">
								<td nowrap="nowrap" align="right">&nbsp;</td>
								<td><input type="submit" value="Confirmar Pedido" /></td>
							</tr>
						</table></td>
					</tr>
				</table>
			</form>
		</body>
		</html>
		<?php
	}else{
		print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/RealizarPedidos.php'>";
	}
}else{
	print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/RealizarPedidos.php'>";
}
?>