<?php if ( have_comments() ) : ?>
<a name="comments"></a>
<div class="comments">
    <h3 class="title">Comments</h3>
    <?php while(have_comments()):the_comment();?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
        <?php include('comment.php');?>
    <?php endwhile;?>
</div>
<?php endif; ?>