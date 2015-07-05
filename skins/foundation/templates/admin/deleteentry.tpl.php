<table>
		<tbody>
		<tr>
		<th>Configuración del blog</th></tr>
<?php if (isset($this->entryid)) : ?>
<tr>
		<td>La entrada se ha borrado con éxito.</td>
		</tr>
<?php else : ?>
<tr>
		<td>No se especificó un tema para borrar.</td>
		</tr>
<?php endif; ?>
		<tr>
		<td><a href="admin.php">Regresar a la administración</a></td>
		</tr>
		</tbody>
</table>