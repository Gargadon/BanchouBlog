<?php
if(isset($_GET['entryid']))
{
$tpl->entryid = $_GET['entryid'];
mysqli_query($con,'DELETE FROM blog_entry WHERE id=\''.$_GET['entryid'].'\'');
}

$tpl->display('skins/'.$config['skin'].'/templates/admin/deleteentry.tpl.php');
?>