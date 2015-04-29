<?php

// No editar las siguientes líneas.
$con=mysqli_connect(''.$dwo_server.'',''.$dwo_user.'',''.$dwo_pass.'')or die ('Ha fallado la conexión: '.mysqli_error());
mysqli_select_db($con,''.$dwo_base.'')or die ('Error al seleccionar la Base de Datos: '.mysqli_error());
$checktable=mysqli_query($con,'SELECT * FROM blog_entry');
if(!$checktable)
header('Location: install.php');
mysqli_query($con,'SET NAMES \'utf8\' COLLATE \'utf8_unicode_ci\'');
$configuracion1 = mysqli_query($con,'SELECT * FROM blog_config');
$config = mysqli_fetch_array($configuracion1);
$usuarios1 = mysqli_query($con,'SELECT * FROM blog_usuarios WHERE usuario=\''.$_COOKIE['gargauser'].'\'');
$usuarios = mysqli_fetch_array($usuarios1);
$grupo1 = mysqli_query($con,'SELECT * FROM blog_grupo WHERE id=\''.$usuarios['group'].'\'');
$grupo = mysqli_fetch_array($grupo1);

	if(!empty($_SERVER["HTTP_CF_CONNECTING_IP"]))
	{
		$myip=$_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	elseif (!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$myip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	//to check ip is pass from proxy
	{
		$myip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$myip=$_SERVER['REMOTE_ADDR'];
	}

mysqli_query($con,'UPDATE blog_usuarios SET ip=\''.$myip.'\' where id=\''.$usuarios['id'].'\'');
// echo $myip;
?>
