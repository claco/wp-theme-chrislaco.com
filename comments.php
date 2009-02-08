<a name="comments"></a>
<div class="comments">
    <h3 class="title">Comments (<a id="comment-add" href="#commentsform">Add</a>)</h3>
    <?php if ( have_comments() ) : ?>
        <?php while(have_comments()):the_comment();?>
            <?php include('comment.php');?>
        <?php endwhile;?>
    <?php else: ?>
    <p>There are no comments yet!</p>
    <?php endif; ?>
</div>
<a name="commentsform"></a>
<div id="comment-form" class="comment-form">
    <?php include('comment-form.php'); ?>
</div>
