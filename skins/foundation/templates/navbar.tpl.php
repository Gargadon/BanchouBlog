<!DOCTYPE html>
<html class="no-js" lang="es-mx">
  <head><meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="skins/foundation/css/normalize.css" />
  <link rel="stylesheet" href="skins/foundation/css/foundation.css" />
  <link rel="alternate" type="application/rss+xml" title="RSS" href="rss.php" />
  <script src="skins/foundation/js/vendor/custom.modernizr.js"></script>
    <link rel="shortcut icon" href="<?php echo $this->eprint($this->favicon); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $this->eprint($this->favicon); ?>">
    <title><?php echo $this->eprint($this->title); ?> (Powered by <?php echo $this->eprint($this->software); ?> version <?php echo $this->eprint($this->version); ?>)</title>
<meta name="description" content="<?php echo $this->eprint($this->description); ?>" />
<meta name="keywords" content="<?php echo $this->eprint($this->keywords); ?>" />
</head>
<body>
  <nav class="top-bar" data-topbar>
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="index.php"><?php echo $this->eprint($this->blogname); ?></a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
    <?php if(($this->group)==1) : ?>
<li class="has-dropdown"><a href="#">Administración</a>
        <ul class="dropdown">
        <li><a href="admin.php?action=config">Configurar blog</a></li>
		<li><a href="admin.php?action=reCAPTCHA">reCAPTCHA</a></li>
        <li><a href="admin.php?action=categories">Configurar categorías</a></li>
        <li><a href="admin.php?action=pages">Configurar páginas</a></li>
        <li><a href="admin.php?action=viewentries">Editar entradas</a></li>
        <li><a href="admin.php?action=newentry">Nueva entrada</a></li>
		<li><a href="admin.php?action=createuser">Crear usuarios</a></li>
<!--           <li><a href="admin.php?action=users">Modificar usuarios</a></li> -->
          </ul>
<?php endif; ?>
          <li class="has-dropdown"><a href="#">Categorías</a>
        <ul class="dropdown">
   <?php if (is_array($this->categories)): ?>
    <?php foreach ($this->categories as $key => $val): ?>
<li><a href="cat.php?id=<?php echo $this->eprint($val['id']); ?>"><?php echo $this->eprint($val['name']); ?></a></li>
    <?php endforeach; ?>
    <?php else: ?>
    <li><a href="#">No hay categorías</a></li>
        <?php endif; ?>
</ul></li><li class="has-dropdown"><a href="#">Páginas</a>
        <ul class="dropdown">
   <?php if (is_array($this->pages)): ?>
    <?php foreach ($this->pages as $key => $val): ?>
<li><a href="pages.php?id=<?php echo $this->eprint($val['id']); ?>"><?php echo $this->eprint($val['name']); ?></a></li>
    <?php endforeach; ?>
    <?php else: ?>
    <li><a href="#">No hay páginas</a></li>
        <?php endif; ?>
</ul></li>
<?php if(($this->logged)==1):  ?>
<li><a href="profile.php?id=<?php echo $this->eprint($this->myid); ?>"><img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($this->mymail))); ?>?s=30&amp;r=pg&amp;d=mm" alt="Avatar de <?php echo $this->eprint($this->myname); ?>" title="Avatar de <?php echo $this->eprint($this->myname); ?>" /> <?php echo $this->eprint($this->myname); ?></a></li>
<?php endif; ?>
<li class="divider"></li>
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
      <?php if(($this->logged)==1):  ?>
      <li><a href="logout.php">Logout</a>
      <?php else:  ?>
      <li><a href="#" data-reveal-id="loguear">Login</a>
      <?php endif; ?>
</li>
    </ul>
  </section>
</nav>
<br />
<div class="row">
  <div class="large-12 columns">

