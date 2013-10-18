<?php
if (($islogged==1) && ($usuarios['group']==1))
{
	if(isset($_POST['envia']))
	{
		$usuario_nuevo=$_POST['usuario_nuevo'];
		$email_nuevo=$_POST['email_nuevo'];
		$password_nuevo=$_POST['password_nuevo'];
		$password2_nuevo=$_POST['password2_nuevo'];
		if(isset($usuario_nuevo) && isset($email_nuevo))
		{
		$crear_usuario=1;
		}
		else
		{
		$crear_usuario=0;
		}
		//Comprobar correo y usuario
		$checkuser = mysql_query("SELECT usuario FROM blog_usuarios WHERE usuario='$usuario_nuevo'");
		$username_exist = mysql_num_rows($checkuser);
		$checkemail = mysql_query("SELECT email FROM blog_usuarios WHERE email='$email_nuevo'");
		$email_exist = mysql_num_rows($checkemail);
		if ($email_exist>0|$username_exist>0) {
			echo "<p>El nombre de usuario o la cuenta de correo estan ya en uso.</p>";
			$crear_usuario=0;
		}
		if(isset($_POST['password_aleatorio']))
		{
			$password_nuevo=substr(md5(uniqid()), 0, 8);
			$passwordenmd5=md5($password_nuevo);
		}
		elseif(isset($password_nuevo))
		{
			if($password_nuevo != $password2_nuevo)
			{
				$crear_usuario=0;
			}
			else
			{
				$passwordenmd5=md5($password_nuevo);
			}
		}
		else
		{
			$crear_usuario=0;
		}
		if($crear_usuario==1)
		{
		echo '<p>El usuario <em>'.$usuario_nuevo.'</em> se ha creado con la contraseña <em>'.$password_nuevo.'</em>.</p>';
		if(isset($_POST['notify_nuevo']))
		{
			$to = $email_nuevo;
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$cabeceras .= 'Content-Transfer-Encoding: 8bit' . "\r\n";
			//$cabeceras .= 'To: '.$row['email'].'' . "\r\n";
			$cabeceras .= 'From: '.$config['name'].' <noreply@gargadon.info>'. "\r\n";
			$asunto = $config['name'].' - Activación de cuenta';
			$mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
				<html>
		  		<head>
		   		 <meta content="text/html; charset=UTF-8" http-equiv="content-type">
		   		 <title></title>
		  		</head>
		  <body><p>Hola, '.$usuario_nuevo.'.</p>
		    <p>Se te ha enviado este correo electrónico debido a que has registrado una cuenta en
		'.$config['name'].'.</p>
		    <p>Puede acceder inmediatamente dando click a la siguiente dirección o copiando la dirección en su navegador:</p>
		    <p><a href="'.$config['pathto'].'">'.$config['pathto'].'</a></p>
		    <p>Tus datos de usuario son los siguientes:</p>
		    <p><ul><li>Usuario: '.$usuario_nuevo.'</li>
		    <li>Contraseña: '.$password_nuevo.'</li></ul></p>
		    <p>El equipo de '.$config['name'].'.</p>
		    <h6>Este correo se te ha enviado ya que tu dirección está asociada a una
		      cuenta de usuario de '.$config['name'].'. Por favor no responda a este	
		      correo. </h6>';
		     	mail($to, '=?UTF-8?B?'.base64_encode($asunto).'?=', $mensaje, $cabeceras);
		}
		else
		{
		echo '<p>Favor de avisar al usuario sobre sus datos de acceso.</p>';
		}
					$query = 'INSERT INTO blog_usuarios (usuario, `group`, password, email, fecha, confirmed) VALUES (\''.$usuario_nuevo.'\',\'1\',\''.$passwordenmd5.'\',\''.$email_nuevo.'\',\''.date("Y-m-d").'\',\'1\')';
					mysql_query($query) or die(mysql_error());
		}
		else
		{
		echo "<p>El usuario no ha podido ser creado. Verifique los datos e intente de nuevo.</p>";
		}
	}
	else
	{
		echo '<form action="admin.php?action=createuser" method="post">
		<table class="table large-12 small-12 columns">
		<tr><th colspan="2">Crear usuario</th></tr>
		<tr><td>Nombre de usuario</td><td><input type="text" name="usuario_nuevo"></td></tr>
		<tr><td>Correo electrónico</td><td><input type="text" name="email_nuevo"></td></tr>
		<tr><td>Contraseña</td><td><input type="password" name="password_nuevo"></td></tr>
		<tr><td>Repetir contraseña</td><td><input type="password" name="password2_nuevo"></td></tr>
		<tr><td>Crear contraseña aleatoria<br/>
		<small>Si es así, deje vacío los campos <em>Contraseña</em>
		y <em>Repetir contraseña</em>.</td><td><input type="checkbox" name="password_aleatorio"></td></tr>
		<tr><td>Notificar al usuario</td><td><input type="checkbox" name="notify_nuevo"></td></tr>
		<tr><td><input type="submit" value="Crear usuario" class="button success"></td><td><input type="reset" value="Restablecer campos" class="button secondary"></td></tr>
		</table>
		<input type="hidden" name="envia" value="yes">
		</form>';
	}

}
else
{
	header("HTTP/1.0 403 Forbidden");
}
?>