<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php bloginfo(’name’);?></title>
		<link rel="stylesheet" href="<?php echo dirname(get_bloginfo('stylesheet_url'));?>/reset.css" type="text/css" media="all" charset="utf-8" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" type="text/css" media="screen" charset="utf-8" />
		<?php wp_head();?>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1><a href="<?php bloginfo('url');?>/"><?php bloginfo('name');?> &lt;<?php bloginfo('admin_email');?>&gt;</a></h1>
				<div id="menubar">
					<ul id="menu">
						<li><a href="<?php bloginfo('url');?>">Home</a></li>
						<?php wp_list_pages('title_li=&sort_column=post_title'); ?>
					</ul>
				</div>
			</div>
			<div id="content">
