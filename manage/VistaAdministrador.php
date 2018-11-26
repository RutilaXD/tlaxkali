<?php 
session_start();

if (!empty($_SESSION)){
	require_once('../Connections/tlaxcalliconexion.php');
	require_once('../Connections/convertidorsql.php');

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
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	  <style type="text/css">body{background-image: url('../img/tortillas.jpg'); background-size: cover;}</style>
	</head>

	<body onblur="window.location.reload();">
	<center><h1>Pedidos del día de hoy</h1></center>
	  <div>
		<table>
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
			<td><a href="eliminar.php?id_pedido=<?php echo $row_juegopedidos['id_pedido']; ?>">Borrar</a> | Entregado</td>
		  </tr>
		  <?php } while ($row_juegopedidos = mysql_fetch_assoc($juegopedidos)); ?>
		</table>
	  </div>
	  <center>
		<h1 onclick="window.location.href='Ganancias.php';">Ver ganancias</h1>
		<h1 onclick="window.location.href='salir.php';">Cerrar sesión</h1>
		</center>
	</body>
	</html>	
	<?php
}else{
	print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/manage/login.php'>";
}?>
