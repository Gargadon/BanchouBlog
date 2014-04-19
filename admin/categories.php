<?php
if(defined("dwogame"))
{
if ($usuarios['group']==1)
{
	if(isset($_POST['envia1']))
	{
	mysql_query('INSERT blog_cats (name,description) VALUES (\''.$_POST['name'].'\', \''.$_POST['description'].'\')');
			echo '<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th>Crear categorías</th>
</tr>
<tr>
		<td>'.__('Los cambios se han realizado correctamente.').'</td>
		</tr>
		<tr>
		<td><a href="admin.php?action=config2">'.__('Regresar a administración').'</a></td>
		</tr>
		<tr>
		<td><a href="index.php">'.__('Regresar al índice').'</a></td>
		</tr>
		</tbody></table>';
	}
	else
	{
echo '
<form action="admin.php?action=categories" method="POST">
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th colspan="2">'.__('Crear categorías').'</th>
</tr>
<tr>
<td>'.__('Nombre de la categoría').': </td><td><input type="text" name="name" /></td>
</tr>
<tr>
<td>'.__('Descripción').': </td><td><input type="text" name="description" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="button success" value="'.__('Guardar cambios').'" /> <input type="reset" class="button secondary" value="'.__('Restablecer').'" /></td>
</tr>
</tbody>
</table>
<input type="hidden" name="envia1" value="yes" />
</form>
';
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