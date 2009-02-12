<?php get_header();?>

<?php $description = trim(strip_tags(category_description())); ?>
<?php if ($description) : ?>
    <div class="description">
        <?php echo $description; ?>
    </div>
<?php endif; ?>
<?php get_entries(); ?>

<?php get_footer();?>