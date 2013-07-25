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

function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}
$myip = getRealIP();
mysql_query('UPDATE usuarios SET ip=\''.$myip.'\' where id=\''.$usuarios['id'].'\'');
// echo $myip;
?>