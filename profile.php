<?php
error_reporting(E_ALL ^ E_NOTICE);
	require("base.php");
	require("db.php");
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	include("navbar.php");
	
// Create a title.
$name = $config["name"]." - Página principal";
if(isset($_GET['id']))
	{
	$recprofile1 = mysqli_query($con,'SELECT * FROM blog_usuarios WHERE id=\''.$_GET['id'].'\'');
	$recprofile = mysqli_fetch_array($recprofile1);
/*	if(empty($recprofile['usuario']))
	{
	$tpl->usuario = 0;
	}
	else
	{*/
	$tpl->usuario = 1;
	$recgroup1 = mysqli_query($con,'SELECT * FROM blog_grupo WHERE id=\''.$recprofile['group'].'\'');
	$recgroup = mysqli_fetch_array($recgroup1);
	$viewprofile = array(
	'usuario' => $recprofile['usuario'],
        'rol' => $recgroup['nombre'],
        'ip' => $recprofile['ip'],
        'host' => gethostbyaddr($recprofile['ip']),
        'avatar' => 'http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=150&amp;r=pg&amp;d=mm',
	'about' => $recprofile['descripcion'],
	 );
//	}
	}
elseif($islogged==1)
	{
	$tpl->usuario = 1;
	$recgroup1 = mysqli_query($con,'SELECT * FROM blog_grupo WHERE id=\''.$usuarios['group'].'\'');
	$recgroup = mysqli_fetch_array($recgroup1);
	$viewprofile = array(
	'usuario' => $usuarios['usuario'],
        'rol' => $recgroup['nombre'],
        'ip' => $usuarios['ip'],
        'host' => gethostbyaddr($usuarios['ip']),
        'avatar' => 'http://www.gravatar.com/avatar/'.md5($usuarios['email']).'?s=150&amp;r=pg&amp;d=mm',
	'about' => $usuarios['descripcion'],
	 );
	}
else
	{
	$tpl->usuario = 0;
	}
	
// Assign values to the Savant instance.
$tpl->title = $name;
$tpl->perfil = $viewprofile;

// Display a template using the assigned values.
$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/profile.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?>