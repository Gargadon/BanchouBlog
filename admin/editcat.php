<?php
if(defined('dwogame'))
{
               echo '<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th>Editar categoría</th>
		</tr>';
	if(isset($_POST['envia']))
	{
	mysql_query('UPDATE blog_cats SET name=\''.$_POST['nombre'].'\',description=\''.$_POST['descripcion'].'\' WHERE id=\''.$_GET['id'].'\'');
			echo '<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="index.php?id='.$_GET['id'].'">Ver tema</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar al índice</a></td>
		</tr>';
	}
	else
	{
	$blog1 = mysql_query('SELECT * FROM blog_cats WHERE id=\''.$_GET['id'].'\'');
	$blog = mysql_fetch_array($blog1);
		echo '

		<tr>
		<td><form action="admin.php?action=editcat&id='.$_GET['id'].'" method="POST">
		Tema: <input type="text" name="nombre" value="'.$blog['name'].'" />
		</td>
		</tr>
		<tr>
		<td>
		Descripción extendida: <input type="text" name="descripcion" value="'.$blog['description'].'" />
		</td></tr>
		<tr><td>
		<input type="submit" class="button success" value="Guardar cambios" />
		<input type="hidden" name="envia" value="yes" />
		</form>
		</td>
		</tr>';
	}
		echo '</tbody>
		</table>';
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>