<?php
//session_start();
require("base.php");
include("header.php");
if ($islogged==1)
{
	if (isset($_GET['id']))
	{
	$profid = $_GET['id'];
	$recprofile1 = mysql_query('SELECT * FROM blog_usuarios WHERE id=\''.$profid.'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	if(empty($recprofile['usuario']))
	{
	echo $texto['22'];
	}
	elseif($recprofile['id']==$usuarios['id'] || $usuarios['group']==1)
	{
	$recgroup1 = mysql_query('SELECT * FROM blog_grupo WHERE id=\''.$recprofile['group'].'\'');
	$recgroup = mysql_fetch_array($recgroup1);
	$cambiagrupo1 = mysql_query('SELECT * FROM blog_grupo');
	// A continuación debe ir lo que contendrá el módulo.
   echo '<table>
      <tbody>
      	<tr>
      	<th colspan="2">
      	'.$texto['31'].'
      	</th>
      	</tr>
              <tr>
          <td colspan="2">';
           	if(isset($_POST['actualiza']))
		{
	$username = $_POST["usuario"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellidos"];
	if($usuarios['group']==1)
	$group = $_POST["grupo"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];
	$descripcion = $_POST["descripcion"];
	$passwordenmd5 = md5($password2);
		if($passwordenmd5!=d41d8cd98f00b204e9800998ecf8427e)
			{
			if($password1!=$password2) {
				echo ''.$texto['43'].'
					</td></tr></tbody>
					</table>';
				}
			else
				{
				if($recprofile['usuario']!=$username)
				{
				mysql_query('UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\', usuario=\''.$username.'\', password=\''.$passwordenmd5.'\', descripcion=\''.$descripcion.'\', `group`=\''.$group.'\'  WHERE usuario=\''.$recprofile['usuario'].'\'');
				session_destroy();
				echo ''.$texto['44'].'
					</td></tr></tbody>
					</table>';
				}
				else
				{
				mysql_query('UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\', password=\''.$passwordenmd5.'\', descripcion=\''.$descripcion.'\', `group`=\''.$group.'\' WHERE usuario=\''.$recprofile['usuario'].'\'');
				echo ''.$texto['44'].'
					</td></tr></tbody>
					</table>';
					}
				}
			}
		else
		{
				if($recprofile['usuario']!=$username)
				{
				mysql_query('UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\', usuario=\''.$username.'\', descripcion=\''.$descripcion.'\', `group`=\''.$group.'\' WHERE usuario=\''.$recprofile['usuario'].'\'');
				session_destroy();
				echo ''.$texto['44'].'
					</td></tr></tbody>
					</table>';
				}
				else
				{
				mysql_query('UPDATE blog_usuarios SET name=\''.$nombre.'\', surname=\''.$apellido.'\',descripcion=\''.$descripcion.'\', `group`=\''.$group.'\' WHERE usuario=\''.$recprofile['usuario'].'\'');
				echo ''.$texto['45'].'
					</td></tr></tbody>
					</table>';
					}
		}
		}
	else
	{
          echo '<div align="center">'.$texto['34'].'</div>
                   <form METHOD="post" action="edit_profile.php?id='.$profid.'"> </td>
        </tr>
        <tr>
          <td>'.$texto['25'].':
          </td>
          <td><input type="text" name="usuario" value="'. $recprofile['usuario'] .'" />
          </td>
        </tr>
        <tr>
          <td>'.$texto['33'].':
          </td>
          <td>'.$texto['35'].'
          </td>
        </tr>
        <tr>
        <td>'.$texto['36'].':
          </td>
          <td><input type="text" name="nombre" value="'.$recprofile['name'].'" />
          </td>
        </tr>
        <tr>
        <td>'.$texto['37'].':</td>
          <td><input type="text" name="'.$texto['37'].'" value="'.$recprofile['surname'].'" />
          </td>
        </tr>
        <tr>
        <td>'.$texto['38'].':
          </td>
          <td><input type="password" name="password1" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td>'.$texto['39'].':
          </td>
          <td><input type="password" name="password2" maxlength="10" />
          </td>
        </tr>
	 <tr>
          <td>'.$texto['40'].':
          </td>
          <td><input type="text" name="email" value="'. $recprofile['email'] .'" />
          </td>
        </tr>';
        if(($usuarios['group']==1) && ($recprofile['id']!=$usuarios['id']))
         {
         echo '<tr>
          <td>'.$texto['26'].':
          </td>
          <td><select name="grupo">
          <option value="'.$recprofile['group'].'" selected>No cambiar ('.$recgroup['nombre'].')</option>
          ';
	while($cambiagrupo = mysql_fetch_array($cambiagrupo1))
	{
		echo '<option value="'.$cambiagrupo['id'].'">'.$cambiagrupo['nombre'].'</option>
		';
	}
          echo '</select></td>
        </tr>';
        }
        else
        echo '  <tr>
          <td>'.$texto['26'].':
          </td>
          <td><input type="text" name="grupo" value="'. $grupo['nombre'] .'" disabled /><input type="hidden" name="grupo" value="'.$recprofile['group'].'">
          </td>
        </tr>';
echo '        <tr>
          <td>'.$texto['27'].':</td>
          <td><input type="text" name="fecha" value="'. $recprofile['fecha'] .'" disabled />
          </td>
        </tr>
        <tr>
          <td>'.$texto['30'].':
          </td>
          <td><textarea name="descripcion">'. $recprofile['descripcion'] .'</textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="'.$texto['31'].'" />
          </td>
        </tr>
        <tr>
         <td colspan="2">
        <a href="profile.php">'.$texto['41'].'</a>
         </td>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="actualiza" value="1" />
    </form>';
    }
    }
    else
    {
    echo '<p>'.$texto['42'].'</p>';
    }
}
}
else{
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
}
include("footer.php");
require("close_session.php");
?>