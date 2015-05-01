<?php if (isset($this->envia)) : ?>
		<table  class="table small-12 large-12 columns">
		<tbody>
		<tr>
		<th>Configuración del blog</th>
		</tr>
		<tr>
		<td>
		Los cambios se han realizado correctamente.
		</td>
		</tr>
		<tr>
		<td>
		<a href="view.php?id=<?php echo $_GET['id']; ?>">Ver entrada</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="admin.php">Regresar a la administración</a>
		</td>
		</tr>
		</tbody>
		</table>
<?php else : ?>
    <table class="table small-12 large-12 columns">
		<tbody>
		<tr><th colspan="2">Entradas más recientes</th></tr>
    <?php if (is_array($this->entries)): ?>
    <?php foreach ($this->entries as $key => $val): ?>
<tr>
		<td width="80px"><img src="<?php echo $this->eprint($val['avatar']); ?>" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><td>
		<strong><a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>"><?php echo $this->eprint($val['title']); ?></a></strong>
		</td>
		</tr>
		<tr>
		<td>
		Por: <strong><a href="profile.php?id=<?php echo $this->eprint($val['author_id']); ?>"><?php echo $this->eprint($val['author']); ?></a></strong> el día <?php echo $this->eprint($val['date']); ?>.
		</td>
		</tr>
		<td>
		<a href="admin.php?action=editentry&entryid=<?php echo $this->eprint($val['entry_id']); ?>">Editar entrada</a> | <a href="admin.php?action=deleteentry&entryid=<?php echo $this->eprint($val['entry_id']); ?>" onclick="return confirm('¿Está seguro de querrer borrar esta entrada?');">Borrar entrada</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>
                  <?php endforeach; ?>
        <?php else: ?>
            
            <div data-alert class="alert-box alert">Esto está muy vacío. Dile al autor que escriba algo.</div>
            
        <?php endif; ?>
 
</table>
<table class="table small-12 large-12 columns"><tbody><tr><td>Mostrando página <?php echo $this->eprint($this->page); ?> de <?php echo $this->eprint($this->lastpage); ?></td></tr>
<tr><td>
<?php if($this->page != 1) : ?>
<a href="admin.php?action=viewentries&page=1"> &#171;Primero</a> | <a href="admin.php?action=viewentries&page=<?php echo $this->eprint($this->prevpage); ?>">&#60;-Anterior</a>
<?php endif; ?>
<?php if($this->page != 1 && $this->page != $this->lastpage) : ?>
 | 
<?php endif; ?>
<?php if($this->page != $this->lastpage) : ?>
<a href="admin.php?action=viewentries&page=<?php echo $this->eprint($this->nextpage); ?>"> Siguiente-&#62;</a> | <a href="admin.php?action=viewentries&page=<?php echo $this->eprint($this->lastpage); ?>">Último&#187;</a>
<?php endif; ?>
<?php endif; ?>

</td></tr></tbody>
</table>