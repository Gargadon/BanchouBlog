	<?php
 if ($islogged==1)
 {
 $gravatar = md5(strtolower(trim($usuarios['email'])));
  		echo '<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="index.php">'.$config['name'].'</a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">';
    if($usuarios['group']==1)
    echo '<li class="has-dropdown"><a href="#">Administración</a>
        <ul class="dropdown">
        <li><a href="admin.php?action=config2">Configurar blog</a></li>
        <li><a href="admin.php?action=categories">Configurar categorías</a></li>
        <li><a href="admin.php?action=pages">Configurar páginas</a></li>
          <li><a href="admin.php?action=config">Editar entradas</a></li>
          <li><a href="admin.php?action=newentry">Nueva entrada</a></li>
	 <li><a href="admin.php?action=createuser">Crear usuarios</a></li>
          <li><a href="admin.php?action=users">Modificar usuarios</a></li>
          </ul>';
echo '<li class="has-dropdown"><a href="#">Categorías</a>
        <ul class="dropdown">';
$cats1 = mysql_query('SELECT * FROM blog_cats ORDER BY \'id\' DESC');
while($cats = mysql_fetch_array($cats1))
{
echo '<li><a href="index.php?cat='.$cats['id'].'">'.$cats['name'].'</a></li>';
}
    echo '</ul></li>';
echo '<li class="has-dropdown"><a href="#">Páginas</a>
        <ul class="dropdown">';
$pages1 = mysql_query('SELECT * FROM blog_pages ORDER BY \'id\' DESC');
while($pages = mysql_fetch_array($pages1))
{
echo '<li><a href="pages.php?id='.$pages['id'].'">'.$pages['subject'].'</a></li>';
}
    echo '</ul></li>';
    echo '<li><a href="profile.php?id='.$usuarios['id'].'"><img src="http://www.gravatar.com/avatar/'.$gravatar.'?s=30&amp;r=pg&amp;d=mm" alt="Avatar de '. $usuarios['usuario'] .'" title="Avatar de '. $usuarios['usuario'] .'" /> '.$usuarios['usuario'].'</a></li><li class="divider"></li>
    </ul>

    <!-- Right Nav Section -->
    <ul class="right">

      <li class="divider"></li>
      <li class="has-form">
        <form action="search.php" method="get">
          <div class="row collapse">
            <div class="small-8 columns">
              <input type="text" name="q">
            </div>
            <div class="small-4 columns">
              <input type="submit" class="alert button" value="Buscar" />
            </div>
          </div>
        </form>
      </li>
      <li class="divider hide-for-small"></li>
      <li><a href="logout.php">Logout</a>
</li>
    </ul>
  </section>
</nav>
';
 }
 else
 { 		echo '<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="index.php">'.$config['name'].'</a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">';
    echo '<li class="has-dropdown"><a href="#">Categorías</a>
        <ul class="dropdown">';
$cats1 = mysql_query('SELECT * FROM blog_cats ORDER BY \'id\' DESC');
while($cats = mysql_fetch_array($cats1))
{
echo '<li><a href="index.php?cat='.$cats['id'].'">'.$cats['name'].'</a></li>';
}
    echo '</ul></li>';
echo '<li class="has-dropdown"><a href="#">Páginas</a>
        <ul class="dropdown">';
$pages1 = mysql_query('SELECT * FROM blog_pages ORDER BY \'id\' DESC');
while($pages = mysql_fetch_array($pages1))
{
echo '<li><a href="pages.php?id='.$pages['id'].'">'.$pages['subject'].'</a></li>';
}
    echo '</ul></li><li class="divider"></li>
    </ul>

    <!-- Right Nav Section -->
    <ul class="right">

      <li class="divider"></li>
      <li class="has-form">
        <form action="search.php" method="get">
          <div class="row collapse">
            <div class="small-8 columns">
              <input type="text" name="q">
            </div>
            <div class="small-4 columns">
              <input type="submit" class="alert button expand" value="Buscar" />
            </div>
          </div>
        </form>
      </li>
      <li class="divider hide-for-small"></li>
      <li><a href="#" data-reveal-id="loguear">Login</a>
</li>
    </ul>
  </section>
</nav>
';}
?>