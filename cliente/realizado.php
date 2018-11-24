<?php
if(!empty($_POST)){ //verificamos que no venga vacío el formulario
	if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['telefono']) && !empty($_POST['cantidad']) && $_POST['cantidad']>0){
		
		require_once('../Connections/tlaxcalliconexion.php');
		require_once('../Connections/convertidorsql.php');

		// registramos al comprador
		$insertSQL = sprintf("INSERT INTO comprador (nombre, direccion, telefono, correo) VALUES (%s, %s, %s, %s)",
			GetSQLValueString($_POST['nombre'], "text"),
			GetSQLValueString($_POST['direccion'], "text"),
			GetSQLValueString($_POST['telefono'], "int"),
			GetSQLValueString($_POST['correo'], "text"));

		mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
		mysql_query($insertSQL, $tlaxcalliconexion) or die(mysql_error());

		//consultamos su id del comprador
		$insertSQL = sprintf("SELECT * FROM ultimocomprador;");
		$resultado = mysql_query($insertSQL, $tlaxcalliconexion) or die(mysql_error());
		$line = mysql_fetch_array($resultado);
		$id_comprador = $line['id_comprador'];

		//insertamos el pedido en la bd así como su respectivo copmrador
		$insertSQL = sprintf("INSERT INTO pedido (producto, cantidad, precio, total, comprador) VALUES (%s, %s, %s, %s, %s)",
			GetSQLValueString($_POST['producto'], "text"),
			GetSQLValueString($_POST['cantidad'], "int"),
			GetSQLValueString($_POST['precio'], "int"),
			GetSQLValueString($_POST['total'], "int"),
			GetSQLValueString($id_comprador, "int")
		);

		mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
		mysql_query($insertSQL, $tlaxcalliconexion) or die(mysql_error());

		print "<script>alert('Tu pedido ha sido enviado!');</script>";
		print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli'>";

	}else{
		print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/RealizarPedidos.php'>";
	}
}else{
	print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/RealizarPedidos.php'>";
}
?>