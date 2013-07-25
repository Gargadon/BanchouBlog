<?php
if(isset($_POST['envia']))
{
require('base.php');
require('db.php');
function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}
if(trim($_POST['blogu']) != "" && trim($_POST['blogp']) != "")
{
	// Puedes utilizar la funcion para eliminar algun caracter en especifico
	//$usuario = strtolower(quitar($_POST["blogu"]));
	//$password = $_POST["blogp"];
	// o puedes convertir los a su entidad HTML aplicable con htmlentities
	$usuario = strtolower(htmlentities($_POST['blogu'], ENT_QUOTES));
	$password = md5($_POST['blogp']);
	$result = mysql_query('SELECT * FROM blog_usuarios WHERE usuario=\''.$usuario.'\'');
	if($row = mysql_fetch_array($result)){
		if($row['password'] == $password){
			if($row['group'] == 99)
			{
			include("header.php");
			echo '<p>Lo sentimos, usted ha sido expulsado del juego.<br />
			El motivo de expulsión es el siguiente:</p>
			<strong>'.$row['reasonban'].'</strong>
			<p>Si cree que esto ha sido un error y desea obtener su derecho de réplica,
			puede hacerlo dirigiéndose al <a href="http://www.gargadon.info/forum/index.php">foro</a>.
			</p>
			';
			}
			else
			{
				if($row['confirmed'] == 0)
				{
				include("header.php");
				echo '<p>Lo sentimos, su cuenta aun no ha sido activada.</p>
				<p>Revise su bandeja de entrada de correo electrónico para activar su cuenta.</p>
				';
				}
				else
				{
           			 /* Cookie expires when browser closes */
            			setcookie("gargauser", $row["usuario"], 0, "/", "www.gargadon.info");
           			setcookie("gargapass", md5($row["password"]), 0, "/", "www.gargadon.info");
            			header('Location: index.php');
            			}
				}
		}else{
		include("header.php");
			echo 'Password incorrecto';
		}
	}else{
	include("header.php");
		echo 'Usuario no existente en la base de datos';
	}
	mysql_free_result($result);
}else{
include("header.php");
	echo 'Debe especificar un usuario y password';
}
}
else
{
	echo 'Hacker?';
	die();
}
include('footer.php');
?>