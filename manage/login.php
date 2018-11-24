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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contra'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "VistaAdministrador.php";
  $MM_redirectLoginFailed = "Menu.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_tlaxcalliconexion, $tlaxcalliconexion);
  
  $LoginRS__query=sprintf("SELECT usuario, contrasena FROM usuarios WHERE usuario=%s AND contrasena=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $tlaxcalliconexion) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Iniciar Sesión</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/inicio.css" media="screen"/> 
		<script type="text/javascript" src="./js/validaciones.js"></script>
		<style type="text/css">
            body {
                background-image: url(img/demo-2-bg.jpg);
                background-size: auto;
                background-attachment: scroll;
            }
            .preg{
                margin-top: 5%;
                margin-bottom: 5%;
                font-family: Corbel;
                font-size: 45px;
                color: #faa732; 
                text-align: center;
            }

            #caja {
                background-color: #FFFFFF;
                opacity: 0.75;
                display: block;
                width:70%;    
                height: auto;
                margin: 0 auto;
				border-radius: 5px;
            }
            #email{
                display: block;
                margin: 10px auto; 
                font-size: 15px;
                width: 100%;
                border-radius: 0px;
                border-top: none;
                border-left: none;
                border-right: none;
                border-bottom-color: #00796B;
            }

            #password{
                display: block;
                margin: 10px auto; 
                font-size: 15px;
                width: 100%;
                border-radius: 0px;
                border-top: none;
                border-left: none;
                border-right: none;
                border-bottom-color: #00796B;
            }
            #tabla {
                margin: auto;
                margin-top: 20px;
                width: 70%;
            }
            label {
                font-family: monospace;
                font-size: 25px;
            }
            a{
                text-decoration: none;
            }
            input[type="submit"]{
                position: relative;
                display: block;
                margin: 20px auto;
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
            input[type="email"]:focus{
                outline: 2px;
                outline-color: #00796B;
                outline-style: solid;
            }
            input[type="password"]:focus{
                outline: 2px;
                outline-color: #00796B;
                outline-style: solid;
            }
            .registro{
                display: block;
                margin-top: 60px;
                font-family: Corbel;
                text-align: center;
                padding: 20px;
            }
            @media screen and (max-width: 500px){
                nav{
                    display:none;
                }
                #table{
                    width: 100%;
                }
                #preg{
                    font-size: 15px;
                }
            }
        </style>
	</head>
<body>
		<span id='error' style='display: none;background-color: red;opacity: 1' class="spanerchico"><i class='icon-error'></i>Caracter Inválido</span>
            <span id='error2' style='display: none;background-color: red;opacity: 1' class="spanerchico"><i class='icon-error'></i>Formulario Incompleto</span>
		<div id="caja">
			<p class="preg">Administrador</p>
		  <form action="<?php echo $loginFormAction; ?>" method="POST" name="forma">
			<table id="tabla">
					<tr>
				<td style="text-align: center"><label style="text-align: center" for="password">Usuario: </label></td>
						<td><input placeholder="Usuario" type="usuario" id="usuario" name="usuario" required onkeypress="return letnum(event)" maxlength="30"></td>
					</tr>
					<tr>
						<td style="text-align: center"><label style="text-align: center" for="password">Contraseña: </label></td>
						<td><input placeholder="Contraseña" type="password" id="password" name="contra" required onkeypress="return letnum(event)" maxlength="30"></td>
					</tr>
			</table>
			<input type="submit" value="Acceder">
		  </form>
		</div>	
</body>
</html>