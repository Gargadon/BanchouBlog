<?php
	require("db.php");
define('dwogame','1');
$config1 = mysql_query('SELECT * FROM blog_config');
$config = mysql_fetch_array($config1);
date_default_timezone_set(''.$config['zona'].'');
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

	// Primero se han de incluir los ficheros del paquete php-gettext:
	require_once( 'plugins/gettext/streams.php' );
	require_once( 'plugins/gettext/gettext.php' );
	

	// Después debemos de obtener el idioma del navegador que esta usando el usuario:
	// Sabiendo el idioma podremos cargar la traducción para él o ofrecerle la de por defecto.
	switch( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) )
	{
		case 'es':
		$idioma = "es_ES";
		break;
		
		default:
		$idioma = 'en_US';
	}


	// Después se carga el fichero de idioma:
	if( file_exists('lang/'. $idioma .'.mo') )
	{
		$gettext_tables = new gettext_reader(
				new CachedFileReader('lang/'. $idioma .'.mo')
		);
		$gettext_tables->load_tables();
	}
	
	
	// Disponemos de dos funciones para obtener la traducción de cada texto almacenada en el catalogo.
	// La función __() recibe un texto y devuelve la traducción, o el texto original si no existe, por valor:
	function __($texto)
	{
		global $gettext_tables;

		if (is_null($gettext_tables))
			return $texto;
		else
			return $gettext_tables->translate($texto);
	}
	
	
	// En el caso de la función _e() se recibe el texto y se imprime la traducción, o el original si no existe.
	function _e($texto)
	{
		global $gettext_tables;

		if (is_null($gettext_tables))
			echo $texto;
		else
			echo $gettext_tables->translate($texto);
	}

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

echo '<br />
<div class="row">
  <div class="large-12 columns">
  ';
  
?>
