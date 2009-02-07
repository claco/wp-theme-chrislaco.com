<?php if ( have_comments() ) : ?>
<div class="comments">
    <h3 class="title">Comments</h3>
    <?php while(have_comments()):the_comment();?>
        <?php include('comment.php');?>
    <?php endwhile;?>
</div>
<?php endif; ?>

<hr />
<?php wp_list_comments('style=div'); ?>