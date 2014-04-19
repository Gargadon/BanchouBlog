<?php
require('base.php');
require('db.php');
echo '<html lang="es-mx">
  <head><meta content="text/html; charset=UTF-8" http-equiv="content-type" /></head>
<body>
<p>Este archivo actualizará su base de datos para utilizar la versión 0.6.0b1 de GargaBlog.</p>';
mysql_query("CREATE TABLE IF NOT EXISTS `blog_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `subject` text NOT NULL,
  `page` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
mysql_query("ALTER TABLE  `blog_config` ADD `lang` TEXT NOT NULL");
mysql_query("UPDATE `blog_config` SET  `version` = '0.6.0b1'");
mysql_query("UPDATE `blog_config` SET  `lang` = 'es'");
echo '<p>Se ha actualizado correctamente su base de datos. Por favor, borre este archivo antes de continuar.</p>
</body></html>';
?>
