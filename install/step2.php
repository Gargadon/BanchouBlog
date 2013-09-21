<?php
// Primer paso de la instalación.

echo '<div class="small-12 large-12 columns">
<h3>Instalación de GargaBlog</h3>';
$ckeditor = 'http://www.gargadon.info/files/ckeditor-for-gargablog.tar.gz';
$archivo = 'ckeditor-for-gargablog.tar.gz';
file_put_contents('.$archivo.', file_get_contents('.$ckeditor.'));
if(file_exists($archivo))
{
	if(md5_file($archivo) == '1ec4035bb6505768dc7099f0c2003c91')
	{
		$p = new PharData($archivo);
		$p -> decompress();
		$phar = new PharData($archivo.'.tar');
		$phar -> extractTo('.');
		echo '<p>Se ha instalado exitosamente CKEditor.</p>
		<p>Para continuar, oprima el botón "Siguiente" para instalar las tablas.</p>	
		<form action="install.php?step=3" method="post">
		<input type="hidden" name="instala" value="1" />
		<input type="submit" value="Siguiente" class="button secondary">
		</form>';
	}
	else
	{
		echo '<p>El archivo no se ha descargado correctamente, o está corrupto.</p>';
	}
}
else
{
echo '<p>El archivo no pudo ser descargado. Por favor revisa que tengas los permisos correspondientes en el directorio de instalación.</p>
<p>Si no puedes modificar los permisos del directorio, comunícate con el administrador del servidor.</p>';
}
?>