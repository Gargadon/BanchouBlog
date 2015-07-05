<?php
require('base.php');
require('db.php');
echo '<html lang="es-mx">
<head><meta content="text/html; charset=UTF-8" http-equiv="content-type" /></head>
<body>
<p>Este archivo actualizará su base de datos para utilizar la versión 1.2.0 de BanchouBlog.</p>';
mysqli_query($con,"UPDATE `blog_config` SET `version` = '1.2.0'");
mysqli_query($con,"ALTER TABLE `blog_config` DROP `disqusname`");
mysqli_query($con,"CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `type` text NOT NULL,
  `is_guest` int(11) NOT NULL,
  `guest_name` text NOT NULL,
  `guest_email` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
echo '<p>Se ha actualizado correctamente su base de datos. Por favor, borre este archivo antes de continuar.</p>
</body></html>';
?> 
