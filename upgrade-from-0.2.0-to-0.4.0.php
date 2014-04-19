<?php
require('base.php');
require('db.php');
echo '<html lang="es-mx">
  <head><meta content="text/html; charset=UTF-8" http-equiv="content-type" /></head>
<body>
<p>'.__('Este archivo actualizará su base de datos para utilizar la versión 0.4.0 de GargaBlog.').'</p>';
mysql_query("CREATE TABLE IF NOT EXISTS `blog_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
mysql_query("INSERT INTO `blog_cats` (`id`, `name`, `description`) VALUES
(1, 'Sin categoría', 'No category entries')");
mysql_query("UPDATE `blog_config` SET  `version` = '0.4.0'");
mysql_query("ALTER TABLE  `blog_entry` ADD  `cat_id` INT NOT NULL");
echo '<p>'.__('Se ha actualizado correctamente su base de datos. Por favor, borre este archivo antes de continuar.').'</p>
</body></html>';
?>