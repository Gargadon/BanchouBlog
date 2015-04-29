<?php
if($_POST['envia1']==1)
	{
	$tpl->envia = 'yes';
	$author = $usuarios['id'];
	$fecha = time();
	$subject = $_POST['subject'];
	$entry = $_POST['content'];
	$envia = $_POST['envia'];
	mysqli_query($con,'INSERT blog_entry (author, date, subject, entry, cat_id) VALUES (\''.$author.'\',\''.$fecha.'\',\''.$subject.'\',\''.$entry.'\',\''.$_POST['category'].'\')');
	$searchentry=mysqli_fetch_array(mysqli_query($con,'SELECT id FROM blog_entry WHERE date=\''.$fecha.'\''));
	$tpl->entryid = $searchentry['id'];
	}
else {
	$blog_cats1 = mysqli_query($con,'SELECT * FROM blog_cats ORDER BY id ASC');
	$contador = 1;
	while($blog_cats = mysqli_fetch_array($blog_cats1))
	{
		$viewcats[$contador] = array(
		'id' => $blog_cats['id'],
		'name' => $blog_cats['name']
	    );
	$contador++;

	}
$tpl->viewcats = $viewcats;	
}

$tpl->display('skins/'.$config['skin'].'/templates/admin/newentry.tpl.php');
?>