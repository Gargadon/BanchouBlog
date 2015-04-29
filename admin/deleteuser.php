<?php
if ($islogged==1 && $usuarios['group']==1)
{
	$u = $_GET['u'];
	$recprofile1 = mysqli_query($con,'SELECT * FROM blog_usuarios WHERE id=\''.$u.'\'');
	$recprofile = mysqli_fetch_array($recprofile1);
	//Proponemos condiciones
	if($usuarios['id'] == $u)
	{
		echo __('No puede borrar su propio usuario.');
	}
	elseif($recprofile['group'] == 1)
	{
		echo __('Los administradores no pueden borrar a otros administradores.');
	}
	else
	{
		if($_POST['envia']=='yes')
		{	
			mysqli_query($con,'DELETE FROM blog_usuarios WHERE id=\''.$u.'\'');
			if($_POST['deletepost']==1)
			mysqli_query($con,'DELETE FROM blog_entry WHERE author=\''.$u.'\'');
			echo '<div class="row">
				<div class="large-12 columns">'.__('El usuario ha sido borrado.').'</div>
				<div class="large-6 columns"><a href="'.$config['pathto'].'">'.__('Regresar al índice').'</a></div>
				<div class="large-6 columns"><a href="'.$config['pathto'].'admin.php">'.__('Regresar a la administración').'</a></div>
				</div>';
		}
		else
		{
			echo '<form action="admin.php?action=deleteuser&u='.$u.'" method="POST">
			<div class="row">
			<div class="small-12 large-12 columns"><p>'.__('¿Confirma que desea borrar a este usuario? Este paso no se puede deshacer.').'</p>
			<p>'.__('Marque la siguiente casilla si desea borrar todas las entradas de este usuario').': <input type="checkbox" name="deletepost" value="1"></p>
			</div>
			<div class="small-6 large-6 columns"><input class="button secondary" type="submit" value="'.__('Borrar').'"></div>
			<div class="small-6 large-6 columns"><button class="button secondary" onClick="window.location.href=\'index.php\'">'.__('No borrar').'</button></div>
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