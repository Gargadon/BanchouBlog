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
	echo $texto['22'];
	}
	else
	{
	$recgroup1 = mysql_query('SELECT * FROM blog_grupo WHERE id=\''.$recprofile['group'].'\'');
	$recgroup = mysql_fetch_array($recgroup1);
	$gravatar2 = md5($recprofile['email']);
   echo '<table class="table table-bordered table-hover">
      <tbody>
      <tr>
      <th colspan="2">'.$texto['23'].$recprofile['usuario'].'</th>
      </tr>
        <tr>
          <td colspan="2">';
	// Aquí va la API de Gravatar, a 150x150
	echo '<img style="display:block;margin-left:auto;margin-right:auto;" src="http://www.gravatar.com/avatar/'.$gravatar2.'?s=150&amp;r=pg&amp;d=mm" alt="'.$texto['24'].$recprofile['usuario'].'" title="'.$texto['24'].$recprofile['usuario'].'" />';
	echo '</td>
        </tr>
        <tr>
          <td>'.$texto['25'].':
          </td>
          <td>'. $recprofile['usuario'] .'
          </td>
        </tr>
        <tr>
          <td>'.$texto['26'].':
          </td>
          <td>'. $recgroup['nombre'] .'
          </td>
        </tr>
        <tr>
          <td>'.$texto['27'].':</td>
          <td>'. $recprofile['fecha'] .'
          </td>
        </tr>';
      if ($usuarios['group']==1)
      {
         echo '<tr>
          <td>'.$texto['28'].':</td>
          <td>';
          if($recprofile['ip']=='')
          $recprofile['ip'] = '127.0.0.1';
          echo $recprofile['ip'];
          echo '</td>
        </tr>
        <tr>
          <td>'.$texto['29'].':</td>
          <td>'.gethostbyaddr($recprofile['ip']).'
          </td>
        </tr>';  
        }
        elseif($recprofile['id']==$usuarios['id'])
        {
          echo '<tr>
          <td>'.$texto['28'].':</td>
          <td>'. $recprofile['ip'] .'
          </td>
        </tr>'; 
        }
echo '        <tr>
          <td>'.$texto['30'].':
          </td>
          <td>'. nl2br(htmlspecialchars($recprofile['descripcion'])) .'
          </td>
        </tr>
';
        if($recprofile['id']==$usuarios['id'] || $usuarios['group']==1)
        {
        	echo '        <tr>
        <td colspan="2">
        <a href="edit_profile.php?id='.$recprofile['id'].'">'.$texto['31'].'</a>
        </td>
        </tr>';
        }
        echo'
      </tbody>
    </table></div>';
    }
	}
	elseif($islogged==1)
	{
   echo '<table class="table table-bordered table-hover">
      <tbody>
      <tr>
      <th colspan="2">'.$texto['32'].'</th>
      </tr>
        <tr>
          <td colspan="2">';
	// Aquí va la API de Gravatar, a 150x150
	echo '<img style="display:block;margin-left:auto;margin-right:auto;" src="http://www.gravatar.com/avatar/'.$gravatar.'?s=150&amp;r=pg&amp;d=mm" alt="'.$texto['24']. $usuarios['usuario'] .'" title="'.$texto['24']. $usuarios['usuario'] .'" />';
	echo '</td>
        </tr>
        <tr>
          <td>'.$texto['25'].':
          </td>
          <td>'. $usuarios['usuario'] .'
          </td>
        </tr>
        <tr>
          <td>'.$texto['26'].':
          </td>
          <td>'. $grupo['nombre'] .'
          </td>
        </tr>
        <tr>
          <td>'.$texto['27'].':</td>
          <td>'. $usuarios['fecha'] .'
          </td>
        </tr>
        <tr>
          <td>'.$texto['28'].':</td>
          <td>'. $usuarios['ip'] .'
          </td>
        </tr>';
      if ($usuarios['group']==1)
      {
         echo '<tr>
          <td>'.$texto['29'].':</td>
          <td>'.gethostbyaddr($usuarios['ip']).'
          </td>
        </tr>';  
        }
           echo '<tr>
          <td>'.$texto['30'].':
          </td>
          <td>'. nl2br(htmlspecialchars($usuarios['descripcion'])) .'
          </td>
        </tr>
        <tr>
        <td colspan="2">
        <a href="edit_profile.php">'.$texto['31'].'</a>
        </td>
        </tr>
      </tbody>
    </table></div>
';
}
else{
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
}

include("footer.php");
require("close_session.php");
?>