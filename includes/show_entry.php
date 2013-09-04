<?php
echo '
<table>
<tbody>';
	$entryid = $_GET['entryid'];
	$blog1 = mysql_query('SELECT * FROM blog_entry WHERE id=\''.$entryid.'\'');
	$blog = mysql_fetch_array($blog1);
	if(empty($blog['id']))
	echo '<tr><td>La entrada no existe</td></tr>';
	else
		{
	$recprofile1 = mysql_query('SELECT usuario,email FROM blog_usuarios WHERE id=\''.$blog['author'].'\'');
	$recprofile = mysql_fetch_array($recprofile1);
	$comment1 = mysql_query('SELECT * FROM blog_comment WHERE id_entry=\''.$entryid.'\' ORDER BY `id` ASC');
		echo '<tr><td style="vertical-align:top;width:80px;"><img src="http://www.gravatar.com/avatar/'.md5($recprofile['email']).'?s=80&amp;r=pg&amp;d=mm" alt="Avatar de '. $recprofile['usuario'] .'" title="Avatar de '. $recprofile['usuario'] .'" /></td><td style="vertical-align:top;">';
                echo '<table class="table small-12 large-12 columns"><tbody><tr>
		<th>
		<h4>'.$blog['subject'].'</h4>
		</th>
		</tr>
		<tr>
		<td>
		Por: <strong>';
		echo '<a href="'.$config['pathto'].'profile.php?id='.$blog['author'].'">'.$recprofile['usuario'].'</a>';
		echo '</strong> el '.date('F j, Y, H:i:s',$blog['date']).'.
		</td>
		</tr>
		<tr>
		<td>';
		echo $blog['entry'];
		echo '</td>
		</tr>
                </tbody>
                </table>
		<tr>
		<td colspan="2">
		<div class="row">
<div class="large-12 columns">
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-7e6c322b-dba2-5740-1c15-f3b2de936596", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "ur-7e6c322b-dba2-5740-1c15-f3b2de936596", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
		<a href="">Permalink</a> | ';
		if($usuarios['group']==1)
		echo '<a href="admin.php?id=blog&action=editentry&entryid='.$blog['id'].'">Editar entrada</a> | ';
		echo '<a href="#comments">Leer comentarios / Escribir comentario</a> | <a href="index.php">Regresar al índice</a></div></div></td></tr>
<tr><td colspan="2"><strong>Trackback:</strong><br /><div class="well well-small">'.$config['pathto'].'trackback.php?id='.$blog['id'].'</div>
</td></tr>';
		echo '</tbody>
		</table>
		<br />';
		include('includes/trackbacks.php');
		
		echo '<br /><div class="row">
		<div class="large-12 columns"><a name="comments"></a><h5>Leer comentarios</h5></div>
		    <div id="disqus_thread" class="large-12 columns"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = \''.$config['disqusname'].'\'; // required: replace example with your forum shortname

        /* * * DON\'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
            dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
            (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
 ';

		echo '<br />';
		}
?>