<?php

// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
#require_once('../simplepie.inc');
// For 1.3+:
require_once('php/autoloader.php');

// We'll process this feed with all of the default options.
$feed = new SimplePie();

// Set the feed to process.
$feed->set_feed_url ('https://feedbin.me/starred/dEhGMt9RuFckElraF7RnzQ.xml');

// Run SimplePie.
$feed->init();

// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();

// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"


<html xmlns="
<head>
<title>RSS Goodies</title>

<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-69119943-1', 'auto');
 ga('send', 'pageview');

</script>

	<style type="text/css">
	body {
		font:12px/1.4em Futura, sans-serif;
		text-decoration:none;
		color:#2B3856;
		background-color:#ffffff;
		width:700px;
		margin:50px auto;
		padding:0;
	}

	a {
		color:#2B3856;
		text-decoration:none;
		padding:0 1px;
	}

	a:hover {
		color:#2B3856;
		text-decoration:none;
	}

	div.header {
		border-bottom:5px solid #2B3856;
	}

	div.header a:hover {
		text-decoration:underline;
	}

	div.itemtitle a {
		text-decoration:none;
	}
	div.description a {
		text-decoration:underline;
	}

	div.item {
		padding:5px 0;
		border-bottom:2px solid #2B3856;
	}
	img {
		margin-left:auto;
		margin-right:auto;
	}
	div.right {
		display:inline;
		float:right;
	}
	div.left {
		display:inline;
		float:left;
	}
	</style>



</head>
<body>

	<div class="header">
		<h1><a href="http://zackbatist.ca/rss" text-decoration:none>RSS Goodies</a></h1>
		<div style="text-align:left; display:inline-block"><h4>This page displays starred RSS items from feeds that I follow. Built using <a href="https://github.com/simplepie/simplepie/" text-decoration:none>SimplePie</a>.</h4></div>
		<div style="text-align:right; width:289px; display:inline-block"><h4><a href="http://zackbatist.ca">Zack Batist</a></h4></div>
	</div>

	<?php
	/*
	Here, we'll loop through all of the items in the feed, and $item represents the current item in the loop.
	*/
	foreach ($feed->get_items() as $item):
	?>

	<div class="item">
		<div class="posttitle">
			<h2><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h2>
		</div>
		<div class="author">
			<h3><?php echo $item->get_author()->get_name(); ?></h3>
		</div>
		<div class="description">
			<p><?php echo $item->get_description(); ?></p>
		</div>
			<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
		</div>
	</div>

	<?php endforeach; ?>

<hr size="3" color="#292e37" />

</body>
</html>
