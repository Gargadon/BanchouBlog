<?php

// Segundo paso de la instalación.
$instala=$_POST['instala'];
if($instala==2)
{
	$user=$_POST['user'];
	$email=$_POST['email'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	if(empty($password1) || empty($password2) || ($password1!=$password2) || empty($user) || empty($email))
echo '<div class="small-12 large-12 columns">
<h3>'.__('Instalación de GargaBlog').'</h3>
<p>'.__('No se ha podido continuar con el siguiente paso. Revisa los datos que has colocado y realiza el paso de nuevo.').'</p>
<form action="install.php?step=4" method="post">
  <fieldset>
      <legend>'.__('Tu usuario').'</legend>
      <div class="row">
      <div class="small-12 large-8 columns">
      '.__('Usuario administrador').'
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="user" />
      </div>
      </div>
	<div class="row">
      <div class="small-12 large-8 columns">
      '.__('Contraseña').'
      </div>
      <div class="small-12 large-4 columns">
      <input type="password" name="password1" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      '.__('Repita contraseña').'
      </div>
      <div class="small-12 large-4 columns">
      <input type="password" name="password2" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      '.__('Correo electrónico').'
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="email" />
      </div>
      </div>
<input type="hidden" name="instala" value="2" />
<input type="submit" value="'.__('Siguiente').'" class="button secondary">
</fieldset>
</form>';
	else
	{
	$passwordenmd5=md5($password1);
	$fecha=date('Y-m-d');
	mysql_query("INSERT INTO `blog_usuarios` (`usuario`, `group`, `password`, `email`, `fecha`, `confirmed`) VALUES
('".$user."', 1, '".$passwordenmd5."', '".$email."', '".$fecha."', 1)");
echo '<div class="small-12 large-12 columns">
<h3>'.__('Instalación de GargaBlog').'</h3>
<p>'.__('Ahora nos toca configurar el blog.').'</p>
<form action="install.php?step=5" method="post">
  <fieldset>
      <legend>'.__('Tu blog').'</legend>
      <div class="row">
      <div class="small-12 large-8 columns">
      '.__('Nombre del blog').'
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="blogname" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      '.__('Dirección del blog<br/><small>Con <em>http</em> al principio y </em>/</em> al final</small>').'
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="path" />
      </div>
      </div>
      <div class="row">
      <div class="small-12 large-8 columns">
      '.__('Nombre corto de Disqus').'<br/><small>'.__('El blog utiliza Disqus para los comentarios. Si no tiene cuenta en Disqus, créela y regrese a este paso.').'</small>
      </div>
      <div class="small-12 large-4 columns">
      <input type="text" name="disqusname" />
      </div>
      </div>
<input type="hidden" name="instala" value="3" />
<input type="submit" value="'.__('Siguiente').'" class="button secondary">
</fieldset>
</form>';
	}
}
else
{
echo 'Hacker?';
die();
}
?>