<?php
if(defined('dwogame'))
{
               echo '<table class="table large-12 small-12 columns">
		<tbody>
		<tr>
		<th>'.__('Configuración del blog').'</th>
		</tr>';
	if(isset($_POST['envia']))
	{
	mysqli_query($con,'UPDATE blog_entry SET entry=\''.$_POST['entrada'].'\',subject=\''.$_POST['subject'].'\', cat_id=\''.$_POST['category'].'\' WHERE id=\''.$_GET['entryid'].'\'');
			echo '<tr>
		<td>'.__('Los cambios se han realizado correctamente.').'</td>
		</tr>
		<tr>
		<td><a href="index.php?entryid='.$_GET['entryid'].'">'.__('Ver tema').'</a></td>
		</tr>
		<tr>
		<td><a href="admin.php">'.__('Regresar al índice').'</a></td>
		</tr>';
	}
	else
	{
	$blog1 = mysqli_query($con,'SELECT * FROM blog_entry WHERE id=\''.$_GET['entryid'].'\'');
	$blog = mysqli_fetch_array($blog1);
	$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysqli_fetch_array($recprofile1);	
		echo '<tr>
		<td>       
                <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                <link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<form action="admin.php?action=editentry&entryid='.$_GET['entryid'].'" method="POST">
		<strong>'.__('Editar entrada').':
		</strong></td>
		</tr>
		<tr>
		<td>'.__('Por').': <strong><a href="profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a></strong>
		</td>
		</tr>
		<tr>
		<td>'.__('Tema').': <input type="text" name="subject" value="'.$blog['subject'].'" />
		</td>
		</tr>
		<tr>
		<td>
		<textarea id="editor1" name="entrada" style="width:100%;height:150px;">'.$blog['entry'].'</textarea>
		<script type="text/javascript">
			CKEDITOR.replace( \'editor1\' );
		</script>';
		$blog_cats1 = mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
		$blog_cats = mysqli_fetch_array($blog_cats1);
echo '		'.__('Categoría').': <select name="category"><option value="'.$blog['cat_id'].'">'.__('No cambiar').' ('.$blog_cats['name'].')</option>';
		unset($blog_cats1);
		unset($blog_cats);
		$blog_cats1 = mysqli_query($con,'SELECT * FROM blog_cats ORDER BY id ASC');
		while($blog_cats = mysqli_fetch_array($blog_cats1))
		{
		echo '<option value="'.$blog_cats['id'].'">'.$blog_cats['name'].'</option>';
		}
echo '</select>
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