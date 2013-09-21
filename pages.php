<?php
if(isset($_GET['action']) && $_GET['action']=='rss')
	include('includes/feed.php');
else
{
	require("base.php");
	include("header.php");
	include('includes/show_pages.php');

//include('includes/randomactions.php');
	include("footer.php");
require("close_session.php");
}
?>