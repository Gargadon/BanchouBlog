<?php
if ($islogged==1 && $usuarios['group']==1)
{
	$u = $_GET['u'];
	$recprofile1 = mysql_query('SELECT * FROM blog_usuarios WHERE id=\''.$u.'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	//Proponemos condiciones
	if($usuarios['id'] == $u)
	{
		echo 'No puede borrar su propio usuario.';
	}
	elseif($recprofile['group'] == 1)
	{
		echo 'Los administradores no pueden borrar a otros administradores.';
	}
	else
	{
		if($_POST['envia']=='yes')
		{	
			mysql_query('DELETE FROM blog_usuarios WHERE id=\''.$u.'\'');
			if($_POST['deletepost']==1)
			mysql_query('DELETE FROM blog_entry WHERE author=\''.$u.'\'');
			echo '<div class="row">
				<div class="large-12 columns">El usuario ha sido borrado.</div>
				<div class="large-6 columns"><a href="'.$config['pathto'].'">Regresar al índice</a></div>
				<div class="large-6 columns"><a href="'.$config['pathto'].'admin.php">Regresar a la administración</a></div>
				</div>';
		}
		else
		{
			echo '<form action="admin.php?action=deleteuser&u='.$u.'" method="POST">
			<div class="row">
			<div class="small-12 large-12 columns"><p>¿Confirma que desea borrar a este usuario? Este paso no se puede deshacer.</p>
			<p>Marque la siguiente casilla si desea borrar todas las entradas de este usuario: <input type="checkbox" name="deletepost" value="1"></p>
			</div>
			<div class="small-6 large-6 columns"><input class="button secondary" type="submit" value="Borrar"></div>
			<div class="small-6 large-6 columns"><button class="button secondary" onClick="window.location.href=\'index.php\'">No borrar</button></div>
			</div>
			<input type="hidden" name="envia" value="yes">
			</form>';
		}	
	}

}
else
{
echo 'Hacker?';
die();
}