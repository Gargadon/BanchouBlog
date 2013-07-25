<?php
require("base.php");
include("header.php");
	if($_GET) {
		$token = $_GET['token'];
		$email = $_GET['email'];
		$confirma1 = mysql_query('SELECT confirmed,email,confirmtoken FROM blog_usuarios WHERE email = \''.$email.'\'');
		$confirma = mysql_fetch_array($confirma1);
		if($confirma['confirmed'] == 0) {
		if($confirma['confirmtoken'] == $token)
		{
		mysql_query('UPDATE blog_usuarios SET confirmed=\'1\' WHERE email = \''.$email.'\'');
echo '<div data-alert class="alert-box success">¡Felicidades! Ha confirmado correctamente su cuenta de correo.</div>';
		}
		else
		{
		echo '<div data-alert class="alert-box alert">No se pudo confirmar su cuenta de correo.</div>';
		}
		} else {
echo '<div data-alert class="alert-box alert">Su cuenta de usuario ya ha sido confirmada con anterioridad.</div>';
		}
	}
include("footer.php");
?>