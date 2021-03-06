<?php
$tpl->blogname = $config['name']; //Obtenemos el nombre del blog
$tpl->version = $config['version']; //obtenemos los datos de la versión del blog
$tpl->software = $config['software']; //obtenemos los datos del software
$tpl->favicon = $config['favicon']; //Obtenemos el favicon
$tpl->description = $config['description']; //Obtenemos la descripción
$tpl->keywords = $config['keywords']; //Obtenemos los keywords
$tpl->footer = $config['footer']; //obtenemos los datos del footer
$tpl->logged = $islogged; //Obtenemos si el usuario está logueado
$tpl->recaptcha = $config['recaptcha_activated']; //Esta habilitado Recaptcha?
$tpl->recaptcha_key = $config['recaptcha_key']; //Clave publica de recaptcha
$tpl->recaptcha_secret = $config['recaptcha_secret']; //Clave privada de recaptcha
$tpl->skin = 'skins/'.$config['skin'];
if($islogged == 1)
{
$tpl->group = $usuarios['group']; //Obtenemos el grupo del usuario
$tpl->myid = $usuarios['id']; //Obtenemos el user 
$tpl->myname = $usuarios['usuario']; //Obtenemos el nick
$tpl->mymail = $usuarios['email']; //Obtenemos el correo
}

$cats1 = mysqli_query($con,'SELECT * FROM blog_cats ORDER BY \'id\' DESC');
$contador = 1;
while($cats = mysqli_fetch_array($cats1))
{
$viewcats[$contador] = array(
	'id' => $cats['id'],
	'name' => $cats['name'],
    );
$contador++;
}

$pages1 = mysqli_query($con,'SELECT * FROM blog_pages ORDER BY \'id\' DESC');
$contador = 1;
while($pages = mysqli_fetch_array($pages1))
{
$viewpages[$contador] = array(
	'id' => $pages['id'],
	'name' => $pages['subject'],
    );
$contador++;
}
$tpl->categories = $viewcats; //Obtenemos las categorías
$tpl->pages = $viewpages; //Obtenemos las páginas
?>
