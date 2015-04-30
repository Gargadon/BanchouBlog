<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th>Configuración del blog</th>
		</tr>
	<?php if (isset($this->envia)) : ?>
		<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="view.php?id=<?php echo $this->eprint($this->entryid); ?>">Ver tema</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar a la administración</a></td>
		</tr>
	<?php else : ?>
	<?php if (is_array($this->editentry)): ?>
		<tr>
		<td>       
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<form action="admin.php?action=editentry&entryid=<?php echo $this->eprint($this->editentry['entry_id']); ?>" method="POST">
		<strong>Editar entrada:
		</strong></td>
		</tr>
		<tr>
		<td>Por: <strong><a href="profile.php?id=<?php echo $this->eprint($this->editentry['author_id']); ?>"><?php echo $this->eprint($this->editentry['author']); ?></a></strong>
		</td>
		</tr>
		<tr>
		<td>Tema: <input type="text" name="subject" value="<?php echo $this->eprint($this->editentry['title']); ?>" />
		</td>
		</tr>
		<tr>
		<td>
		<textarea id="editor1" name="entrada" style="width:100%;height:150px;"><?php echo $this->editentry['content']; ?></textarea>
		<script type="text/javascript">
			CKEDITOR.replace( 'editor1', {
			'filebrowserImageUploadUrl': 'ckeditor/plugins/imgupload/imgupload.php'
			});
		</script>
		Categoría: <select name="category"><option value="<?php echo $this->eprint($this->editentry['cat_id']); ?>'">No cambiar (<?php echo $this->eprint($this->editentry['cat_name']); ?>)</option>
		<?php for($i=1; $i<=($this->contador); $i++) { ?>
		<option value="<?php echo $this->eprint($this->cat_id[$i]); ?>"><?php echo $this->eprint($this->cat_name[$i]); ?></option>
		<?php } ?>)
		</select>
		<input type="hidden" name="envia" value="yes" />
		</form>
		</td>
		</tr>
	<?php endif; ?>
	<?php endif; ?>
	</tbody>
		</table>
		