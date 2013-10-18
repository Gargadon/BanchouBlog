 
<?php

// A continuación debe ir lo que contendrá el módulo.

 // Get the search variable from URL
  $search = htmlspecialchars($_GET['q']);
  $s = $_GET['s'];
  $trimmed = trim($search); //trim whitespace from the stored variable
  $mylocation = $usuarios['location'];
// rows to return
$limit=2; 

// check for an empty string and display a message.
if ($trimmed == "")
  {
                  echo '<div data-alert class="alert-box alert">Búsqueda inválida</div>';
                  pie();
  exit;
  }
echo '<br /><br /><table class="table table-bordered table-hover">
<tbody>
<tr>';
echo '<th colspan="2">Resultados</th></tr>';
// check for a search parameter
if (!isset($search))
  {
  echo '<div data-alert class="alert-box alert">Búsqueda inválida</div>';
  pie();
  exit;
  }


// Build SQL Query

		if ($trimmed == "*")
		{
		$query = "select * from blog_entry order by id DESC";
		}
		else
		{
		$query = "select * from blog_entry where entry like \"%$trimmed%\" order by id DESC";
		}



 $numresults = mysql_query($query);
 $numrows = mysql_num_rows($numresults);

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
  {
echo '<tr><td colspan="2" style="text-align:left">Lo sentimos, su búsqueda no retornó ningún resultado.</td></tr>';
 }

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die('Couldn\'t execute query');

// display what the person searched for
echo '<tr><td colspan="2" style="text-align:left">Su búsqueda fue: &quot;' . $search . '&quot;</td></tr>';

// begin to show results set
$count = 1 + $s ;

// now you can display the results returned
  while ($blog= mysql_fetch_array($result)) {
   	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	$categories1=mysql_query('SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
	$categories=mysql_fetch_array($categories1);
echo '<tr>
		<td style="vertical-align:top;"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td>
		<table class="table small-12 large-12 columns">
		<tbody>
		<tr><th><a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">'.$blog['subject'].'</a>
		</th>
		</tr>
		<tr>
		<td>
		Por: <strong>';
		echo '<a href="'.$config['pathto'].'profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a>';
		echo '</strong> el '.date('F j, Y, H:i:s',$blog['date']).' en la categoría <a href="index.php?cat='.$categories['id'].'">'.$categories['name'].'</a>.
		</td>
		</tr>
		<tr>
		<td>
		'.$blog['entry'].'
		</td>
		<tr>
		<td>
		<a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'">Leer más</a> | <a href="'.$config['pathto'].'index.php?entryid='.$blog['id'].'#comments">Leer comentarios / Escribir comentario</a>
		</td>
		</tr>
		</tbody>
		</table></td></tr>';
  }

$currPage = (($s/$limit) + 1);

//break before paging
  echo '</tbody></table>';

  // next we need to do the links to other results
  if ($s>=1) { // bypass PREV link if s is 0
  $prevs=($s-$limit);
  print '&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?&amp;s='.$prevs.'&q='.$search.'">&lt;&lt; 
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

  echo '&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?&amp;s='.$news.'&q='.$search.'">Próximos '.$limit.' &gt;&gt;</a>';
  }

$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
  echo '<p>Mostrando resultados '.$b.' a '.$a.' de '.$numrows.'</p>';

?>