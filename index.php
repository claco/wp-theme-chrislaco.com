<?php get_header();?>

<?php query_posts('showposts=1&cat=-'.get_cat_id('manifesto'));?>
<?php get_entries(); ?>

<?php query_posts('showposts=5&offset=1&cat=-'.get_cat_id('manifesto'));?>
<?php get_entries(1, 'entries recent'); ?>

<?php get_footer();?>