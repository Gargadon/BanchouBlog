<?php
if(defined('dwogame'))
{
echo '<table>
		<tbody>
		<tr>
		<th>Borrar entradas</th></tr>';
if(isset($_GET['id']))
{
mysql_query('DELETE FROM blog_cats WHERE id=\''.$_GET['id'].'\'');
mysql_query('UPDATE blog_entry SET cat_id=\'1\' WHERE cat_id=\''.$_GET['id'].'\'');
echo '<tr>
		<td>La entrada se ha borrado con éxito.</td>
		</tr>
		<tr>
		<td><a href="admin.php?action=categories">Regresar al índice</a></td>
		</tr>';
}
else
{
echo 'No se especificó una categoría.';
}
echo '</tbody>
</table>';
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>