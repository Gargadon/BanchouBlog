<?php
// Primer paso de la instalación.

echo '<div class="small-12 large-12 columns">
<h3>Instalación de GargaBlog</h3>';
$ckeditor = 'http://www.gargadon.info/gargablog/files/ckeditor-for-gargablog.tar.gz';
file_put_contents('ckeditor-for-gargablog.tar.gz', file_get_contents($ckeditor));
if(file_exists('ckeditor-for-gargablog.tar.gz'))
{
	if(md5_file('ckeditor-for-gargablog.tar.gz') == '1ec4035bb6505768dc7099f0c2003c91')
	{
		$p = new PharData('ckeditor-for-gargablog.tar.gz');
		$p -> decompress();
		if(file_exists('ckeditor-for-gargablog.tar'))
		{
			$phar = new PharData('ckeditor-for-gargablog.tar');
			$phar -> extractTo('.');
			unlink('ckeditor-for-gargablog.tar.gz');
			unlink('ckeditor-for-gargablog.tar');
			echo '<p>Se ha instalado exitosamente CKEditor.</p>
			<p>Para continuar, oprima el botón "Siguiente" para instalar las tablas.</p>	
			<form action="install.php?step=3" method="post">
			<input type="hidden" name="instala" value="1" />
			<input type="submit" value="Siguiente" class="button secondary">
			</form>';
		}
		else
		{
			echo '<p>No se pudo descomprimir CKEditor.</p>
			<p>Por favor, habilite la extensión PHAR y ponga la variable <em>phar.readonly</em> en <em>0</em> en su archivo <strong>php.ini</strong></p>
			<p>Si por alguna razón no puede modificar dicho archivo, consulte a su administrador del servidor.</p>
			<p>En caso contrario, todavía puede instalar CKEditor de forma manual, descargándolo <a href="'.$ckeditor.'" target="_blank">aquí</a>.
			Extraiga el .tar.gz y coloque la carpeta <em>ckeditor</em> en el directorio principal de GargaBlog.</p>';
		}
	}
	else
	{
		echo '<p>El archivo no se ha descargado correctamente, o está corrupto.</p>';
	}
}
else
{
echo '<p>El archivo no pudo ser descargado. Por favor revise que tenga los permisos correspondientes en el directorio de instalación.</p>
<p>Si no puede modificar los permisos del directorio, comuníquese con el administrador del servidor.</p>
<p>En caso contrario, todavía puede instalar CKEditor de forma manual, descargándolo <a href="'.$ckeditor.'" target="_blank">aquí</a>.
Extraiga el .tar.gz y coloque la carpeta <em>ckeditor</em> en el directorio principal de GargaBlog.</p>';
}
?>