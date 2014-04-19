<?php
if(defined('dwogame'))
{
echo '<table>
		<tbody>
		<tr>
		<th>'.__('Configuración del blog').'</th></tr>';
if(isset($_GET['id']))
{
mysql_query('DELETE FROM blog_pages WHERE id=\''.$_GET['id'].'\'');
echo '<tr>
		<td>'.__('La página se ha borrado con éxito.').'</td>
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