<?php
require('base.php');
require('db.php');
$config1 = mysql_query('SELECT * FROM blog_config');
$config = mysql_fetch_array($config1);
date_default_timezone_set(''.$config['zona'].'');
function send_error($msg) {
header ('Content-type: text/xml');
print '<?xml version="1.0" encoding="utf-8"?>';
print '<response><error>1</error><message>'.$msg.'</message></response>';
exit;
}
if (!$_GET['id']) {send_error("TrackBack ID missing");}

if (!$_POST['url']) {send_error("URL missing"); }

if (!$_POST['title']) {send_error("Title missing");}

if (!$_POST['excerpt']) {send_error("Body missing");}

if (!$_POST['blog_name']) {send_error("Blog name missing");}

// SAVE DATA INTO YOUR COMMENT SECTION HERE

header ('Content-type: text/xml');
print '<?xml version="1.0" encoding="utf-8"?>';
print "<response><error>0</error></response>";
$ahora = time();
mysql_query('INSERT INTO blog_trackback (post_id,url,title,content,blog_name,date) VALUES (\''.$_GET['id'].'\',\''.$_POST['url'].'\',\''.$_POST['title'].'\',\''.$_POST['excerpt'].'\',\''.$_POST['blog_name'].'\',\''.$ahora.'\')') or die('Ha fallado la conexión: '.mysql_error());
exit;
//}
?>