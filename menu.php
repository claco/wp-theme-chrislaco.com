<ul class="menu">
	<li><a title="Home" href="<?php bloginfo('url');?>">Home</a></li
	><li><a title="Articles" href="<?php bloginfo('url');?>/articles/">Articles</a></li
    ><li><a title="Manifesto" href="<?php bloginfo('url');?>/manifesto/">Manifesto</a></li
	><?php echo pages_list_items(); ?><li class="feed" title="Atom/RSS Feed"><a href="<?php bloginfo('atom_url'); ?>">Feed</a><img src="<?php bloginfo('template_directory'); ?>/images/feed-icon_green-12px.png" alt="RSS/Atom Feed" /></li>
</ul>