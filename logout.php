<?php
setcookie("gargauser", "", time()-60*60*24*365, "/", "www.gargadon.info");
setcookie("gargapass", "", time()-60*60*24*365, "/", "www.gargadon.info");
setcookie("PHPSESSID","",time()-3600,"/");
require("base.php");
header('Location: index.php');
?>