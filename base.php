﻿<?php
// Por favor, sustituya los valores de las siguientes variables para
// realizar la conexión con su base de datos.
$dwo_server='';
$dwo_user='';
$dwo_pass='';
$dwo_base='';

// Para configurar en niveles superiores la instalación.

$gargablog_server = ''; // Sin espacios y sin http://www
$with_www = 1;
if($with_www==1)
$path = 'www.'.$gargablog_server;
else
$path = $gargablog_server;
$folder = '/'; // Dirección donde se encuentra el blog. Si está en la raíz, poner / 

?>