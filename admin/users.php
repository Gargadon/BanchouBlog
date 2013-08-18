<?php
if ($islogged==1)
{
// A continuación debe ir lo que contendrá el módulo.

 // Get the search variable from URL
  $search = htmlspecialchars($_GET['q']);
  $s = $_GET['s'];
  $trimmed = trim($search); //trim whitespace from the stored variable
  $mylocation = $usuarios['location'];
// rows to return
$limit=10; 

// check for an empty string and display a message.
if ($trimmed == "")
  {
                  echo '
		<form action="'.$_SERVER['PHP_SELF'].'" method="GET">
		<table class="table table-bordered table-hover">
		<tbody>
		<tr>
		<th colspan="2">Búsqueda de usuarios</th>
		</tr>
		<tr>
		<td>
		Usuario:
		</td>
		<td>
		<input type="text" size="20" name="q" value="'.$search.'" />
		</td>
		</tr>
		</tr>
		<tr>
		<td colspan="2">
		<input type="submit" value="Buscar" />
		</td>
		</tr>
		</tbody>
		</table>
		<input type="hidden" name="action" value="users" />
		</form>';
  exit;
  }

                  echo '
		<form action="'.$_SERVER['PHP_SELF'].'" method="GET">
		<table class="table table-bordered table-hover">
		<tbody>
		<tr>
		<th colspan="2">Búsqueda de usuarios</th>
		</tr>
		<tr>
		<td>
		Usuario:
		</td>
		<td>
		<input type="text" size="20" name="q" value="'.$_GET['q'].'" />
		</td>
		</tr>
		<tr>
		<td colspan="2">
		<input type="submit" value="Buscar" />
		</td>
		</tr>
		</tbody>
		</table>
		<input type="hidden" name="action" value="users" />
		</form>';

echo '<br /><br /><table class="table table-bordered table-hover">
<tbody>
<tr>';
if($usuarios['group']==1)
echo '<th colspan="5">Resultados</th></tr>';
else
echo '<th colspan="3">Resultados</th></tr>';
// check for a search parameter
if (!isset($search))
  {
  echo '<tr><td colspan="4" style="text-align:left">No parece haber puesto una búsqueda válida.</td></tr>';
  pie();
  exit;
  }


// Build SQL Query

		if ($trimmed == "*")
		{
		$query = "select * from blog_usuarios order by id";
		}
		else
		{
		$query = "select * from blog_usuarios where usuario like \"%$trimmed%\" order by id";
		}



 $numresults = mysql_query($query);
 $numrows = mysql_num_rows($numresults);

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
  {
if($usuarios['group']==1)
echo '<tr><td colspan="5" style="text-align:left">Lo sentimos, su búsqueda no retornó ningún resultado.</td></tr>';
else
echo '<tr><td colspan="3" style="text-align:left">Lo sentimos, su búsqueda no retornó ningún resultado.</td></tr>';
 }

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die('Couldn\'t execute query');

// display what the person searched for
if($usuarios['group']==1)
echo '<tr><td colspan="5" style="text-align:left">Su búsqueda fue: &quot;' . $search . '&quot;</td></tr>';
else
echo '<tr><td colspan="3" style="text-align:left">Su búsqueda fue: &quot;' . $search . '&quot;</td></tr>';

// begin to show results set
$count = 1 + $s ;

// now you can display the results returned
echo '<tr><td width="50%"><strong>Usuario</strong></td>
<td><strong>Ver perfil</strong></td>
<td><strong>Editar perfil</strong></td>';
if($usuarios['group']==1)
echo '<td><strong>Borrar usuario</strong></td>';
echo '</tr>';
  while ($row= mysql_fetch_array($result)) {
  $title = $row['usuario'];
if($contador%2==0)
{
echo '<tr class="even">';
}
else
{
echo '<tr>';
}
  echo '<td><strong>'.$title.'</strong></td>
  <td><button class="button secondary" onClick="window.location.href=\'profile.php?id='.$row['id'].'\'"><img src="icons/Actions-document-preview-archive-icon.png" /></button></td>';
if($usuarios['group']==1)
echo ' <td><button class="button secondary" onClick="window.location.href=\'edit_profile.php?id='.$row['id'].'\'"><img src="icons/Actions-document-save-as-icon.png" /></button></td>
 <td><button class="button secondary" onClick="window.location.href=\'admin.php?action=deleteuser&amp;u='.$row['id'].'\'"><img src="icons/Actions-dialog-close-icon.png" /></button></td>';
echo '</tr>';
  $count++;
  $contador++;
  }

$currPage = (($s/$limit) + 1);

//break before paging
  echo '</tbody></table>';

  // next we need to do the links to other results
  if ($s>=1) { // bypass PREV link if s is 0
  $prevs=($s-$limit);
  print '&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?action=users&amp;s='.$prevs.'&q='.$search.'">&lt;&lt; 
  Anteriores '.$limit.'</a>&nbsp&nbsp;';
  }

// calculate number of pages needing links
  $pages=intval($numrows/$limit);

// $pages now contains int of pages needed unless there is a remainder from division

  if ($numrows%$limit) {
  // has remainder so add one page
  $pages++;
  }

// check to see if last page
  if (!((($s+$limit)/$limit)==$pages) && $pages!=1) {

  // not last page so give NEXT link
  $news=$s+$limit;

  echo '&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?action=users&amp;s='.$news.'&q='.$search.'">Próximos '.$limit.' &gt;&gt;</a>';
  }

$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
  echo '<p>Mostrando resultados '.$b.' a '.$a.' de '.$numrows.'</p>';


}

else{
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
}
?>