<?php
if(isset($_GET['id']))
{
mysqli_query($con,'DELETE FROM blog_pages WHERE id=\''.$_GET['id'].'\'');
$tpl->deletepage = 1;
}
else
{
$tpl->deletepage = 0;
}
$tpl->display('skins/'.$config['skin'].'/templates/admin/deletepage.tpl.php');
?>