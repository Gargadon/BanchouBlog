<?php
header("Content-Type: text/html;charset=utf-8");
require("base.php");
include("header.php");

	// A continuación debe ir lo que contendrá el módulo.
	if (isset($_GET['id']))
	{
	$profid = $_GET['id'];
	$recprofile1 = mysql_query('SELECT * FROM blog_usuarios WHERE id=\''.$profid.'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	if(empty($recprofile['usuario']))
	{
	echo 'El usuario no existe';
	}
	else
	{
	$recgroup1 = mysql_query('SELECT * FROM blog_grupo WHERE id=\''.$recprofile['group'].'\'');
	$recgroup = mysql_fetch_array($recgroup1);
	$gravatar2 = md5($recprofile['email']);
   echo '<table class="table table-bordered table-hover">
      <tbody>
      <tr>
      <th colspan=2">Perfil del usuario '.$recprofile['usuario'].'</th>
      </tr>
        <tr>
          <td colspan="2"><div align="center">';
	// Aquí va la API de Gravatar, a 150x150
	echo '<img src="http://www.gravatar.com/avatar/'.$gravatar2.'?s=150&amp;r=pg&amp;d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" />';
	echo '</div>
          </td>
        </tr>
        <tr>
          <td>Nombre de usuario:
          </td>
          <td style="width:70%;">'. $recprofile['usuario'] .'
          </td>
        </tr>
        <tr>
          <td>Rol:
          </td>
          <td>'. $recgroup['nombre'] .'
          </td>
        </tr>
        <tr>
          <td>Fecha de registro:</td>
          <td>'. $recprofile['fecha'] .'
          </td>
        </tr>';
      if ($usuarios['group']==1)
      {
         echo '<tr>
          <td>IP:</td>
          <td>';
          if($recprofile['ip']=='')
          $recprofile['ip'] = '127.0.0.1';
          echo $recprofile['ip'];
          echo '</td>
        </tr>
        <tr>
          <td>Nombre del servidor:</td>
          <td>'.gethostbyaddr($recprofile['ip']).'
          </td>
        </tr>';  
        }
        elseif($recprofile['id']==$usuarios['id'])
        {
          echo '<tr>
          <td>IP:</td>
          <td>'. $recprofile['ip'] .'
          </td>
        </tr>'; 
        }
echo '        <tr>
          <td>Acerca de mí:
          </td>
          <td>'. nl2br(htmlspecialchars($recprofile['descripcion'])) .'
          </td>
        </tr>
';
        if($recprofile['id']==$usuarios['id'] || $usuarios['group']==1)
        {
        	echo '        <tr>
        <td colspan="2">
        <a href="edit_profile.php?id='.$recprofile['id'].'">Editar perfil</a>
        </td>
        </tr>';
        }
        echo'
      </tbody>
    </table>';
    }
	}
	else
	{
   echo '<table class="table table-bordered table-hover">
      <tbody>
      <tr>
      <th colspan=2">Tu perfil</th>
      </tr>
        <tr>
          <td colspan="2"><div align="center">';
	// Aquí va la API de Gravatar, a 150x150
	echo '<img src="http://www.gravatar.com/avatar/'.$gravatar.'?s=150&amp;r=pg&amp;d=mm" alt="Avatar de '. $usuarios['usuario'] .'" title="Avatar de '. $usuarios['usuario'] .'" />';
	echo '</div>
          </td>
        </tr>
        <tr>
          <td>Nombre de usuario:
          </td>
          <td>'. $usuarios['usuario'] .'
          </td>
        </tr>
        <tr>
          <td>Rol:
          </td>
          <td>'. $grupo['nombre'] .'
          </td>
        </tr>
        <tr>
          <td>Fecha de registro:</td>
          <td>'. $usuarios['fecha'] .'
          </td>
        </tr>
        <tr>
          <td>IP:</td>
          <td>'. $usuarios['ip'] .'
          </td>
        </tr>';
      if ($usuarios['group']==1)
      {
         echo '<tr>
          <td>Nombre del servidor:</td>
          <td>'.gethostbyaddr($usuarios['ip']).'
          </td>
        </tr>';  
        }
           echo '<tr>
          <td>Acerca de mí:
          </td>
          <td>'. nl2br(htmlspecialchars($usuarios['descripcion'])) .'
          </td>
        </tr>
        <tr>
          <td>Ubicación actual:
          </td>
          <td>' . $ubicacion['alias'] .'
          </td>
        </tr>
        <tr>
        <td colspan="2">
        <a href="edit_profile.php">Editar perfil</a>
        </td>
        </tr>
      </tbody>
    </table>
';
}

include("footer.php");
require("close_session.php");
?>