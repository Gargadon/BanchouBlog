<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-7e6c322b-dba2-5740-1c15-f3b2de936596", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "ur-7e6c322b-dba2-5740-1c15-f3b2de936596", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
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
<?php echo $this->entries['entry_content']; ?>
</div>
</div>
<div class="row">
<div class="large-12 columns">
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-7e6c322b-dba2-5740-1c15-f3b2de936596", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "ur-7e6c322b-dba2-5740-1c15-f3b2de936596", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
<ul class="breadcrumbs">
  <li><a href="">Permalink</a></li>
  <li><a href="#comments">Leer comentarios</a></li>
<li><a href="#comments">Escribir comentario</a></li>
	<?php if(($this->group)==1) : ?>
	<li><a href="admin.php?action=editentry&amp;entryid=<?php echo $this->eprint($this->entries['entry_id']); ?>">Editar entrada</a></li>
	<?php endif; ?>
  <li><a href="index.php">Regresar al índice</a></li>
</ul>
</div></div>
<div class="row">
		<div class="large-12 columns">
<a id="comments"></a>
		    <div id="disqus_thread" class="large-12 columns"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        <?php echo "var disqus_shortname = '".$this->disqusname."'"; ?>; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	</div>
	</div>

        <?php else: ?>
            
            <div data-alert class="alert-box alert">Ups, parece ser que la entrada no existe o ha sido borrada.</div>
            
        <?php endif; ?>
 
