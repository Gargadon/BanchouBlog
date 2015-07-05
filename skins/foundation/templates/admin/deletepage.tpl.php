<table>
		<tbody>
		<tr>
		<th>Configuración del blog</th></tr>
<?php if($this->deletepage == 1) : ?>
		<tr>
		<td>La página se ha borrado con éxito.</td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar al índice</a></td>
		</tr>
<?php else : ?>
		<tr>
		<td>
		No se especificó una página.
		</td>
		</tr>
<?php endif; ?>
		</tbody>
</table>