<a id="comments"></a>
<div class="row">
<div class="large-12 columns">
<h5>Comentarios</h5>
</div>
</div>
<?php if (!empty($this->entries)): ?>
	<?php if (is_array($this->comments)): ?>
		<?php foreach ($this->comments as $key => $val): ?>
			<a id="comment-<?php echo $this->eprint($val['comment_id']); ?>"></a>
			<div class="row">
			  <div class="medium-1 columns"><img src="<?php echo $this->eprint($val['avatar']); ?>" alt="Avatar de <?php echo $this->eprint($val['author']); ?>" title="Avatar de <?php echo $this->eprint($val['author']); ?>" style="float:left; margin-left:10px; margin-right:10px; margin-top:35px;" /></div>
			  <div class="medium-11 columns">
			<?php if ($val['author_id'] == 0): ?>
			<h6 class="subheader">Por: <?php echo $this->eprint($val['author']); ?></a> el día <?php echo $this->eprint($val['date']); ?></h6>
			<?php else : ?>
			<h6 class="subheader">Por: <a href="profile.php?id=<?php echo $this->eprint($val['author_id']); ?>"><?php echo $this->eprint($val['author']); ?></a> el día <?php echo $this->eprint($val['date']); ?></h6>
			<?php endif; ?>
			<div data-alert class="alert-box panel callout radius" style="color:#000000;">
			<?php echo $this->eprint($val['comment_content']); ?>
			<?php if($this->group == 1) : ?>
			<a href="#" onclick="$:location.href='admin.php?action=deletecomment&amp;comment_id=<?php echo $this->eprint($val['comment_id']); ?>'" class="close">&times;</a>
			<?php endif; ?></div></div></div>
		<?php endforeach; ?>
	<?php else : ?>
	<div data-alert class="alert-box alert">Ups, parece ser que no hay comentarios... todavía.</div>
	<?php endif; ?>
<a id="write-comment"></a>
<form action="" method="POST">
<div class="row">
<div class="large-12 columns">
<h5>Escribir comentario</h5>
<?php if ($this->logged == 1): ?>
<input type="hidden" name="logueado" value="1">
<textarea name="comentario" placeholder="Deja tu comentario" style="height:200px"></textarea>
<?php else: ?>
<input type="hidden" name="logueado" value="0">
<input type="text" name="nickname" placeholder="Nombre (requerido)">
<input type="text" name="email" placeholder="Correo electrónico (requerido)">
<textarea name="comentario" placeholder="Deja tu comentario" style="height:200px"></textarea>
<?php endif; ?>
<input type="submit" value="Enviar comentario" class="button success">
</div>
</div>
</form>
<?php else: ?>
<?php endif; ?>