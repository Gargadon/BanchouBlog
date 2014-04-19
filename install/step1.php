<?php
// Primer paso de la instalación.

echo '<div class="small-12 large-12 columns">
<h3>'.__('Instalación de GargaBlog').'</h3>
<p>'.__('Bienvenido a GargaBlog. Este instalador fue realizado para que su experiencia sea sencilla de instalar.').'</p>
<p>'.__('A partir de GargaBlog 0.4.7, CKEditor no viene incluido en el instalador. Pulse el botón "Siguiente"
para descargarlo directamente al servidor.').'</p>	
<form action="install.php" method="get">
<input type="hidden" name="step" value="2" />
<input type="submit" value="'.__('Siguiente').'" class="button secondary">
</form>';
?>