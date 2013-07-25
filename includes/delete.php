<?php
echo '
<table class="table table-bordered table-hover">
<tbody>
<tr><th>Blog</th>
</tr>';
if(isset($_GET['comment']) && $usuarios['group']==1)
{
$comentario=$_GET['comment'];
mysql_query('DELETE FROM blog_comment WHERE id=\''.$comentario.'\'');
echo '<tr>
<td>
El mensaje ha sido borrado.
</td>
</tr>
<tr>
<td>
<a href="/blog">Regresar al blog</a>
</td>
</tr>
';

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
echo '</table>';
?>