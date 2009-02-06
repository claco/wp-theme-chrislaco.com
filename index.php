<?php get_header();?>
<?php query_posts('showposts=5&cat=-'.get_cat_id('manifesto'));?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
        <?php include('entry.php');?>
	<?php endwhile;?>
<?php endif;?>

<?php query_posts('showposts=5&offset=5&cat=-'.get_cat_id('manifesto'));?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
		<div class="entry recent">
			<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile;?>
<?php endif;?>

<?php get_footer();?>