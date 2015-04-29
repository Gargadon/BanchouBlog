<?php if (isset($this->envia)) : ?>
<table class="table small-12 large-12 columns">
<tbody>
<tr>
<th>Páginas</th>
</tr>
<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="pages.php?id=<?php echo $this->eprint($this->newpage); ?>">Ver página</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar a la administración</a></td>
		</tr>
		</tbody></table>
<?php else : ?>
<form action="admin.php?action=pages" method="POST">
                
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                
		<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th colspan="2">Nueva página</th>
		</tr>
		<tr>
		<td>
		Tema:
		</td>
		<td>
		<input type="text" name="subject" size="100" />
		</td>
		</tr>
		<tr>
		<td colspan="2">Contenido de la página:
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
		</td>
		</tr>
		<tr>
		<td colspan="2" class="notes">
		<a href="admin.php">Regresar al menú</a>
		</td>
		</tr>
		</tbody>
		</table>
		<input type="hidden" name="envia1" value="1" />
		</form>
	<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th colspan="2">Páginas más recientes</th></tr>
    <?php if (is_array($this->pages)): ?>
    <?php foreach ($this->pages as $key => $val): ?>
		<tr>
		<td width="80px"><img src="<?php echo $this->eprint($val['avatar']); ?>" alt="Avatar de <?php echo $this->eprint($val['author']); ?>" title="Avatar de <?php echo $this->eprint($val['author']); ?>" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><td>
		<strong><a href="pages.php?id=<?php echo $this->eprint($val['entry_id']); ?>"> <?php echo $this->eprint($val['title']); ?></a></strong>
		</td>
		</tr>
		<tr>
		<td>
		Por: <strong><a href="profile.php?id=<?php echo $this->eprint($val['author_id']); ?>"> <?php echo $this->eprint($val['author']); ?></a></strong> el  <?php echo $this->eprint($val['date']); ?>.
		</td>
		</tr>
		<td>
		<a href="admin.php?action=editpage&id=<?php echo $this->eprint($val['entry_id']); ?>">Editar página</a> | <a href="admin.php?action=deletepage&id=<?php echo $this->eprint($val['entry_id']); ?>" onclick="return confirm('¿Está seguro de querer borrar esta página?');">Borrar página</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>
   <?php endforeach; ?>
   <?php endif; ?>
		<table class="table small-12 large-12 columns"><tbody><tr><td>Mostrando página <?php echo $this->eprint($this->page); ?> de <?php echo $this->eprint($this->lastpage); ?></td></tr>
<tr><td>
<?php if($this->page != 1) : ?>
<a href="admin.php?action=pages&amp;page=1"> &#171;Primero</a> | <a href="admin.php?action=pages&amp;page=<?php echo $this->eprint($this->prevpage); ?>">&#60;-Anterior</a>
<?php endif; ?>
<?php if($this->page != 1 && $this->page != $this->lastpage) : ?>
 | 
<?php endif; ?>
<?php if($this->page != $this->lastpage) : ?>
<a href="admin.php?action=pages&amp;page=<?php echo $this->eprint($this->nextpage); ?>"> Siguiente-&#62;</a> | <a href="admin.php?action=pages&amp;page=<?php echo $this->eprint($this->lastpage); ?>">Último&#187;</a>
<?php endif; ?>
<?php endif; ?> 
</td></tr></tbody>
</table>