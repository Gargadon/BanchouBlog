<?php
error_reporting(E_ALL ^ E_NOTICE);
	require("base.php");
	require("db.php");
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	include("navbar.php");
	
// Create a title.
$entryid = $_GET['id'];
$blog1 = mysqli_query($con,'SELECT * FROM blog_pages WHERE id=\''.$entryid.'\'');
if(mysqli_num_rows($blog1) != 0)
{
	$blog = mysqli_fetch_array($blog1);
	$name = $blog['subject'];

 //This is where you display your query results

$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
$recprofile = mysqli_fetch_array($recprofile1);
$categories1=mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
$categories=mysqli_fetch_array($categories1);
// Generate an array of book authors and titles.
$viewentries = array(
	'entry_id' => $blog['id'],
	'author_id' => $blog['author'],
        'author' => $recprofile['usuario'],
        'title' => $blog['subject'],
        'avatar' => 'http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm',
        'date' => date('F j, Y, H:i:s',$blog['date']),
        'cat_id' => $blog['cat_id'],
	'category' => $categories['name'],
	'entry_content' => $blog['page']
    );
    //Postea el comentario antes de mostrar todos los comentarios
    
if(isset($_POST['logueado']))
{
if($_POST['logueado']==1)
	{
	$author = $usuarios['id'];
	$fecha = time();
	$comentario = $_POST['comentario'];
	if(trim($comentario) != false)
	mysqli_query($con,'INSERT blog_comments (entry_id, date, type, is_guest, author_id, comment) VALUES (\''.$entryid.'\',\''.$fecha.'\',\'page\',\'0\',\''.$author.'\',\''.$_POST['comentario'].'\')');
	}

elseif($_POST['logueado']==0)
	{
	$author = $_POST['nickname'];
	$email_author = $_POST['email'];
	$fecha = time();
	$comentario = $_POST['comentario'];
	if((trim($author) != false) || (trim($email_author) != false) || (trim($comentario) != false))
	mysqli_query($con,'INSERT blog_comments (entry_id, date, type, is_guest, guest_name, guest_email, comment) VALUES (\''.$entryid.'\',\''.$fecha.'\',\'page\',\'1\',\''.$author.'\',\''.$email_author.'\',\''.$_POST['comentario'].'\')');
	}
}
    
    // Vamos por los comentarios 
    $comments1 = mysqli_query($con,'SELECT * FROM blog_comments WHERE entry_id=\''.$entryid.'\' AND type=\'page\' ORDER BY id ASC');
    if(mysqli_num_rows($comments1) != 0)
	{
		$contador = 1;
	while($comments = mysqli_fetch_array($comments1)) 
		{
		if($comments['is_guest'] != 0)
		{

		$viewcomments[$contador] = array(
			'comment_id' => $comments['id'],
			'author_id' => 0,
			'author' => $comments['guest_name'],
			'avatar' => 'http://www.gravatar.com/avatar/'.md5($comments['guest_email']).'?s=80&amp;r=pg&amp;d=mm',
			'date' => date('F j, Y, H:i:s',$comments['date']),
			'comment_content' => $comments['comment']
			);
		}
	else
		{
		$comprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$comments['author_id'].'\'');
		$comprofile = mysqli_fetch_array($comprofile1);
		$viewcomments[$contador] = array(
			'comment_id' => $comments['id'],
			'author_id' => $comments['author_id'],
			'author' => $comprofile['usuario'],
			'avatar' => 'http://www.gravatar.com/avatar/'.md5($comprofile['email']).'?s=80&amp;r=pg&amp;d=mm',
			'date' => date('F j, Y, H:i:s',$comments['date']),
			'comment_content' => $comments['comment']
			);
		}
		$contador++;
		}
	
	}
// Assign values to the Savant instance.
$tpl->title = $name;
$tpl->entries = $viewentries;
$tpl->comments = $viewcomments;
}
// Display a template using the assigned values.
$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/pages.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/comments.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?>