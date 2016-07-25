<?php
if (defined("dwogame"))
{
// Debemos estar seguros de que somos administradores
if ($usuarios['group']==1)
	{
	if(isset($_GET['action']))
	{
	$adminid = $_GET['action'];
	switch($adminid)
	{
			case 'config':
			include('admin/config.php');
			break;
			
			case 'config2':
			include('admin/config_main.php');
			break;
			
			case 'cats':
			include('includes/neko.php');
			break;

			case 'recaptcha':
			include('admin/recaptcha.php');
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
		echo __('Opción no válida');
	}
	}
	else
	{
		echo '
		<table>
		<tbody>
		<tr>
		<th>'.__('Administración').'</th>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=config2">'.__('Configuración general del CMS').'</a></h4>
		'.__('Cambia partes importantes del CMS como estilos, etc.').'
		</td>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=config">'.__('Editar entradas').'</a></h4>
		'.__('Borra y edita entradas.').'
		</td>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=newentry">'.__('Nueva entrada').'</a></h4>
		'.__('Añada una nueva entrada a su blog.').'
		</td>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=users">'.__('Modificar usuarios').'</a></h4>
		'.__('Cree y modifique usuarios.').'
		</td>
		</tr>
		</tbody>
		</table>
		<br />';
	}
	}
else
	{
	echo 'Hacker?';
	die();
	}
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>