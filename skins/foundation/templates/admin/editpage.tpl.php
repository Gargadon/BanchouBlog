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
		<td><a href="pages.php?id=<?php echo $_GET['id']; ?>">Ver página</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar a la administración</a></td>
		</tr>
<?php else : ?>
<?php if (is_array($this->editpage)): ?>
<tr>
		<td>       
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                
<form action="admin.php?action=editpage&id=<?php echo $this->eprint($this->editpage['entry_id']); ?>" method="POST">
		<strong>Editar página:
		</strong></td>
		</tr>
		<tr>
		<td>Por: <strong><a href="profile.php?id=<?php echo $this->eprint($this->editpage['author_id']); ?>"><?php echo $this->eprint($this->editpage['author']); ?></a></strong>
		</td>
		</tr>
		<tr>
		<td>Tema: <input type="text" name="subject" value="<?php echo $this->eprint($this->editpage['title']); ?>" />
		</td>
		</tr>
		<tr>
		<td>
		<textarea id="editor1" name="entrada" style="width:100%;height:150px;"><?php echo $this->editpage['content']; ?></textarea>
		<script type="text/javascript">
			CKEDITOR.replace( 'editor1', {
			'filebrowserImageUploadUrl': 'ckeditor/plugins/imgupload/imgupload.php'
			});
		</script>
		<input type="hidden" name="envia1" value="yes" />
		</form>
		</td>
		</tr>
<?php endif; ?> 
<?php endif; ?> 
</td></tr></tbody>
</table>