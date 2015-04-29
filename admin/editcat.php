<?php
if(defined('dwogame'))
{
               echo '<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th>'.__('Editar categoría').'</th>
		</tr>';
	if(isset($_POST['envia']))
	{
	mysqli_query($con,'UPDATE blog_cats SET name=\''.$_POST['nombre'].'\',description=\''.$_POST['descripcion'].'\' WHERE id=\''.$_GET['id'].'\'');
			echo '<tr>
		<td>'.__('Los cambios se han realizado correctamente.').'</td>
		</tr>
		<tr>
		<td><a href="index.php?id='.$_GET['id'].'">'.__('Ver tema').'</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">'.__('Regresar al índice').'</a></td>
		</tr>';
	}
	else
	{
	$blog1 = mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$_GET['id'].'\'');
	$blog = mysqli_fetch_array($blog1);
		echo '

		<tr>
		<td><form action="admin.php?action=editcat&id='.$_GET['id'].'" method="POST">
		'.__('Tema').': <input type="text" name="nombre" value="'.$blog['name'].'" />
		</td>
		</tr>
		<tr>
		<td>
		'.__('Descripción extendida').': <input type="text" name="descripcion" value="'.$blog['description'].'" />
		</td></tr>
		<tr><td>
		<input type="submit" class="button success" value="'.__('Guardar cambios').'" />
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