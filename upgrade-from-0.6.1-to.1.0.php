<?php
require('base.php');
require('db.php');
echo '<html lang="es-mx">
<head><meta content="text/html; charset=UTF-8" http-equiv="content-type" /></head>
<body>
<p>Este archivo actualizará su base de datos para utilizar la versión 1.0 de BanchouBlog.</p>';
mysqli_query($con,"ALTER TABLE `blog_config` ADD `skin` text NOT NULL");
mysqli_query($con,"ALTER TABLE `blog_config` ADD `description` text NOT NULL");
mysqli_query($con,"UPDATE `blog_config` SET `software` = 'BanchouBlog'");
mysqli_query($con,"UPDATE `blog_config` SET `version` = '1.0'");
mysqli_query($con,"UPDATE `blog_config` SET `skin` = 'foundation'");
mysqli_query($con,"UPDATE `blog_config` SET `description` = 'Nuevo Blog'");
mysqli_query($con,"UPDATE `blog_config` SET `lang` = 'es'");
echo '<p>Se ha actualizado correctamente su base de datos. Por favor, borre este archivo antes de continuar.</p>
</body></html>';
?> 
