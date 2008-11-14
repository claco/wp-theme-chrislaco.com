<?php
/*
Template Name: Manifesto
*/
?>
<?php get_header();?>
<?php query_posts('cat=10');?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
		<div class="post manifest">
			<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<div class="date">
				<?php the_time('F jS, Y');?>
			</div>
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