<?php get_header();?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
        <?php include('entry.php');?>
        <?php comments_template(); ?>
	<?php endwhile;?>
<?php endif;?>
<?php get_footer();?>