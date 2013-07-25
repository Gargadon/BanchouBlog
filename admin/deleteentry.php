<?php
if(defined('dwogame'))
{
echo '<table>
		<tbody>
		<tr>
		<th>Configuración del blog</th></tr>';
if(isset($_GET['entryid']))
{
mysql_query('DELETE FROM blog_entry WHERE id=\''.$_GET['entryid'].'\'');
echo '<tr>
		<td>La entrada se ha borrado con éxito.</td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar al índice</a></td>
		</tr>';
}
else
{
echo 'No se especificó un tema.';
}
echo '</tbody>
</table>';
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>