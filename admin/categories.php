<?php

	if(isset($_POST['envia1']))
	{
	mysqli_query($con,'INSERT blog_cats (name,description) VALUES (\''.$_POST['name'].'\', \''.$_POST['description'].'\')');
	$tpl->envia ='yes';
	}
$tpl->display('skins/'.$config['skin'].'/templates/admin/categories.tpl.php');
?>