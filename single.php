<?php get_header();?>
<?php if(have_posts()):?>
	<?php while(have_posts()):the_post();?>
        <?php get_entry(); ?>
        <?php comments_template(); ?>
	<?php endwhile;?>
<?php endif;?>
<?php get_footer();?>