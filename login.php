<?php
if(isset($_POST['envia']))
{
require('base.php');
require('db.php');

if(trim($_POST['blogu']) != "" && trim($_POST['blogp']) != "")
{
	// Puedes utilizar la funcion para eliminar algun caracter en especifico
	//$usuario = strtolower(quitar($_POST["blogu"]));
	//$password = $_POST["blogp"];
	// o puedes convertir los a su entidad HTML aplicable con htmlentities
	$usuario = strtolower(htmlentities($_POST['blogu'], ENT_QUOTES));
	$password = md5($_POST['blogp']);
	$result = mysqli_query($con,'SELECT * FROM blog_usuarios WHERE usuario=\''.$usuario.'\'');
	if($row = mysqli_fetch_array($result)){
		if($row['password'] == $password){

				if($row['confirmed'] == 0)
				{
				
				echo '<p>Lo sentimos, su cuenta aun no ha sido activada.</p>
				<p>Revise su bandeja de entrada de correo electrónico para activar su cuenta.</p>
				';
				}
				else
				{
           			 /* Cookie expires when browser closes */
            			setcookie("gargauser", $row["usuario"], time()+(10*365*24*60*60), $folder, $path);
           			setcookie("gargapass", md5($row["password"]), time()+(10*365*24*60*60), $folder, $path);
           			header('Location: index.php');
           			
            			}
		}else{
		
			echo 'Password incorrecto';
		}
	}else{
	
		echo 'Usuario no existente en la base de datos';
	}
	mysqli_free_result($result);
}else{

	echo 'Debe especificar un usuario y password';
}
}
else
{
	echo 'Hacker?';
	die();
}
?>
