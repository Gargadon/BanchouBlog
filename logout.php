<?php
require("base.php");
setcookie("gargauser", "", time()-60*60*24*365, $folder, $path);
setcookie("gargapass", "", time()-60*60*24*365, $folder, $path);
setcookie("PHPSESSID","",time()-3600,"/");
header('Location: index.php');
?>