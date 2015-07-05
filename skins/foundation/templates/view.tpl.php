<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "74b5929a-6039-40c5-a85f-5349d1108d66", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php if (!empty($this->entries)): ?>
<div class="row">
<div class="large-12 columns">
<img src="<?php echo $this->eprint($this->entries['avatar']); ?>" alt="Avatar de <?php echo $this->eprint($this->entries['author']); ?>" title="Avatar de <?php echo $this->eprint($this->entries['author']); ?>" style="float:left;margin:10px;" /><div class="panel">
<a href="view.php?id=<?php echo $this->eprint($this->entries['entry_id']); ?>"><h4><?php echo $this->eprint($this->entries['title']); ?></h4></a>
<h6 class="subheader">Por: <a href="profile.php?id=<?php echo $this->eprint($this->entries['author_id']); ?>"><?php echo $this->eprint($this->entries['author']); ?></a> el día <?php echo $this->eprint($this->entries['date']); ?> en la categoría <a href="cat.php?id=<?php echo $this->eprint($this->entries['cat_id']); ?>"><?php echo $this->eprint($this->entries['category']); ?></a></h6>
</div>
</div>
</div>
<div class="row">
<div class="large-12 columns">
<p><?php echo $this->entries['entry_content']; ?></p>
</div>
</div>
<div class="row">
<div class="large-8 columns">
<ul class="breadcrumbs">
  <li><a href="">Permalink</a></li>
  <li><a href="#comments">Leer comentarios</a></li>
<li><a href="#write-comment">Escribir comentario</a></li>
	<?php if(($this->group)==1) : ?>
	<li><a href="admin.php?action=editentry&amp;entryid=<?php echo $this->eprint($this->entries['entry_id']); ?>">Editar entrada</a></li>
	<?php endif; ?>
  <li><a href="index.php">Regresar al índice</a></li>
</ul>
</div>
<div class="large-4 columns">
<span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_tumblr_large' displayText='Tumblr'></span>
<span class='st_reddit_large' displayText='Reddit'></span>
<span class='st_whatsapp_large' displayText='WhatsApp'></span>
<span class='st_email_large' displayText='Email'></span>
</div>
</div>
         <?php else: ?>
            
            <div data-alert class="alert-box alert">Ups, parece ser que la entrada no existe o ha sido borrada.</div>
            
        <?php endif; ?>
