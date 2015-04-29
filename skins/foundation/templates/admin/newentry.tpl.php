<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th colspan="2">Nueva entrada</th>
		</tr>
<?php if (isset($this->envia)) : ?>
<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="index.php?entryid='.$searchentry['id'].'">Ver tema</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar a la administración</a></td>
		</tr>
<?php else : ?>
<form action="admin.php?action=newentry" method="POST">
                
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                
		<tr>
		<td>
		Tema:
		</td>
		<td>
		<input type="text" name="subject" size="100" />
		</td>
		</tr>
		<tr>
		<td colspan="2">Contenido de la entrada:
		</td>
		</tr>
		<tr>
		<td colspan="2">
		<textarea id="editor1" name="content" style="width:100%;height:150px;"></textarea>
		<script type="text/javascript">
			CKEDITOR.replace( 'editor1', {
			'filebrowserImageUploadUrl': 'ckeditor/plugins/imgupload/imgupload.php'
			});
		</script>
		Categoría: <select name="category"> 
<?php if (is_array($this->viewcats)): ?>
<?php foreach ($this->viewcats as $key => $val): ?>
		<option value="<?php echo $this->eprint($val['id']); ?>"><?php echo $this->eprint($val['name']); ?></option>
<?php endforeach; ?>
<?php endif; ?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan="2" class="notes">
		<a href="admin.php">Regresar a la administración</a>
		</td>
		</tr>
		</tbody>
		</table>
		<input type="hidden" name="envia1" value="1" />
		</form>
<?php endif; ?> 
</td></tr></tbody>
</table>