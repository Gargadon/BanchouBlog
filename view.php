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
$blog1 = mysqli_query($con,'SELECT * FROM blog_entry WHERE id=\''.$entryid.'\'');
if(mysqli_num_rows($blog1) != 0)
{
	$blog = mysqli_fetch_array($blog1);
	$categories1=mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
	$categories=mysqli_fetch_array($categories1);
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
	'entry_content' => $blog['entry']
    );
// Assign values to the Savant instance.
$tpl->title = $name;
$tpl->entries = $viewentries;
$tpl->disqusname = $config['disqusname'];
}
// Display a template using the assigned values.
$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/view.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?>