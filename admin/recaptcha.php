<?php
if(isset($_POST['envia']))
	{
	mysqli_query($con,'UPDATE blog_config SET recaptcha_activated=\''.$_POST['recaptcha_activated'].'\', recaptcha_key=\''.$_POST['recaptcha_key'].'\', recaptcha_secret=\''.$_POST['recaptcha_secret'].'\'');
	$tpl->envia ='yes';
	}
	else
	{
	$config_blog1 = mysqli_query($con,'SELECT recaptcha_activated, recaptcha_key, recaptcha_secret FROM blog_config');
	$config_blog = mysqli_fetch_array($config_blog1);
	$editconfig = array(
	'recaptcha_activated' => $config_blog['recaptcha_activated'],
	'recaptcha_key' => $config_blog['recaptcha_key'],
	'recaptcha_secret' => $config_blog['recaptcha_secret']
	);
	$tpl->editconfig = $editconfig;
	}
$tpl->display('skins/'.$config['skin'].'/templates/admin/recaptcha.tpl.php');
?>
