<?php echo "<?xml version=\"1.0\" encoding= \"UTF-8\"?>"; ?>
<rss version="2.0">
<channel>
    <title><?php echo $this->eprint($this->rss['name']); ?></title> 
    <link><?php echo $this->eprint($this->rss['path']); ?></link> 
    <language><?php echo $this->eprint($this->rss['lang']); ?></language> 
    <description><?php echo $this->eprint($this->rss['description']); ?></description> 
    <generator>Gargadon</generator>
    <?php if (is_array($this->viewrss)): ?>
    <?php foreach ($this->viewrss as $key => $val): ?>
    <item> 
    <title><?php echo $this->eprint($val['title']); ?></title> 
    <link><?php echo $this->eprint($this->rss['path']); ?>view.php?id=<?php echo $this->eprint($val['entry_id']); ?></link> 
    <comments><?php echo $this->eprint($this->rss['path']); ?>view.php?id=<?php echo $this->eprint($val['entry_id']); ?>#comments</comments> 
    <pubDate><?php echo $this->eprint($val['date']); ?></pubDate> 
    <description>
    <![CDATA[
    <?php echo $val['entry_content']; ?>
    ]]></description> 
    </item>
<?php endforeach; ?>
<?php endif; ?>
</channel></rss>