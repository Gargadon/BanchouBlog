<?php
//session_start();
error_reporting(E_ALL ^ E_NOTICE);
	require("base.php");
	require("db.php");
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	include("navbar.php");
	
// Create a title.
$name = $config["name"]." - Editar perfil";

	if (isset($_GET['id']))
	{
	$tpl->profid = $_GET['id'];
	$profid = $_GET['id'];
	$recprofile1 = mysqli_query($con,'SELECT * FROM blog_usuarios WHERE id=\''.$profid.'\'');
	$recprofile = mysqli_fetch_array($recprofile1);
	if(empty($recprofile['usuario']))
	{
	$tpl->nousuario = 1;
	}
	elseif($recprofile['id']==$usuarios['id'] || $usuarios['group']==1)
	{
	$tpl->nousuario = 0;
	$recgroup1 = mysqli_query($con,'SELECT * FROM blog_grupo WHERE id=\''.$recprofile['group'].'\'');
	$recgroup = mysqli_fetch_array($recgroup1);
	$cambiagrupo1 = mysqli_query($con,'SELECT id,nombre FROM blog_grupo');
	// A continuación debe ir lo que contendrá el módulo.
           	if(isset($_POST['actualiza']))
		{
		$tpl->actualiza = 'yes';
	$username = $_POST["usuario"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellidos"];
	if($usuarios['group']==1)
	$group = $_POST["grupo"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	$descripcion = $_POST["descripcion"];
	$passwordenmd5 = md5($password2);
		if($passwordenmd5!=d41d8cd98f00b204e9800998ecf8427e)
			{
			if($password1!=$password2) {
				
				}
			else
				{
				
				if($recprofile['usuario']!=$username)
				{
				$tpl->destroysession = 1;
				mysqli_query($con,'UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\', usuario=\''.$username.'\', password=\''.$passwordenmd5.'\', descripcion=\''.$descripcion.'\', `group`=\''.$group.'\'  WHERE usuario=\''.$recprofile['usuario'].'\'');
				session_destroy();
				}
				else
				{
				$tpl->destroysession = 1;
				mysqli_query($con,'UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\', password=\''.$passwordenmd5.'\', descripcion=\''.$descripcion.'\', `group`=\''.$group.'\' WHERE usuario=\''.$recprofile['usuario'].'\'');
					}
				}
			}
		else
		{
				if($recprofile['usuario']!=$username)
				{
				$tpl->destroysession = 1;
				mysqli_query($con,'UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\', usuario=\''.$username.'\', descripcion=\''.$descripcion.'\', `group`=\''.$group.'\' WHERE usuario=\''.$recprofile['usuario'].'\'');
				session_destroy();
				}
				else
				{
				$tpl->destroysession = 0;
				mysqli_query($con,'UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\',descripcion=\''.$descripcion.'\', `group`=\''.$group.'\' WHERE usuario=\''.$recprofile['usuario'].'\'');
					}
		}
		}
	else
	{
	$profile = array(
	  'usuario' => $recprofile['usuario'],
	  'nombre' => $recprofile['name'],
	  'apellido' => $recprofile['surname'],
	  'correo' => $recprofile['email'],
	  'fecha' => $recprofile['fecha'],
	  'acerca' => $recprofile['descripcion'],
	  'grupo' => $recprofile['group'],
	  'nombre_grupo' => $recgroup['nombre']
	);
	if(($usuarios['group']==1))
         {
         $tpl->canchangegroup = 1;
         $contador = 1;
	while($cambiagrupo = mysqli_fetch_array($cambiagrupo1))
	{
	      $tpl->contador = $contador;
	      $grupo_id[$contador] = $cambiagrupo['id'];
	      $grupo_nombre[$contador] = $cambiagrupo['nombre'];
	    
	    $contador++;
	}
	$tpl->grupo_id = $grupo_id;
	$tpl->grupo_nombre = $grupo_nombre;
	}
	else
	{
	$tpl->canchangegroup = 0;
        }

        }
    }
}
$tpl->title = $name;
$tpl->profile = $profile;
$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/edit_profile.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?>