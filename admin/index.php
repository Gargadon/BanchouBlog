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

			case 'categories':
			include('includes/categories.php');
			break;

			case 'editentry':
			include('admin/editentry.php');
			break;			
	
			case 'deleteentry':
			include('admin/deleteentry.php');
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
		
		default:
		echo 'Opción no válida';
	}
	}
	else
	{
		echo '
		<table>
		<tbody>
		<tr>
		<th>Administración</th>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=config2">Configuración general del CMS</a></h4>
		Cambia partes importantes del CMS como estilos, etc.
		</td>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=config">Editar entradas</a></h4>
		Borra y edita entradas.
		</td>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=newentry">Nueva entrada</a></h4>
		Añada una nueva entrada a su blog.
		</td>
		</tr>
		<tr>
		<td>
		<h4><a href="'.$_SERVER['PHP_SELF'].'?action=users">Modificar usuarios</a></h4>
		Cree y modifique usuarios.
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