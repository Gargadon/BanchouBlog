<?php
header('Content-Type: text/xml; charset=UTF-8');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
require('/home/gargrire/public_html/gargablog/base.php');
echo '<?xml version="1.0" encoding="utf-8"?>'; 
$blog1 = mysql_query('SELECT * FROM blog_entry ORDER by `id` DESC');
echo '<rss version="2.0"> 
<channel> 
    <title>GargaBlog</title> 
    <link>http://www.gargadon.info/gargablog/</link> 
    <language>es-MX</language> 
    <description>GargaBlog is a simple blog written in PHP.</description> 
    <generator>Gargadon</generator>';
while($blog = mysql_fetch_array($blog1)){
    $descripcion=substr($blog['entry'],0,300).'...';
    echo '<item> 
<title>'.$blog['subject'].'</title> 
<link>http://www.gargadon.info/gargablog/index.php?entryid='.$blog['id'].'</link> 
<comments>http://www.gargadon.info/gargablog/index.php?entryid='.$blog['id'].'#comments</comments> 
<pubDate>'.date('F j, Y, H:i:s',$blog['date']).'</pubDate> 
<description>
<![CDATA[
'.$descripcion.'
]]></description> 
</item>';
}
echo '</channel></rss>'; 
?>