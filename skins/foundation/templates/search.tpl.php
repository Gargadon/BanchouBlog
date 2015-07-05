<?php if ($this->trimmed == "") : ?>
  <div data-alert class="alert-box alert">Búsqueda inválida.</div> 
<?php endif; ?>
<br /><br /><table class="table table-bordered table-hover">
<tbody>
<tr>
<th colspan="2">Resultados</th></tr>
<tr><td colspan="2" style="text-align:left">Su búsqueda fue: &quot;<?php echo($this->eprint($this->search)); ?>&quot;</td></tr>
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
        </tbody></table>
        <?php if($this->moreresults == 1) : ?>
	&nbsp;<a href="search.php?&amp;s=<?php echo $this->eprint($this->prevs); ?>&amp;q=<?php echo $this->eprint($this->search); ?>">&lt;&lt; 
  Anteriores <?php echo $this->eprint($this->limit); ?></a>&nbsp;&nbsp;
        <?php endif; ?>
        <?php if($this->lastpage == 0) : ?>
          &nbsp;<a href="search.php?&amp;s=<?php echo $this->eprint($this->news); ?>&amp;q=<?php echo $this->eprint($this->search); ?>">Próximos <?php echo $this->eprint($this->limit); ?> &gt;&gt;</a>
        <?php endif; ?>
          
        <p>Mostrando resultados <?php echo $this->eprint($this->b); ?> a <?php echo $this->eprint($this->a); ?> de <?php echo $this->eprint($this->numrows); ?></p>