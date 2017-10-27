<?php

/**
 * Custom callback for outputting comments
 *
 * @return void
 * @author Keir Whitaker
 */
function dinipress_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<?php if ($comment->comment_approved == '1'): ?>
	<li class="media">
		<div class="media-left">
			<?php echo get_avatar($comment, 45); ?>
		</div>
		<div class="media-body">
			<em>
				<span class="media-heading"><?php comment_author_link()?>, </span>
				<time><a href="#comment-<?php comment_ID()?>" pubdate><?php comment_date()?> at <?php comment_time()?></a></time>
			</em>
			<?php comment_text()?>
		</div>
	<?php endif;
}

/* Securing commants */

add_filter( 'preprocess_comment', 'plc_comment_post', '', 1);
add_filter( 'comment_text', 'plc_comment_display', '', 1);
add_filter( 'comment_text_rss', 'plc_comment_display', '', 1);
add_filter( 'comment_excerpt', 'plc_comment_display', '', 1);
add_filter('comment_text', 'remove_rel_nofollow_attribute');
add_filter('comment_text', 'wptexturize');
add_filter('comment_text', 'convert_chars');
add_filter('comment_text', 'make_clickable', 9);
add_filter('comment_text', 'force_balance_tags', 25);
add_filter('comment_text', 'convert_smilies', 20);
add_filter('comment_text', 'wpautop', 30);

function plc_comment_post( $incoming_comment ) {
	$incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
	$incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
	return( $incoming_comment );
}
function plc_comment_display( $comment_to_display ) {
	$comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
	return $comment_to_display;
}
function remove_rel_nofollow_attribute($comment_text) {
	$comment_text = str_ireplace(' rel="nofollow"', '', $comment_text);
	$comment_text = str_ireplace('<script>', '', $comment_text);
	$comment_text = str_ireplace('</script>', '', $comment_text);
	return $comment_text;
}

