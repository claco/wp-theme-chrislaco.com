<?php
/**
 * Handles Comment Post to WordPress and prevents duplicate comment posting.
 *
 * @package WordPress
 */

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
	header('Allow: POST');
	header('HTTP/1.1 405 Method Not Allowed');
	header('Content-Type: text/plain');
	exit;
}

/** Sets up the WordPress Environment. */
require( '../../../wp-load.php' );

nocache_headers();

$comment_post_ID = (int) $_POST['comment_post_ID'];

$status = $wpdb->get_row( $wpdb->prepare("SELECT post_status, comment_status FROM $wpdb->posts WHERE ID = %d", $comment_post_ID) );

if ( empty($status->comment_status) ) {
	do_action('comment_id_not_found', $comment_post_ID);
	fail('The post you are trying to comment on does not curently exist in the database.');
} elseif ( !comments_open($comment_post_ID) ) {
	do_action('comment_closed', $comment_post_ID);
	fail(__('Sorry, comments are closed for this item.'));
} elseif ( in_array($status->post_status, array('draft', 'pending') ) ) {
	do_action('comment_on_draft', $comment_post_ID);
	fail(__('The post you are trying to comment on has not been published yet.'));
}

$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
$comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

// If the user is logged in
$user = wp_get_current_user();
if ( $user->ID ) {
	if ( empty( $user->display_name ) )
		$user->display_name=$user->user_login;
	$comment_author       = $wpdb->escape($user->display_name);
	$comment_author_email = $wpdb->escape($user->user_email);
	$comment_author_url   = $wpdb->escape($user->user_url);
	if ( current_user_can('unfiltered_html') ) {
		if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
			kses_remove_filters(); // start with a clean slate
			kses_init_filters(); // set up the filters
		}
	}
} else {
	if ( get_option('comment_registration') )
		fail( __('Sorry, you must be logged in to post a comment.') );
}

$comment_type = '';

if ( get_option('require_name_email') && !$user->ID ) {
	if ( 6 > strlen($comment_author_email) || '' == $comment_author )
		fail( __('Error: please fill the required fields (name, email).') );
	elseif ( !is_email($comment_author_email))
		fail( __('Error: please enter a valid email address.') );
}

if ( '' == $comment_content )
	fail( __('Error: please type a comment.') );

$dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
if ( $comment_author_email )
	$dupe .= "OR comment_author_email = '$comment_author_email' ";
$dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
if ( $wpdb->get_var($dupe) )
	fail( __('Duplicate comment detected; it looks as though you\'ve already said that!') );

if ( strlen($_POST['recaptcha_response_field']) == 0 ) {
    fail(__('Error: reCaptcha value is required.'));
} elseif ( strlen($_POST['recaptcha_challenge_field']) == 0 ) {
    fail('Error: reCaptcha challenge is missing or invalid.');
} else {
	$response = recaptcha_check_answer($recaptcha_opt['privkey'],
		$_SERVER['REMOTE_ADDR'],
		$_POST['recaptcha_challenge_field'],
		$_POST['recaptcha_response_field']
	);

    if (!$response->is_valid) {
        fail('Error: captcha error (' . $response->error . ')');
    }
};

$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;

$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

$comment_id = wp_new_comment( $commentdata );

$comment = get_comment($comment_id);
if ( !$user->ID ) {
	setcookie('comment_author_' . COOKIEHASH, $comment->comment_author, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
	setcookie('comment_author_email_' . COOKIEHASH, $comment->comment_author_email, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
	setcookie('comment_author_url_' . COOKIEHASH, clean_url($comment->comment_author_url), time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
}

function fail($s) {
	header('HTTP/1.0 500 Internal Server Error');
	echo $s;
	exit;
}
?>
