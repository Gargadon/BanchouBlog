<?php
// Primer paso de la instalación.

echo '<div class="small-12 large-12 columns">
<h3>Instalación de GargaBlog</h3>
<p>Bienvenido a GargaBlog. Este instalador fue realizado para que su experiencia sea sencilla de instalar.</p>
<p>A partir de GargaBlog 0.4.7, CKEditor no viene incluido en el instalador. Pulse el botón "Siguiente"
para descargarlo directamente al servidor.</p>	
<form action="install.php" method="get">
<input type="hidden" name="step" value="2" />
<input type="submit" value="Siguiente" class="button secondary">
</form>';
?>