<?php
if(defined('dwogame'))
{
	if($_POST['envia']==1)
	{
	$author = $usuarios['id'];
	$fecha = time();
	$subject = $_POST['subject'];
	$page = $_POST['content'];
	$envia = $_POST['envia'];
	mysql_query('INSERT blog_pages (author, date, subject, page) VALUES (\''.$author.'\',\''.$fecha.'\',\''.$subject.'\',\''.$page.'\')');
	$searchentry=mysql_fetch_array(mysql_query('SELECT id FROM blog_pages WHERE date=\''.$fecha.'\''));
			echo '<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="pages.php?id='.$searchentry['id'].'">Ver página</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar al índice</a></td>
		</tr>';
	}
else {
                echo '<form action="'.$_SERVER['PHP_SELF'].'?action=pages" method="POST">
                
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
		<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th colspan="2">Nueva página</th>
		</tr>
		<tr>
		<td>
		Tema:
		</td>
		<td>
		<input type="text" name="subject" size="100" />
		</td>
		</tr>
		<tr>
		<td colspan="2">Contenido de la página:
		</td>
		</tr>
		<tr>
		<td colspan="2">
		<textarea id="editor1" name="content" style="width:100%;height:150px;"></textarea>
		<script type="text/javascript">
			CKEDITOR.replace( \'editor1\' );
		</script>
		</td>
		</tr>
		<tr>
		<td colspan="2" class="notes">
		<a href="'.$_SERVER['PHP_SELF'].'">Regresar al menú</a>
		</td>
		</tr>
		</tbody>
		</table>
		<input type="hidden" name="envia" value="1" />
		</form>
		';
		
}echo '		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th colspan="2">Páginas más recientes</th></tr>
';
if (!(isset($_GET['page']))) 
		{ 
		$_GET['page'] = 1; 
		} 
		
		//Here we count the number of results 

 //Edit $data to be your query 

 $data = mysql_query("SELECT * FROM blog_pages") or die(mysql_error()); 
 $rows = mysql_num_rows($data); 
 if($rows==0)
 {
 echo '<tr><td colspan="2">Esto está muy vacío. </td></tr>';
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
 $data_p = mysql_query("SELECT * FROM blog_pages $max") or die(mysql_error()); 

 //This is where you display your query results
 while($blog = mysql_fetch_array( $data_p )) 
 { 
 	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);
 echo '<tr>
		<td width="80px"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&r=pg&d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><td>
		<strong><a href="pages.php?id='.$blog['id'].'">'.$blog['subject'].'</a></strong>
		</td>
		</tr>
		<tr>
		<td>
		Por: <strong><a href="/profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a></strong> el '.date('F j, Y, H:i:s',$blog['date']).'.
		</td>
		</tr>
		<td>
		<a href="admin.php?action=editpage&id='.$blog['id'].'">Editar página</a> | <a href="admin.php?action=deletepage&id='.$blog['id'].'" onclick="return confirm(\'¿Está seguro de querrer borrar esta página?\');">Borrar página</a>
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
echo '<tr><td colspan="2"><a href="admin.php?action=pages&amp;page=1"> <<-Primero</a>  | <a href="admin.php?action=pages&amp;page='.$previous.'"> <-Anterior</a></td></tr>';
 } 

 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
 if ($_GET['page'] == $last) 
 {
 } 

 else {
 $next = $_GET['page']+1;
 echo '<tr><td colspan="2"> <a href="admin.php?action=pages&amp;page='.$next.'">Siguiente -></a> | <a href="admin.php?action=pages&amp;page='.$last.'">Último ->></a></td></tr>';
 } 
 }
 echo '</tbody></table>
 ';
}else
{
header("HTTP/1.0 403 Forbidden");
}
?>