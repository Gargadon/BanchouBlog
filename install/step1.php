<?php
// Primer paso de la instalación.

echo '<div class="small-12 large-12 columns">
<h3>Instalación de GargaBlog</h3>
<p>Bienvenido a GargaBlog. Este instalador fue realizado para que su experiencia sea sencilla de instalar.</p>
<p>Para continuar, oprima el botón "Siguiente" para instalar las tablas.</p>
<form action="install.php?step=2" method="post">
<input type="hidden" name="instala" value="1" />
<input type="submit" value="Siguiente" class="button secondary">
</form>';
?>