<?php

// No editar las siguientes líneas.
mysql_connect(''.$dwo_server.'',''.$dwo_user.'',''.$dwo_pass.'')or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db(''.$dwo_base.'')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
$checktable=mysql_query('SELECT * FROM blog_entry');
if(!$checktable)
header('Location: install.php');
mysql_query('SET NAMES \'utf8\' COLLATE \'utf8_unicode_ci\'');

$usuarios1 = mysql_query('SELECT * FROM blog_usuarios WHERE usuario=\''.$_COOKIE['gargauser'].'\'');
$usuarios = mysql_fetch_array($usuarios1);
$grupo1 = mysql_query('SELECT * FROM blog_grupo WHERE id=\''.$usuarios['group'].'\'');
$grupo = mysql_fetch_array($grupo1);

	if (!empty($_SERVER['HTTP_CLIENT_IP']))
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

mysql_query('UPDATE blog_usuarios SET ip=\''.$myip.'\' where id=\''.$usuarios['id'].'\'');
// echo $myip;
?>