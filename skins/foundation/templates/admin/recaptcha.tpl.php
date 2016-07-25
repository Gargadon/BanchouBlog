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
		<td><a href="admin.php?action=recaptcha">Regresar a administración</a></td>
		</tr>
		<tr>
		<td><a href="index.php">Regresar al índice</a></td>
		</tr>
		</tbody></table>
<?php else : ?>
<?php if (is_array($this->editconfig)): ?>
<form action="admin.php?action=recaptcha" method="POST">
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th colspan="2">reCAPTCHA</th>
</tr>
<tr>
<td>reCaptcha (<a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">Más info</a>): </td><td><select name="recaptcha_activated">
          <option value="<?php echo $this->eprint($this->editconfig['recaptcha_activated']); ?>" selected>No cambiar</option>
		  <option value="0">Desactivar</option>
		  <option value="1">Activar</option>
	  </select>
	  </td>
</tr>
<tr>
<td>Clave pública: </td><td><input type="text" name="recaptcha_key" value="<?php echo $this->eprint($this->editconfig['recaptcha_key']); ?>" /></td>
</tr>
<tr>
<td>Clave secreta: </td><td><input type="text" name="recaptcha_secret" value="<?php echo $this->eprint($this->editconfig['recaptcha_secret']); ?>" /></td>
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
