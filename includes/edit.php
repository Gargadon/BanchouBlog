<?php
echo '
<table class="table table-bordered table-hover">
<tbody>
<tr><th>Blog</th>
</tr>';
if(isset($_GET['comment']) && $usuarios['group']==1)
{
$comentario=$_GET['comment'];
$comment1 = mysql_query('SELECT * FROM blog_comment WHERE id=\''.$comentario.'\'');
$comment = mysql_fetch_array($comment1);
if(isset($_POST['envia']))
{
$entrada=$_POST['comentario'];
mysql_query('UPDATE blog_comment SET entry=\''.$entrada.'\' WHERE id=\''.$comment['id'].'\'');
echo '<tr><td>
'.__('La entrada se ha actualizado correctamente.').'
</td></tr>
<tr>
<td>
<a href="/blog/entry/'.$comment['id_entry'].'.html#c'.$comment['id'].'">Regresar al blog</a>
</td>
</tr>';
}
else
{
$recprofile1 = mysql_query('SELECT usuario FROM usuarios WHERE id=\''.$comment['author'].'\'');
$recprofile = mysql_fetch_array($recprofile1);
echo '<form action="" method="POST">
<tr>
<td>Editar comentario de <strong><a href="/profile.php?id='.$comment['author'].'">'.$recprofile['usuario'].'</a>
</strong>:</td>
</tr><tr>
<td>
<textarea name="comentario">'.$comment['entry'].'</textarea>
</td>
</tr>
<tr>
<td>
<input type="reset" value="Restablecer" /> <input type="submit" value="Editar comentario" />
<input type="hidden" name="envia" value="yes" />
</td>
</tr>
</form>
';
}
}
else
{
echo '<tr>
<td>
No se eligió ningún comentario.
</td>
</tr>';
}
echo '</tbody>';
if($isblogmobile==1)
echo '</table>';
?>
