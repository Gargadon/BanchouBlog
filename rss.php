<?php
	header('Content-Type: text/xml; charset=UTF-8');
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
	require('base.php');
	require('db.php');
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	$rss = array(
	'name' => $config['name'],
	'path' => $config['pathto'],
	'description' => $config['description'],
	'lang' => $config['lang']
	);
$blog1 = mysqli_query($con,'SELECT * FROM blog_entry ORDER by `id` DESC');
$contador = 1;
while($blog = mysqli_fetch_array($blog1)){
  $recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
  $recprofile = mysqli_fetch_array($recprofile1);
  $viewrss[$contador] = array(
	  'entry_id' => $blog['id'],
	  'author' => $recprofile['usuario'],
	  'title' => $blog['subject'],
	  'date' => date('F j, Y, H:i:s',$blog['date']),
	  'cat_id' => $blog['cat_id'],
	  'entry_content' => substr($blog['entry'],0,300).'...'
      );
  $contador++;
}
$tpl->rss = $rss;
$tpl->viewrss = $viewrss;
$tpl->display('skins/'.$config['skin'].'/templates/rss.tpl.php');
?> 
