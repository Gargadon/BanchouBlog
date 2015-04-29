<?php
error_reporting(E_ALL ^ E_NOTICE);
	require("base.php");
	require("db.php");
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	include("navbar.php");
	
// Create a title.
$name = $config["name"]." - Página principal";

if(isset($_GET['id']))
{
$cat = $_GET['id'];
}
else
{
$tpl->showegg = 1;
}
 $data = mysqli_query($con,"SELECT * FROM blog_entry WHERE cat_id='".$cat."'") or die(mysqli_error()); 
 $rows = mysqli_num_rows($data); 
 //This is the number of results displayed per page 
 $page_rows = 5; 

 //This tells us the page number of our last page 
 $last = ceil($rows/$page_rows); 

 //this makes sure the page number isn\'t below one, or more than our maximum pages 
 if ($_GET['page'] < 1 || !isset($_GET['page'])) 
 { 
 $_GET['page'] = 1; 
 } 

 elseif ($_GET['page'] > $last) 
 { 
 $_GET['page'] = $last; 
 } 

 //This sets the range to display in our query 
$max = 'WHERE cat_id=\''.$cat.'\' ORDER by `id` DESC limit ' .($_GET['page'] - 1) * $page_rows .',' .$page_rows; 
 
  //This is your query again, the same one... the only difference is we add $max into it
$data_p = mysqli_query($con,"SELECT * FROM blog_entry $max") or die(mysqli_error()); 
$contador = 1;
 //This is where you display your query results
while($blog = mysqli_fetch_array( $data_p )) 
{
$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
$recprofile = mysqli_fetch_array($recprofile1);
$categories1=mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
$categories=mysqli_fetch_array($categories1);
// Generate an array of book authors and titles.
$viewentries[$contador] = array(
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
$contador++;
}
// Assign values to the Savant instance.
$tpl->cat = $cat;
$tpl->title = $name;
$tpl->entries = $viewentries;
$tpl->page = $_GET['page'];
$tpl->lastpage = $last;
if ($_GET['page'] == 1) 
 {
 } 
else
{
$previous = $_GET['page']-1;
$tpl->prevpage = $previous;
}

if($_GET['page'] == $last)
{
}
else
{
 $next = $_GET['page']+1;
 $tpl->nextpage = $next;
}

// Display a template using the assigned values.
$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/cat.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?>