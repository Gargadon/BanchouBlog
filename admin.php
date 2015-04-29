<?php
error_reporting(E_ALL ^ E_NOTICE);
	require("base.php");
	require("db.php");
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	include("navbar.php");
	
// Create a title.
$name = $config["name"]." - Configuración";
$tpl->title = $name;
if (defined("dwogame"))
{

$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
// Debemos estar seguros de que somos administradores
if ($usuarios['group']==1)
	{
	if(isset($_GET['action']))
	{
	$adminid = $_GET['action'];
	switch($adminid)
	{
			case 'viewentries':
			include('admin/viewentries.php');
			break;
			
			case 'config':
			include('admin/config.php');
			break;
			
			case 'cats':
			include('includes/neko.php');
			break;

			case 'categories':
			include('admin/categories.php');
			break;
			
			case 'pages':
			include('admin/new_pages.php');
			break;

			case 'editentry':
			include('admin/editentry.php');
			break;			
			
			case 'editpage':
			include('admin/editpage.php');
			break;		
	
			case 'deleteentry':
			include('admin/deleteentry.php');
			break;

			case 'deletepage':
			include('admin/deletepage.php');
			break;
			
			case 'users':
			include('admin/users.php');
			break;
			
			case 'newentry':
			include('admin/newentry.php');
			break;
			
			case 'deleteuser':
			include('admin/deleteuser.php');
			break;
			
			case 'createuser':
			include('admin/createuser.php');
			break;
			
			case 'editcat':
			include('admin/editcat.php');
			break;
			
			case 'deletecat':
			include('admin/deletecat.php');
			break;
		
		default:
		$tpl->novalid = 1;
	}
	}
	else
	{
	$tpl->display('skins/'.$config['skin'].'/templates/admin.tpl.php');
	}
	}
else
	{
	echo 'Hacker?';
	}
}
else
{
header("HTTP/1.0 403 Forbidden");
}

$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?> 
