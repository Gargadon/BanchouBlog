<?php
if(defined('dwogame'))
{
	if($_POST['envia']==1)
	{
	$author = $usuarios['id'];
	$fecha = time();
	$subject = $_POST['subject'];
	$entry = $_POST['content'];
	$envia = $_POST['envia'];
	mysql_query('INSERT blog_entry (author, date, subject, entry) VALUES (\''.$author.'\',\''.$fecha.'\',\''.$subject.'\',\''.$entry.'\')');
	$searchentry=mysql_fetch_array(mysql_query('SELECT id FROM blog_entry WHERE date=\''.$fecha.'\''));
			echo '<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="index.php?entryid='.$searchentry['id'].'">Ver tema</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar al índice</a></td>
		</tr>';
	}
else {
                echo '<form action="'.$_SERVER['PHP_SELF'].'?action=newentry" method="POST">
                
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
		<table>
		<tbody>
		<tr>
		<th colspan="2">Nueva entrada</th>
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
		<td colspan="2">Contenido de la entrada:
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
}
}else
{
header("HTTP/1.0 403 Forbidden");
}
?>