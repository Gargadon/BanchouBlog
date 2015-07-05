    <?php if (is_array($this->entries)): ?>
    <?php foreach ($this->entries as $key => $val): ?>
<div class="row">
<div class="large-12 columns">
<img src="<?php echo $this->eprint($val['avatar']); ?>" alt="Avatar de <?php echo $this->eprint($val['author']); ?>" title="Avatar de <?php echo $this->eprint($val['author']); ?>" style="float:left;margin:10px;" />
<div class="panel">
<a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>"><h4><?php echo $this->eprint($val['title']); ?></h4></a>
<h6 class="subheader">Por: <a href="profile.php?id=<?php echo $this->eprint($val['author_id']); ?>"><?php echo $this->eprint($val['author']); ?></a> el día <?php echo $this->eprint($val['date']); ?> en la categoría <a href="cat.php?id=<?php echo $this->eprint($val['cat_id']); ?>"><?php echo $this->eprint($val['category']); ?></a></h6>
</div>
</div>
</div>
<div class="row">
<div class="large-12 columns">
<p><?php echo $val['entry_content']; ?></p>
</div>
</div>
<div class="row">
<div class="large-12 columns">
<ul class="breadcrumbs">
<li><a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>">Leer más</a></li>
<li><a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>#comments">Leer comentarios</a></li>
<li><a href="view.php?id=<?php echo $this->eprint($val['entry_id']); ?>#write-comment">Escribir comentario</a></li>
</ul>
</div>
</div>
                  <?php endforeach; ?>
        <?php else: ?>
            
            <div data-alert class="alert-box alert">Esto está muy vacío. Dile al autor que escriba algo.</div>
            
        <?php endif; ?>
 
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
