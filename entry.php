<?php $tags = get_the_tags(); ?>
<div class="entry<?php echo ($recent) ? ' recent' : ''; ?>">
	<h2 class="title"><a title="Continue reading <?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	<ul class="extras">
		<li class="posted"><?php the_time('l, F jS, Y');?></li
		><li class="comments"><a title="View comments about <?php the_title();?>" href="<?php comments_link(); ?>">Comments (<?php comments_number('0', '1', '%'); ?>)</a></li
		><li class="category"><?php if (the_category(', '))  the_category(); ?></li
		><?php if ($tags):?><li class="tags"><a title="View tags for <?php the_title();?>" href="#">Tags (<?php echo count($tags);?>)</a
		><?php if ($tags):?><ul class="tags"
		><?php foreach ($tags as $tag) { ?>
		    <li class="tag"><a title="View entries tagged with <?php echo $tag->name;?>" href="<?php bloginfo('url');?>/tag/<?php echo $tag->slug;?>/"><?php echo $tag->name;?></a></li>
		<?php }; ?></ul><?php endif;?></li><?php endif;?>
	</ul>
	<div class="content">
	    <?php ($excerpts) ? the_excerpt() : the_content('More...'); ?>
	</div>
</div>
