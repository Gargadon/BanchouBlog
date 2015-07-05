<?php
	if(isset($_POST['envia']))
	{
	$tpl->envia = 'yes';
	mysqli_query($con,'UPDATE blog_entry SET entry=\''.$_POST['entrada'].'\',subject=\''.$_POST['subject'].'\', cat_id=\''.$_POST['category'].'\' WHERE id=\''.$_GET['entryid'].'\'');
	$tpl->entryid = $_GET['entryid'];
	}
	else
	{
	$blog1 = mysqli_query($con,'SELECT * FROM blog_entry WHERE id=\''.$_GET['entryid'].'\'');
	$blog = mysqli_fetch_array($blog1);
	$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysqli_fetch_array($recprofile1);	
	$blog_cats1 = mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
	$blog_cats = mysqli_fetch_array($blog_cats1);
	$editentry = array(
	'entry_id' => $blog['id'],
	'author_id' => $blog['author'],
        'author' => $recprofile['usuario'],
        'title' => $blog['subject'],
        'date' => date('F j, Y, H:i:s',$blog['date']),
        'content' => $blog['entry'],
        'cat_id' => $blog['cat_id'],
        'cat_name' => $blog_cats['name']
    );

		unset($blog_cats1);
		unset($blog_cats);
		$blog_cats1 = mysqli_query($con,'SELECT * FROM blog_cats ORDER BY id ASC');
 		$contador = 1;
		while($blog_cats = mysqli_fetch_array($blog_cats1))
		{
		$tpl->contador = $contador;
	      $cat_id[$contador] = $blog_cats['id'];
	      $cat_name[$contador] = $blog_cats['name'];
	    
	    $contador++;
		}
	$tpl->cat_id = $cat_id;
	$tpl->cat_name = $cat_name;
	}
$tpl->editentry = $editentry;
$tpl->display('skins/'.$config['skin'].'/templates/admin/editentry.tpl.php');
?>
