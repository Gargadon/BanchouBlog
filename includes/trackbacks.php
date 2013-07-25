<?php
$trackback1 = mysql_query('SELECT * FROM blog_trackback WHERE post_id=\''.$entryid.'\' ORDER BY `id` ASC');
	echo '<div class="row">
	<div class="large-12 columns">
	<h5>Trackbacks</h5></div>';
	if(mysql_num_rows($trackback1)==0)
		{
		echo '<div class="large-12 columns">Nadie ha hablado de este tema. Si deseas hablar de este tema en tu blog,
		será un honor que uses nuestro trackback.</div>';
		}
	while($trackback=mysql_fetch_array($trackback1))
	{
	echo '<div class="large-12 columns"><table>
	<tbody>
	<tr>
	<td>Por:
	<strong><a href="'.$trackback['url'].'" target="_blank" rel="external nofollow">'.$trackback['blog_name'].' - '.$trackback['title'].'</a></strong>';
		echo ' el '.date('F j, Y, H:i:s',$trackback['date']).'.</td>
		</tr>
		<tr>
		<td>'.nl2br(htmlspecialchars($trackback['content'])).'</td>
		</tr></tbody>
	</table></div>';
	}
	echo '</div>
	';
?>