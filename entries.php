<?php if(have_posts()):?>
    <div class="<?php echo $class; ?>">
	<?php while(have_posts()):the_post();?>
        <?php get_entry($excerpts);?>
	<?php endwhile;?>
	</div>
<?php endif;?>