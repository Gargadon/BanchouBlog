<?php
if(defined("dwogame"))
{
if ($usuarios['group']==1)
{
	$author = $usuarios['id'];
	$fecha = time();
	$subject = $_POST['subject'];
	$entry = $_POST['content'];
	$envia = $_POST['envia'];
	if ($envia==1)
	{
	mysqli_query($con,'INSERT blog_entry (author, date, subject, entry) VALUES (\''.$author.'\',\''.$fecha.'\',\''.$subject.'\',\''.$entry.'\')');
	$searchentry=mysqli_fetch_array(mysqli_query($con,'SELECT id FROM blog_entry WHERE date=\''.$fecha.'\''));
                echo '
		<table  class="table small-12 large-12 columns">
		<tbody>
		<tr>
		<th>'.__('Configuración del blog').'</th>
		</tr>
		<tr>
		<td>
		'.__('Los cambios se han realizado correctamente.').'
		</td>
		</tr>
		<tr>
		<td>
		<a href="index.php?entryid='.$searchentry['id'].'">'.__('Ver entrada').'</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="'.$_SERVER['PHP_SELF'].'?id=blog">'.__('Regresar al índice').'</a>
		</td>
		</tr>
		</tbody>
		</table>';
	}
	else
	{

	echo '		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th colspan="2">Entradas más recientes</th></tr>
';
if (!(isset($_GET['page']))) 
		{ 
		$_GET['page'] = 1; 
		} 
		
		//Here we count the number of results 

 //Edit $data to be your query 

 $data = mysqli_query($con,"SELECT * FROM blog_entry") or die(mysqli_error()); 
 $rows = mysqli_num_rows($data); 
 if($rows==0)
 {
 echo '

<div data-alert class="alert-box alert">
'.__('Esto está muy vacío.').' ';
if($usuarios['group']==1)
echo '<a href="admin.php?action=newentry">'.__('¿Por qué no escribes tu primer entrada?').'</a>';
else
echo __('¿Por qué no escribes tu primer entrada?');
 echo ' </div>

';
 }
  else
 {
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
 echo '<tr>
		<td width="80px"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&r=pg&d=mm" alt="'.__('Avatar de').' '. $recprofile['usuario'] .'" title="'.__('Avatar de').' '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><td>
		<strong><a href="index.php?entryid='.$blog['id'].'">'.$blog['subject'].'</a></strong>
		</td>
		</tr>
		<tr>
		<td>
		'.__('Por').': <strong><a href="/profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a></strong> '.__('el día').' '.date('F j, Y, H:i:s',$blog['date']).'.
		</td>
		</tr>
		<td>
		<a href="admin.php?action=editentry&entryid='.$blog['id'].'">'.__('Editar entrada').'</a> | <a href="admin.php?action=deleteentry&entryid='.$blog['id'].'" onclick="return confirm(\''.__('¿Está seguro de querrer borrar esta entrada?').'\');">'.__('Borrar entrada').'</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>'; 
 } 
 
 // This shows the user what page they are on, and the total number of pages

 echo '<tr><td colspan="2">'.__('Mostrando página').' '.$_GET['page'].' '.__('de').' '.$last.'</td></tr>';

 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($_GET['page'] == 1) 
 {
 } 

 else 
 {
$previous = $_GET['page']-1;
echo '<tr><td colspan="2"><a href="admin.php?page=1"> <<-'.__('Primero').'</a>  | <a href="admin.php?page='.$previous.'"> <-'.__('Anterior').'</a></td></tr>';
 } 

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 if ($_GET['page'] == $last) 
 {
 } 

 else {
 $next = $_GET['page']+1;
 echo '<tr><td colspan="2"> <a href="admin.php?page='.$next.'">'.__('Siguiente').' -></a> | <a href="admin.php?page='.$last.'">'.__('Último').' ->></a></td></tr>';
 } 
 }
 echo '</tbody></table>
 ';

       	}
}
else
{
	echo 'Hacker?';
	die();
}
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>