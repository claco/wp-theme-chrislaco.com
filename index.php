<?php get_header();?>
<?php query_posts('showposts=1&cat=-'.get_cat_id('manifesto'));?>
<?php if(have_posts()):?>
    <div id="introduction">
	<?php while(have_posts()):the_post();?>
	    <?php $more=1 ?>
		<div class="entry">
			<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
    		<ul class="extras">
    			<li class="posted"><?php the_time('l, F jS, Y');?></li
    			><li class="comments"><a href="">Comments</a></li
    			><li class="category"><?php if (the_category(', '))  the_category(); ?></li
    			><?php if (get_the_tags()):?><li class="tags"><a href="#">Tags</a></li><?php endif;?>
    		</ul>
    		<?php if (get_the_tags()):?>
    		<ul class="tags">
    			<?php the_tags('<li class="tag">','</li><li class="tag">','</li>');?>
    		</ul>
    		<?php endif;?>
			<?php the_content();?>
		</div>
	<?php endwhile;?>
	</div>
<?php endif;?>

<?php query_posts('showposts=5&offset=1&cat=-'.get_cat_id('manifesto'));?>
<?php if(have_posts()):?>
    <div id="recent">
	<?php while(have_posts()):the_post();?>
	    <?php $more=0 ?>
		<div class="entry">
			<h2 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php the_content();?>
		</div>
	<?php endwhile;?>
	</div>
<?php endif;?>

<?php get_footer();?>