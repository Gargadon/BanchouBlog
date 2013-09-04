<?php
if(isset($_GET['entryid']))
	{
	include('includes/show_entry.php');
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
Esto está muy vacío. ';
if($usuarios['group']==1)
echo '<a href="admin.php?action=newentry">¿Por qué no escribes tu primer entrada?</a>';
else
echo '¿Por qué no escribes tu primer entrada?';
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

 echo '<tr>
		<td style="vertical-align:top;"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th>
		<h4><a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">'.$blog['subject'].'</a></h4>
		</th>
		</tr>
		<tr>
		<td>
		Por: <strong>';
		echo '<a href="'.$config['pathto'].'profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a>';
		echo '</strong> el '.date('F j, Y, H:i:s',$blog['date']).'.
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

 echo '<table><tbody><tr><td colspan="2">Mostrando página '.$_GET['page'].' de '.$last.'</td></tr>';

 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($_GET['page'] == 1) 
 {
 } 

 else 
 {
$previous = $_GET['page']-1;
echo '<tr><td colspan="2"><a href="'.$config['pathto'].'index.php?page=1"> <<-Primero</a>  | <a href="'.$config['pathto'].'index.php?page='.$previous.'"> <-Anterior</a></td></tr>';
 } 

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 if ($_GET['page'] == $last) 
 {
 } 

 else {
 $next = $_GET['page']+1;
 echo '<tr><td colspan="2"> <a href="'.$config['pathto'].'index.php?page='.$next.'">Siguiente -></a> | <a href="'.$config['pathto'].'index.php?page='.$last.'">Último ->></a></td></tr>';
 }

}
 echo '</tbody></table>'; 
 }
?>