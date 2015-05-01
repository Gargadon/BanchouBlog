<?php

	$author = $usuarios['id'];
	$fecha = time();
	$subject = $_POST['subject'];
	$entry = $_POST['content'];
	$envia = $_POST['envia'];
	if ($envia==1)
	{
	$tpl->envia = 'yes';
	mysqli_query($con,'INSERT blog_entry (author, date, subject, entry) VALUES (\''.$author.'\',\''.$fecha.'\',\''.$subject.'\',\''.$entry.'\')');
	$searchentry=mysqli_fetch_array(mysqli_query($con,'SELECT id FROM blog_entry WHERE date=\''.$fecha.'\''));
	$tpl->entryid = $searchentry['id'];
	}
	else
	{

	
if (!(isset($_GET['page']))) 
		{ 
		$_GET['page'] = 1; 
		} 
		
		//Here we count the number of results 

 //Edit $data to be your query 

 $data = mysqli_query($con,"SELECT * FROM blog_entry") or die(mysqli_error()); 
 $rows = mysqli_num_rows($data); 

 //This is the number of results displayed per page 
 $page_rows = 20; 

 //This tells us the page number of our last page 
 $last = ceil($rows/$page_rows); 

 //this makes sure the page number isn't below one, or more than our maximum pages 
 if ($_GET['page'] < 1) 
 { 
 $_GET['page'] = 1; 
 } 

 elseif ($_GET['page'] > $last) 
 { 
 $_GET['page'] = $last; 
 } 

 //This sets the range to display in our query 
 $max = 'ORDER by `id` DESC limit ' .($_GET['page'] - 1) * $page_rows .',' .$page_rows; 
 
  //This is your query again, the same one... the only difference is we add $max into it
 $data_p = mysqli_query($con,"SELECT * FROM blog_entry $max") or die(mysqli_error()); 

 //This is where you display your query results
 while($blog = mysqli_fetch_array( $data_p )) 
 { 
 	$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysqli_fetch_array($recprofile1);
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
$tpl->title = $name;
$tpl->entries = $viewentries;
$tpl->page = $_GET['page'];
$tpl->lastpage = $last;
}
// Display a template using the assigned values.

$tpl->display('skins/'.$config['skin'].'/templates/admin/viewentries.tpl.php');

?>