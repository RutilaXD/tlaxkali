<?php
	//paso 1 es conectarnos con el servidor //esta manera ya esta obsoleta!!
error_reporting(0);
	$link = mysql_connect('localhost','root','n0m3l0');
	if(!$link){
		echo'No Se Pudo Establecer Conexion Con El Servidor: '. mysql_error();
	}else{
	//Paso 2 es seleccionar la base de datos
		$base = mysql_select_db('tlaxcalli',$link);
		if(!$base){
			echo'No se encontro la base de datos: '.mysql_error();
		}else{
	//Paso 3 es hacer la sentencia sql y ejecutarla
			$sql = "SELECT * FROM ganancias";
			$ejecuta_sentencia = mysql_query($sql);
			if(!$ejecuta_sentencia){
				echo'hay un error en la sentencia de sql: '.$sql;
			}else{
	//Paso 4 es traer los resultados como un array para imprirlos en pantalla
				$num = mysql_fetch_array($ejecuta_sentencia);
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Ganancias </title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<p><b1> Ganancias </b1></p>


	<table>
		<tr>
			<th>Producto</th>
			<th>Cantidad Total Vendida</th>
			<th>Importe ganado</th>
			<?php
			$suma=0;
					for($i=0; $i<$num; $i++){
						echo"<tr>";
							echo"<td>";
								echo$num['producto'];
							echo"</td>";
							
							echo"<td>";
								echo$num['Cantidad_Total_Vendida'];
							echo"</td>";

							echo"<td>";
								echo$num['Importe_ganado_total'];
							echo"</td>";
						echo"</tr>";
						$suma += $num['Importe_ganado_total'];
						$num = mysql_fetch_array($ejecuta_sentencia);
						}	
			
			echo "<tr><td></td><td>Ganancias totales</td><td>".$suma."</td></tr>";
			?>
				
		</tr>
	</table>
</body>
</html>