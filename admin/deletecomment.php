<?php
if(isset($_GET['comment_id']))
{
$datos1 = mysqli_query($con, 'SELECT entry_id,type FROM blog_comments WHERE id=\''.$_GET['comment_id'].'\'');
$datos = mysqli_fetch_array($datos1);
mysqli_query($con,'DELETE FROM blog_comments WHERE id=\''.$_GET['comment_id'].'\'');
if($datos['type'] =='entry')
	{
	header('Location: view.php?id='.$datos['entry_id'].'#comments');
	die();
	}
else
	{
	header('Location: pages.php?id='.$datos['entry_id'].'#comments');
	die();
	}
}
else
{
	header("Location: index.php");
	die();
}
?>