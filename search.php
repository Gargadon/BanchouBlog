<?php
error_reporting(E_ALL ^ E_NOTICE);
	require("base.php");
	require("db.php");
	require("header.php");
	require("Savant3.php");
	$tpl = new Savant3();
	include("navbar.php");
// A continuación debe ir lo que contendrá el módulo.

 // Get the search variable from URL
 $name = $config["name"]." - Búsqueda";
  $search = htmlspecialchars($_GET['q']);
  $tpl->search = $search;
  $s = $_GET['s'];
  $tpl->s = $s;
  $trimmed = trim($search); //trim whitespace from the stored variable
  $tpl->trimmed = $trimmed;
  $mylocation = $usuarios['location'];
// rows to return
$limit=5; 
$tpl->limit = $limit;

// check for an empty string and display a message.

// check for a search parameter


// Build SQL Query

		if ($trimmed == "*")
		{
		$query = "select * from blog_entry order by id DESC";
		}
		else
		{
		$query = "select * from blog_entry where entry like \"%$trimmed%\" order by id DESC";
		}



 $numresults = mysqli_query($con,$query);
 $numrows = mysqli_num_rows($numresults);
 $tpl->numrows = $numrows;

// If we have no results, offer a google search as an alternative

// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  $tpl->s = 0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysqli_query($con,$query) or die('Couldn\'t execute query');

// display what the person searched for

// begin to show results set
$count = 1 + $s ;
$contador = 1;
// now you can display the results returned
  while ($blog= mysqli_fetch_array($result)) {
   	$recprofile1 = mysqli_query($con,'SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysqli_fetch_array($recprofile1);
	$categories1=mysqli_query($con,'SELECT * FROM blog_cats WHERE id=\''.$blog['cat_id'].'\'');
	$categories=mysqli_fetch_array($categories1);
	
	$viewentries[$contador] = array(
	'entry_id' => $blog['id'],
	'author_id' => $blog['author'],
        'author' => $recprofile['usuario'],
        'title' => $blog['subject'],
        'avatar' => 'http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm',
        'date' => date('F j, Y, H:i:s',$blog['date']),
        'cat_id' => $blog['cat_id'],
	'category' => $categories['name'],
	'entry_content' => $blog['entry']
    );
$contador++;
}


$currPage = (($s/$limit) + 1);

//break before paging


  // next we need to do the links to other results
  if ($s>=1) { // bypass PREV link if s is 0
  $prevs=($s-$limit);
  $tpl->prevs = $prevs;
  $tpl->moreresults = 1;
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
  $tpl->lastpage = 0;
  // not last page so give NEXT link
  $news=$s+$limit;
  $tpl->news = $news;

  }

$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
  $tpl->a = $a;
  $tpl->b = $b;
  

$tpl->title = $name;
$tpl->entries = $viewentries;
$tpl->display('skins/'.$config['skin'].'/templates/navbar.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/search.tpl.php');
$tpl->display('skins/'.$config['skin'].'/templates/footer.tpl.php');
?> 
