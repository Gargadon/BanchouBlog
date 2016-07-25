<?php

// Segundo paso de la instalación.
$instala=$_POST['instala'];
if($instala==2)
{
$blogname=$_POST['blogname'];
$path=$_POST['path'];
	if(empty($blogname) || empty($path))
echo '<div class="small-12 large-12 columns">
<h3>Instalación de BanchouBlog</h3>
<p>No se ha podido configurar el blog. Revise los datos y repita el paso de nuevo.</p>
<form action="install.php?step=4" method="post">
  <fieldset>
      <legend>Tu blog</legend>
      <div class="row">
      <div class="small-12 large-8 columns">
      Nombre del blog
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="blogname" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      Dirección del blog<br/><small>Con <em>http</em> al principio y </em>/</em> al final</small>
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="path" />
      </div>
      </div>
<input type="hidden" name="instala" value="2" />
<input type="submit" value="Siguiente" class="button secondary">
</fieldset>
</form>';
	else
	{
	mysqli_query($con,"INSERT INTO `blog_config` (`name`, `version`, `skin`, `software`, `description`, `pathto`, `footer`, `zona`) VALUES
('".$blogname."', '1.3.2', 'foundation', 'BanchouBlog', 'Nuevo blog', '".$path."', '<p>BanchouBlog is a simple blog written in PHP.</p>\r\n<p>&#169; BanchouBlog.us</p>', 'America/Merida')");
mysqli_query($con,"INSERT INTO `blog_grupo` (`id`, `nombre`) VALUES
(0, 'Usuario'),
(1, 'Administrador')");
mysqli_query($con,"INSERT INTO `blog_cats` (`id`, `name`, `description`) VALUES
(1, 'Uncategorized', 'No category entries')");
echo '<div class="small-12 large-12 columns">
<h3>Instalación de BanchouBlog</h3>
<p>Ahora sigue el paso 3... Un momento, ¿y el paso 3?</p>
<p>¿Lo ves? El instalador es tan sencillo que no se requieren más pasos. Tu blog ya está listo.</p>
<p>Este paso va por tu propia cuenta. Ve al FTP de tu blog y borra los archivos <em>install.php</em> y el directorio <em>install</em>. Ya no los necesitarás.</p>
<p>No borrar estos archivos puede provocar una enorme brecha de seguridad en tu blog. Es importante que los borres.</p>
<a href="index.php" class="button secondary">Llévame a mi blog</a>';
	}
}
else
{
echo 'Hacker?';
die();
}
?>
