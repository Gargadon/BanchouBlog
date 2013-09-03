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
	mysql_query('INSERT blog_entry (author, date, subject, entry) VALUES (\''.$author.'\',\''.$fecha.'\',\''.$subject.'\',\''.$entry.'\')');
	$searchentry=mysql_fetch_array(mysql_query('SELECT id FROM blog_entry WHERE date=\''.$fecha.'\''));
                echo '
		<table class="table table-bordered table-hover">
		<tbody>
		<tr>
		<th>Configuración del blog</th>
		</tr>
		<tr>
		<td>
		Los cambios se han realizado correctamente.
		</td>
		</tr>
		<tr>
		<td>
		<a href="index.php?entryid='.$searchentry['id'].'">Ver entrada</a>
		</td>
		</tr>
		<tr>
		<td>
		<a href="'.$_SERVER['PHP_SELF'].'?id=blog">Regresar al menú</a>
		</td>
		</tr>
		</tbody>
		</table>';
	}
	else
	{

	echo '		<table class="table table-bordered table-hover">
		<tbody>
		<tr><th colspan="2">Entradas más recientes</th></tr>
';
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
 $data_p = mysql_query("SELECT * FROM blog_entry $max") or die(mysql_error()); 

 //This is where you display your query results
 while($blog = mysql_fetch_array( $data_p )) 
 { 
 	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);
 echo '<tr>
		<td width="80px"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&r=pg&d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table table-bordered table-hover">
		<tbody>
		<tr><td>
		<strong><a href="index.php?entry='.$blog['id'].'">'.$blog['subject'].'</a></strong>
		</td>
		</tr>
		<tr>
		<td>
		Por: <strong><a href="/profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a></strong> el '.date('F j, Y, H:i:s',$blog['date']).'.
		</td>
		</tr>
		<td>
		<a href="admin.php?action=editentry&entryid='.$blog['id'].'">Editar entrada</a> | <a href="admin.php?action=deleteentry&entryid='.$blog['id'].'" onclick="return confirm(\'¿Está seguro de querrer borrar esta entrada?\');">Borrar entrada</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>'; 
 } 
 
 // This shows the user what page they are on, and the total number of pages

 echo '<tr><td colspan="2">Mostrando página '.$_GET['page'].' de '.$last.'</td></tr>';

 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

 if ($_GET['page'] == 1) 
 {
 } 

 else 
 {
$previous = $_GET['page']-1;
echo '<tr><td colspan="2"><a href="admin.php?page=1"> <<-Primero</a>  | <a href="admin.php?page='.$previous.'"> <-Anterior</a></td></tr>';
 } 

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 if ($_GET['page'] == $last) 
 {
 } 

 else {
 $next = $_GET['page']+1;
 echo '<tr><td colspan="2"> <a href="admin.php?page='.$next.'">Siguiente -></a> | <a href="admin.php?page='.$last.'">Último ->></a></td></tr>';
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