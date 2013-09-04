<?php
if(defined("dwogame"))
{
if ($usuarios['group']==1)
{
	if(isset($_POST['envia']))
	{
	mysql_query('UPDATE blog_config SET name=\''.$_POST['blogname'].'\', pathto=\''.$_POST['pathto'].'\', disqusname=\''.$_POST['disqusname'].'\', footer=\''.$_POST['footer'].'\', zona=\''.$_POST['zona'].'\'');
			echo '<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th>Configuración del blog</th>
</tr>
<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="admin.php?action=config2">Regresar a administración</a></td>
		</tr>
		<tr>
		<td><a href="index.php">Regresar al índice</a></td>
		</tr>
		</tbody></table>';
	}
	else
	{
$config_blog1 = mysql_query('SELECT * FROM blog_config');
$config_blog = mysql_fetch_array($config_blog1);
echo '<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form action="admin.php?action=config2" method="POST">
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th colspan="2">Configuración del blog</th>
</tr>
<tr>
<td>Nombre del blog: </td><td><input type="text" name="blogname" value="'.$config_blog['name'].'" /></td>
</tr>
<tr>
<td>Nombre de usuario de <a href="http://www.disqus.com/about/" target="_blank">Disqus</a>: </td><td><input type="text" name="disqusname" value="'.$config_blog['disqusname'].'" /></td>
</tr>
<tr>
<td>Dirección del blog: </td><td><input type="text" name="pathto" value="'.$config_blog['pathto'].'" /></td>
</tr>
<tr>
<td>Footer: </td><td><textarea id="editor1" name="footer">'.$config_blog['footer'].'</textarea></td>
</tr>
<tr>
<td>Zona horaria (<a href="http://php.net/manual/en/timezones.php" target="_blank">Más info</a>): </td><td><input type="text" name="zona" value="'.$config_blog['zona'].'" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="button success" value="Guardar cambios" /> <input type="reset" class="button secondary" value="Restablecer" /></td>
</tr>
</tbody>
</table>
<input type="hidden" name="envia" value="yes" />
</form>
<script type="text/javascript">
			CKEDITOR.replace( \'editor1\' );
		</script>';
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