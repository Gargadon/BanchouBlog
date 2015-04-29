<?php
if(defined('dwogame'))
{
echo '<table>
		<tbody>
		<tr>
		<th>'.__('Configuración del blog').'</th></tr>';
if(isset($_GET['entryid']))
{
mysqli_query($con,'DELETE FROM blog_entry WHERE id=\''.$_GET['entryid'].'\'');
echo '<tr>
		<td>'.__('La entrada se ha borrado con éxito.').'</td>
		</tr>
		<tr>
		<td><a href="admin.php">'.__('Regresar al índice').'</a></td>
		</tr>';
}
else
{
echo __('No se especificó un tema.');
}
echo '</tbody>
</table>';
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>