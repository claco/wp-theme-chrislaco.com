<?php get_header();?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
        <?php include('entry.php');?>
	<?php endwhile;?>
<?php endif;?>
<?php get_footer();?>