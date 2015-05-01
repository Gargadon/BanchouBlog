<?php
if(isset($_POST['envia']))
	{
	mysqli_query($con,'UPDATE blog_config SET name=\''.$_POST['blogname'].'\', pathto=\''.$_POST['pathto'].'\', disqusname=\''.$_POST['disqusname'].'\', footer=\''.$_POST['footer'].'\', zona=\''.$_POST['zona'].'\', skin=\''.$_POST['skin'].'\', description=\''.$_POST['description'].'\'');
	$tpl->envia ='yes';
	}
	else
	{
	$config_blog1 = mysqli_query($con,'SELECT * FROM blog_config');
	$config_blog = mysqli_fetch_array($config_blog1);
	$editconfig = array(
	'name' => $config_blog['name'],
	'disqusname' => $config_blog['disqusname'],
	'complete_url' => $config_blog['pathto'],
	'timezone' => $config_blog['zona'],
	'footer' => $config_blog['footer'],
	'skin' => $config_blog['skin'],
	'description' => $config_blog['description']
	);
	$tpl->editconfig = $editconfig;
	}
$tpl->display('skins/'.$config['skin'].'/templates/admin/config.tpl.php');
?>