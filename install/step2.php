<?php

// Segundo paso de la instalación.
$instala=$_POST['instala'];
if($instala==1)
{
//Creamos tablas
mysql_query("CREATE TABLE IF NOT EXISTS `blog_config` (
  `name` text NOT NULL,
  `version` text NOT NULL,
  `software` text NOT NULL,
  `pathto` text NOT NULL,
  `disqusname` text NOT NULL,
  `footer` text NOT NULL,
    `zona` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `blog_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `subject` text NOT NULL,
  `entry` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `blog_grupo` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `blog_trackback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `blog_name` text NOT NULL,
  `date` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `blog_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `ip` text NOT NULL,
  `group` int(4) NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `location` int(11) NOT NULL DEFAULT '1',
  `confirmtoken` varchar(24) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `blog_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT");

// Terminamos de instalar las tablas

echo '<div class="small-12 large-12 columns">
<h3>Instalación de GargaBlog</h3>
<p>Se han instalado las tablas correspondientes. Es hora de registrar a tu usuario.</p>
<form action="install.php?step=3" method="post">
  <fieldset>
      <legend>Tu usuario</legend>
      <div class="row">
      <div class="small-12 large-8 columns">
      Usuario administrador
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="user" />
      </div>
      </div>
	<div class="row">
      <div class="small-12 large-8 columns">
      Contraseña
      </div>
      <div class="small-12 large-4 columns">
      <input type="password" name="password1" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      Repita contraseña
      </div>
      <div class="small-12 large-4 columns">
      <input type="password" name="password2" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      Correo electrónico
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="email" />
      </div>
      </div>
<input type="hidden" name="instala" value="2" />
<input type="submit" value="Siguiente" class="button secondary">
</fieldset>
</form>';
}
else
{
echo 'Hacker?';
die();
}
?>