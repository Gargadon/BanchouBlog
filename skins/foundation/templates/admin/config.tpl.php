<?php if (isset($this->envia)) : ?>
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th>Configuración del blog</th>
</tr>
<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="admin.php?action=config">Regresar a administración</a></td>
		</tr>
		<tr>
		<td><a href="index.php">Regresar al índice</a></td>
		</tr>
		</tbody></table>
<?php else : ?>
<?php if (is_array($this->editconfig)): ?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<form action="admin.php?action=config" method="POST">
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th colspan="2">Configuración del blog</th>
</tr>
<tr>
<td>Nombre del blog: </td><td><input type="text" name="blogname" value="<?php echo $this->eprint($this->editconfig['name']); ?>" /></td>
</tr>
<tr>
<td>Dirección del blog: </td><td><input type="text" name="pathto" value="<?php echo $this->eprint($this->editconfig['complete_url']); ?>" /></td>
</tr>
<tr>
<td>Descripción: </td><td><input type="text" name="description" value="<?php echo $this->eprint($this->editconfig['description']); ?>" /></td>
</tr>
<tr>
<td>Palabras clave: </td><td><input type="text" name="keywords" value="<?php echo $this->eprint($this->editconfig['keywords']); ?>" /></td>
</tr>
<tr>
<td>Skin: </td><td><input type="text" name="skin" value="<?php echo $this->eprint($this->editconfig['skin']); ?>" /></td>
</tr>
<tr>
<td>Favicon: </td><td><input type="text" name="favicon" value="<?php echo $this->eprint($this->editconfig['favicon']); ?>" /></td>
</tr>
<tr>
<td>Footer: </td><td><textarea id="editor1" name="footer"><?php echo $this->editconfig['footer']; ?></textarea></td>
</tr>
<tr>
<td>Zona horaria (<a href="http://php.net/manual/en/timezones.php" target="_blank">Más info</a>): </td><td><input type="text" name="zona" value="<?php echo $this->eprint($this->editconfig['timezone']); ?>" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" class="button success" value="Guardar cambios" /> <input type="reset" class="button secondary" value="Restablecer" /></td>
</tr>
</tbody>
</table>
<input type="hidden" name="envia" value="yes" />
</form>
<script type="text/javascript">
			CKEDITOR.replace( 'editor1' );
		</script>
<?php endif; ?>
<?php endif; ?>
