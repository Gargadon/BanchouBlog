<?php
if(defined('dwogame'))
{
               echo '<table class="table table-bordered table-hover">
		<tbody>
		<tr>
		<th>Configuración del blog</th>
		</tr>';
	if(isset($_POST['envia']))
	{
	mysql_query('UPDATE blog_entry SET entry=\''.$_POST['entrada'].'\',subject=\''.$_POST['subject'].'\' WHERE id=\''.$_GET['entryid'].'\'');
			echo '<tr>
		<td>Los cambios se han realizado correctamente.</td>
		</tr>
		<tr>
		<td><a href="index.php?entryid='.$_GET['entryid'].'">Ver tema</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">Regresar al índice</a></td>
		</tr>';
	}
	else
	{
	$blog1 = mysql_query('SELECT * FROM blog_entry WHERE id=\''.$_GET['entryid'].'\'');
	$blog = mysql_fetch_array($blog1);
	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);	
		echo '<tr>
		<td>       
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<form action="admin.php?action=editentry&entryid='.$_GET['entryid'].'" method="POST">
		<strong>Editar entrada:
		</strong></td>
		</tr>
		<tr>
		<td>Por: <strong><a href="profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a></strong>
		</td>
		</tr>
		<tr>
		<td>Tema: <input type="text" name="subject" value="'.$blog['subject'].'" />
		</td>
		</tr>
		<tr>
		<td>
		<textarea id="editor_v2" name="entrada" style="width:100%;height:150px;">'.$blog['entry'].'</textarea>
		<script type="text/javascript">
		//<![CDATA[
		CKEDITOR.replace( \'editor_v2\',
			{
			skin : \'v2\'
			});
		//]]>
		</script>
		<input type="hidden" name="envia" value="yes" />
		</form>
		</td>
		</tr>';
	}
		echo '</tbody>
		</table>';
}
else
{
header("HTTP/1.0 403 Forbidden");
}
?>