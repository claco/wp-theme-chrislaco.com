<div class="entry">
	<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	<ul class="extras">
		<li class="posted"><?php the_time('l, F jS, Y');?></li
		><li class="comments"><a href="<?php comments_link(); ?>">Comments (<?php comments_number('0', '1', '%'); ?>)</a></li
		><li class="category"><?php if (the_category(', '))  the_category(); ?></li
		><?php if (get_the_tags()):?><li class="tags"><a href="#">Tags</a></li><?php endif;?>
	</ul>
	<?php if (get_the_tags()):?>
	<ul class="tags">
		<?php the_tags('<li class="tag">','</li><li class="tag">','</li>');?>
	</ul>
	<?php endif;?>
	<?php the_content('More...'); ?>
</div>
