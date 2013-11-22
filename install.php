<?php
require('base.php');

echo '<!DOCTYPE html>
<html class="no-js" lang="es-mx">
  <head><meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<meta name="viewport" content="width=device-width" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://www.gargadon.info/gargablog/css/normalize.css" />
  <link rel="stylesheet" href="http://www.gargadon.info/gargablog/css/foundation.css" />
  <script src="http://www.gargadon.info/gargablog/js/vendor/custom.modernizr.js"></script>
 <title>GargaBlog Installer</title></head>
  <body>
 	<nav class="top-bar" data-topbar data-options="is_hover:false">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="index.php">GargaBlog</a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
      <li class="divider"></li>
    </ul>

    <!-- Right Nav Section -->
    <ul class="right">

      <li class="divider"></li>

    </ul>
  </section>
</nav><div class="row">';
mysql_connect($dwo_server,$dwo_user,$dwo_pass)or die(mysql_error().'<div class="small-12 large-12 columns"><p>No se ha podido contactar a la base de datos.</p>
<p>Revise el archivo base.php para verificar que los datos de conexión son correctos.</p></div></div>
<script src="http://www.gargadon.info/gargablog/js/vendor/jquery.js"></script>
<script src="http://www.gargadon.info/gargablog/js/all.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>');
mysql_select_db($dwo_base)or die(mysql_error().'<div class="small-12 large-12 columns"><p>No se ha podido contactar a la tabla especificada.</p>
<p>Revise el archivo base.php para verificar que los datos de conexión son correctos.</p>
<script src="http://www.gargadon.info/gargablog/js/vendor/jquery.js"></script>
<script src="http://www.gargadon.info/gargablog/js/all.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>');
$step=$_GET['step'];
switch($step)
{
	case 1:
	include('install/step1.php');
	break;
	
	case 2:
	include('install/step2.php');
	break;
	
	case 3:
	include('install/step3.php');
	break;
	
	case 4:
	include('install/step4.php');
	break;
	
	default:
	include('install/step1.php');
	break;
}
echo '</div></div><script>
  document.write(\'<script src=js/vendor/\'
    + (\'__proto__\' in {} ? \'zepto\' : \'jquery\')
    + \'.js><\/script>\');
</script>
<script src="http://www.gargadon.info/gargablog/js/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
</body>
</html>';

require('close_session.php');
?>