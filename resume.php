<?php
/*
Template Name: Resume
*/
?>
<?php get_header();?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
		<div class="post">
			<div class="content">
				<?php the_content();?>
			</div>
			<?php if (get_the_tags()):?>
			<div class="tags">
				Tags: <?php the_tags('<div class="tag">','</div><div class="tag">','</div>');?>
			</div>
			<?php endif;?>
		</div>
	<?php endwhile;?>
<?php endif;?>
<?php get_footer();?>