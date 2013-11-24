<?php
if(isset($_GET['entryid']))
	{
	include('includes/show_entry.php');
	}
elseif($_GET['cat'])
{
$cat = $_GET['cat'];
echo '

<table class="table small-12 large-12 columns">
<tbody>';
		if (!(isset($_GET['page']))) 
		{ 
		$_GET['page'] = 1; 
		} 
		
		//Here we count the number of results 

 //Edit $data to be your query 

 $data = mysql_query("SELECT * FROM blog_entry WHERE cat_id='".$cat."'") or die(mysql_error()); 
 $rows = mysql_num_rows($data); 

 if($rows==0)
 {
 echo '

<div data-alert class="alert-box alert">
'.$texto['16'].' ';
if($usuarios['group']==1)
echo '<a href="admin.php?action=newentry">'.$texto['17'].'</a>';
else
echo ''.$texto['17'].'';
 echo ' </div>

';
 }
 else
 {
 //This is the number of results displayed per page 
 $page_rows = 5; 

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
 $max = 'WHERE cat_id=\''.$cat.'\' ORDER by `id` DESC limit ' .($_GET['page'] - 1) * $page_rows .',' .$page_rows; 
 
  //This is your query again, the same one... the only difference is we add $max into it
 $data_p = mysql_query("SELECT * FROM blog_entry $max") or die(mysql_error()); 

 //This is where you display your query results
 while($blog = mysql_fetch_array( $data_p )) 
 {
 	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	$categories1=mysql_query('SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
	$categories=mysql_fetch_array($categories1);
 echo '<tr>
		<td style="vertical-align:top;width:80px;"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th><a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">'.$blog['subject'].'</a>
		</th>
		</tr>
		<tr>
		<td>
		Por: <strong>';
		echo '<a href="'.$config['pathto'].'profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a>';
		echo '</strong> el '.date('F j, Y, H:i:s',$blog['date']).' en la categoría <a href="index.php?cat='.$categories['id'].'">'.$categories['name'].'</a>.
		</td>
		</tr>
		<tr>
		<td>
		'.$blog['entry'].'
		</td>
		<tr>
		<td>
		<a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">Leer más</a> | <a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'#comments">Leer comentarios / Escribir comentario</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>'; 
 } 
 
 // This shows the user what page they are on, and the total number of pages

 echo '</table><table class="table small-12 large-12 columns"><tbody><tr><td colspan="2">'.$texto['14'].' '.$_GET['page'].' '.$texto['15'].' '.$last.'</td></tr>';

 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($_GET['page'] == 1) 
 {
 } 

 else 
 {
$previous = $_GET['page']-1;
echo '<tr><td colspan="2"><a href="'.$config['pathto'].'index.php?page=1"> <<-'.$texto['20'].'</a>  | <a href="'.$config['pathto'].'index.php?page='.$previous.'"> <-'.$texto['18'].'</a></td></tr>';
 } 

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 if ($_GET['page'] == $last) 
 {
 } 

 else {
 $next = $_GET['page']+1;
 echo '<tr><td colspan="2"> <a href="'.$config['pathto'].'index.php?cat='.$cat.'&amp;page='.$next.'">'.$texto['19'].' -></a> | <a href="'.$config['pathto'].'index.php?cat='.$cat.'&amp;page='.$last.'">'.$texto['21'].' ->></a></td></tr>';
 }

}
 echo '</tbody></table></div>'; 
}	
	
else
	{echo '

<table class="table small-12 large-12 columns">
<tbody>';
		if (!(isset($_GET['page']))) 
		{ 
		$_GET['page'] = 1; 
		} 
		
		//Here we count the number of results 

 //Edit $data to be your query 

 $data = mysql_query("SELECT * FROM blog_entry") or die(mysql_error()); 
 $rows = mysql_num_rows($data); 

 if($rows==0)
 {
 echo '

<div data-alert class="alert-box alert">
'.$texto['16'].' ';
if($usuarios['group']==1)
echo '<a href="admin.php?action=newentry">'.$texto['17'].'</a>';
else
echo ''.$texto['17'].'';
 echo ' </div>

';
 }
 else
 {
 //This is the number of results displayed per page 
 $page_rows = 5; 

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
 $data_p = mysql_query("SELECT * FROM blog_entry $max") or die(mysql_error()); 

 //This is where you display your query results
 while($blog = mysql_fetch_array( $data_p )) 
 {
 	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	$categories1=mysql_query('SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
	$categories=mysql_fetch_array($categories1);
 echo '<tr>
		<td style="vertical-align:top;width:80px;"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th><a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">'.$blog['subject'].'</a>
		</th>
		</tr>
		<tr>
		<td>
		Por: <strong>';
		echo '<a href="'.$config['pathto'].'profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a>';
		echo '</strong> el '.date('F j, Y, H:i:s',$blog['date']).' en la categoría <a href="index.php?cat='.$categories['id'].'">'.$categories['name'].'</a>.
		</td>
		</tr>
		<tr>
		<td>
		'.$blog['entry'].'
		</td>
		<tr>
		<td>
		<a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">Leer más</a> | <a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'#comments">Leer comentarios / Escribir comentario</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>'; 
 } 
 
 // This shows the user what page they are on, and the total number of pages

 echo '</table><table class="table small-12 large-12 columns"><tbody><tr><td colspan="2">'.$texto['14'].' '.$_GET['page'].' '.$texto['15'].' '.$last.'</td></tr>';

 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($_GET['page'] == 1) 
 {
 } 

 else 
 {
$previous = $_GET['page']-1;
echo '<tr><td colspan="2"><a href="'.$config['pathto'].'index.php?page=1"> <<-'.$texto['20'].'</a>  | <a href="'.$config['pathto'].'index.php?page='.$previous.'"> <-'.$texto['18'].'</a></td></tr>';
 } 

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 if ($_GET['page'] == $last) 
 {
 } 

 else {
 $next = $_GET['page']+1;
 echo '<tr><td colspan="2"> <a href="'.$config['pathto'].'index.php?page='.$next.'">'.$texto['19'].' -></a> | <a href="'.$config['pathto'].'index.php?page='.$last.'">'.$texto['21'].' ->></a></td></tr>';
 }

}
 echo '</tbody></table></div>'; 
 }
?>
