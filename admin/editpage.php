<?php
	if(isset($_POST['envia1']))
	{
	mysqli_query($con,'UPDATE blog_pages SET page=\''.$_POST['entrada'].'\',subject=\''.$_POST['subject'].'\' WHERE id=\''.$_GET['id'].'\'');
	$tpl->envia = 1;
	}
	else
	{
	$blog1 = mysqli_query($con,'SELECT * FROM blog_pages WHERE id=\''.$_GET['id'].'\'');
	$blog = mysqli_fetch_array($blog1);
	$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysqli_fetch_array($recprofile1);
	$editpage = array(
	'entry_id' => $blog['id'],
	'author_id' => $blog['author'],
        'author' => $recprofile['usuario'],
        'title' => $blog['subject'],
        'date' => date('F j, Y, H:i:s',$blog['date']),
        'content' => $blog['page']
    );
	}
$tpl->editpage = $editpage;
$tpl->display('skins/'.$config['skin'].'/templates/admin/editpage.tpl.php');
?>