<table class="table small-12 large-12 columns">
<tbody>
    <?php if (is_array($this->entries)): ?>
    <?php foreach ($this->entries as $key => $val): ?>
<tr>
		<td style="vertical-align:top;"><img src="<?php echo $this->eprint($val['avatar']); ?>" alt="Avatar de <?php echo $this->eprint($val['author']); ?>" title="Avatar de <?php echo $this->eprint($val['author']); ?>" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th><a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>"><?php echo $this->eprint($val['title']); ?></a>
		</th>
		</tr>
		<tr>
		<td>
		Por: <strong>
		<a href="profile.php?id=<?php echo $this->eprint($val['author_id']); ?>"><?php echo $this->eprint($val['author']); ?></a>
		</strong> el día <?php echo $this->eprint($val['date']); ?> en la categoría <a href="cat.php?id=<?php echo $this->eprint($val['cat_id']); ?>"><?php echo $this->eprint($val['category']); ?></a>.
		</td>
		</tr>
		<tr>
		<td>
		<?php echo $val['entry_content']; ?>
		</td>
		<tr>
		<td>
		<a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>">Leer más</a> | <a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>#comments">Leer comentarios / Escribir comentario</a>
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
<a href="index.php?page=1"> &#171;Primero</a> | <a href="index.php?page=<?php echo $this->eprint($this->prevpage); ?>">&#60;-Anterior</a>
<?php endif; ?>
<?php if($this->page != 1 && $this->page != $this->lastpage) : ?>
 | 
<?php endif; ?>
<?php if($this->page != $this->lastpage) : ?>
<a href="index.php?page=<?php echo $this->eprint($this->nextpage); ?>"> Siguiente-&#62;</a> | <a href="index.php?page=<?php echo $this->eprint($this->lastpage); ?>">Último&#187;</a>
<?php endif; ?>

</td></tr></tbody>
</table>
