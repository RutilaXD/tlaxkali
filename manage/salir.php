<?php
session_start();
if (!empty($_SESSION)) {
	session_destroy();
	print "<script>alert('Has cerrado sesión');</script>";
	print "<meta http-equiv='refresh' content='0.4; http://localhost/tlaxcalli/'>";
} else {
	print "<script>alert('A donde crees que vas?');</script>";
	print "<meta http-equiv='refresh' content='0.4; http://localhost/tlaxcalli/'>";
}?>