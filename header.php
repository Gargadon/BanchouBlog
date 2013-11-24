<?php
	require("db.php");
define('dwogame','1');
$config1 = mysql_query('SELECT * FROM blog_config');
$config = mysql_fetch_array($config1);
date_default_timezone_set(''.$config['zona'].'');
require('lang/es_la.php');
// A continuación el login

if (isset($_COOKIE['gargauser']) and isset($_COOKIE['gargapass']))
{

    if (($_COOKIE['gargauser'] != ($usuarios['usuario'])) || ($_COOKIE['gargapass'] !=  md5($usuarios['password']))) {
        
        header('Location: logout.php');
    }
else {
$islogged=1; // Somos usuarios registrados
}
}
else
{
$islogged=0; // No somos usuarios registrados
}
// Termina login

echo '<!DOCTYPE html>
<html class="no-js" lang="es-mx">
  <head><meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="'.$config['pathto'].'css/normalize.css" />
  <link rel="stylesheet" href="'.$config['pathto'].'css/foundation.css" />
  <script src="'.$config['pathto'].'js/vendor/custom.modernizr.js"></script>
    <LINK REL="SHORTCUT ICON" HREF="'.$config['pathto'].'favicon.ico" />';
    echo '<link rel="alternate" type="application/rss+xml" title="'.$config['name'].'" href="'.$config['pathto'].'?action=rss" />';
if(isset($_GET['entryid']))
    {$titulo = mysql_fetch_array(mysql_query('SELECT * FROM blog_entry WHERE `id`=\''.$_GET['entryid'].'\''));
    echo '<title>'.$titulo['subject'].' - '.$config['name'].'</title>';
    unset($titulo);}
    else
    echo '<title>'.$config['name'].' - Powered by '.$config['software'].' version '.$config['version'].'</title>';
	echo '</head>
  <body>
 ';
include('includes/navbar.php');

echo '<div class="row">
  <div class="large-12 columns">
  ';
  
?>
