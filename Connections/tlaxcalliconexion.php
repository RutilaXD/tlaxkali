<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tlaxcalliconexion = "localhost";
$database_tlaxcalliconexion = "tlaxcalli";
$username_tlaxcalliconexion = "root";
$password_tlaxcalliconexion = "n0m3l0";
$tlaxcalliconexion = @mysql_pconnect($hostname_tlaxcalliconexion, $username_tlaxcalliconexion, $password_tlaxcalliconexion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>