<?php 
if(!empty($_POST)){ // validamos que no venga vacío el formulario
	//obtenemos valores del formulario
	$usr = $_POST['usr'];
    $pass = $_POST['contra'];
	
	//validamos que no vengan vacíos
	if ($usr != "" && $pass != "") {
		//comparamos que la contraseña sea correcta
		if(strcmp($pass, "usuario") === 0){ // Sí coinciden
			session_start();
			$_SESSION['adm'] = $usr;
			print "<script>alert('Bienvenido Administrador!');</script>";
			print "<meta http-equiv='refresh' content='0.0001; http://localhost/tlaxcalli/manage/VistaAdministrador.php'>";
		}else{
			//no coinciden
			print "<script>alert('Contraseña incorrecta');</script>";
			print "<meta http-equiv='refresh' content='0; http://localhost/tlaxcalli/manage/login.php'>";
		}
	}
}
?>