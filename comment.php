<div class="<?php comment_type('comment', 'trackback', 'pingback'); ?><?php echo ($counter % 2 == 0) ? ' even' : ' odd'; ?><?php if ($comment->user_id): ?> author<?php endif; ?>">
    <div class="number"><?php echo $counter; ?></div>
    <div class="author">
        <?php if (get_comment_author_url()) : ?>
            <a href="<?php echo get_comment_author_url();?>"><?php echo get_avatar(get_comment_author_email(), 32);?></a>
        <?php else: ?>
            <?php echo get_avatar(get_comment_author_email(), 32);?>
        <?php endif; ?>
    </div>
    <div class="posted">
        On <?php comment_date(); ?> <?php comment_time(); ?>, <?php comment_author_link(); ?> wrote:
    </div>
    <div class="content">
        <?php comment_text(); ?>
    </div>
</div>