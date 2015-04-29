<?php if (isset($this->envia)) : ?>
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th>Crear categorías</th>
</tr>
<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar a administración</a></td>
		</tr>
		<tr>
		<td><a href="index.php">Regresar al índice</a></td>
		</tr>
		</tbody></table>
<?php else : ?>
<form action="admin.php?action=categories" method="POST">
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th colspan="2">Crear categorías</th>
</tr>
<tr>
<td>Nombre de la categoría: </td><td><input type="text" name="name" /></td>
</tr>
<tr>
<td>Descripción: </td><td><input type="text" name="description" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="button success" value="Guardar cambios" /> <input type="reset" class="button secondary" value="Restablecer" /></td>
</tr>
</tbody>
</table>
<input type="hidden" name="envia1" value="yes" />
</form>
<?php endif; ?> 
