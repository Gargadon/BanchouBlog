<?php
define('dwogame','1');
$config1 = mysqli_query($con,'SELECT * FROM blog_config');
$config = mysqli_fetch_array($config1);
date_default_timezone_set(''.$config['zona'].'');
// A continuación el login

if (isset($_COOKIE['gargauser']) and isset($_COOKIE['gargapass']))
{

    if (($_COOKIE['gargauser'] != ($usuarios['usuario'])) || ($_COOKIE['gargapass'] !=  md5($usuarios['password']))) {
        
        header('Location: logout.php');
    }
else {
$islogged=1; // Somos usuarios registrados
}
}
else
{
$islogged=0; // No somos usuarios registrados
}
// Termina login

//Obtenemos el grupo del user

?>
