<?php if ('open' == $post->comment_status) : ?>
    <div id="respond">
        <h3 class="title"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <div class="status">&nbsp;</div>
                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                <label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

                <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                <label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

                <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                <label for="url"><small>Website</small></label></p>

                <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

                <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></p>

                <?php do_action('comment_form', $post->ID); ?>
            </form>
        <?php endif; ?>
    </div>
<?php endif; ?>