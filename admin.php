<?php
require("base.php");
include("header.php");
if ($islogged==1)
{
// A continuación debe ir lo que contendrá el módulo.
include('admin/index.php');
// Termina el módulo.
}
else{
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
}
include("footer.php");
require("close_session.php");
?>