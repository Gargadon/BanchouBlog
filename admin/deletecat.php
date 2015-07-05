<?php
if(defined('dwogame'))
{
echo '<table>
		<tbody>
		<tr>
		<th>'.__('Borrar categorías').'</th></tr>';
if(isset($_GET['id']))
{
mysqli_query($con,'DELETE FROM blog_cats WHERE id=\''.$_GET['id'].'\'');
mysqli_query($con,'UPDATE blog_entry SET cat_id=\'1\' WHERE cat_id=\''.$_GET['id'].'\'');
echo '<tr>
		<td>'.__('La categoría se ha borrado con éxito.').'</td>
		</tr>
		<tr>
		<td><a href="admin.php?action=categories">'.__('Regresar al índice').'</a></td>
		</tr>';
}
else
{
echo __('No se especificó una categoría.');
}
echo '</tbody>
</table>';
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>