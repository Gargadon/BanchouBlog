<?php
if(isset($_POST['envia']))
	{
	mysqli_query($con,'UPDATE blog_config SET name=\''.$_POST['blogname'].'\', pathto=\''.$_POST['pathto'].'\', footer=\''.$_POST['footer'].'\', zona=\''.$_POST['zona'].'\', skin=\''.$_POST['skin'].'\', favicon=\''.$_POST['favicon'].'\', keywords=\''.$_POST['keywords'].'\', description=\''.$_POST['description'].'\'');
	$tpl->envia ='yes';
	}
	else
	{
	$config_blog1 = mysqli_query($con,'SELECT * FROM blog_config');
	$config_blog = mysqli_fetch_array($config_blog1);
	$editconfig = array(
	'name' => $config_blog['name'],
	'complete_url' => $config_blog['pathto'],
	'timezone' => $config_blog['zona'],
	'footer' => $config_blog['footer'],
	'skin' => $config_blog['skin'],
	'favicon' => $config_blog['favicon'],
	'description' => $config_blog['description'],
	'keywords' => $config_blog['keywords']
	);
	$tpl->editconfig = $editconfig;
	}
$tpl->display('skins/'.$config['skin'].'/templates/admin/config.tpl.php');
?>
