<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article class="blog-post" id="post-<?php the_ID();?>" <?php post_class();?>>

<?php

if (is_single()) {
	the_title('<h1 class="entry-title">', '</h1>');
} elseif (is_front_page() && is_home()) {
	the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
} else {
	the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
}

if (is_sticky() && is_home()):
	echo dinipress_get_svg(array('icon' => 'thumb-tack'));
endif;
?>
	<header class="entry-header">
		<?php
if ('post' === get_post_type()) {
	echo '<div class="entry-meta">';
	if (is_single()) {
		dinipress_posted_on();
	} else {
		echo dinipress_time_link();
		dinipress_edit_link();
	}
	;
	echo '</div><!-- .entry-meta -->';
}

?>
	</header><!-- .entry-header -->

	<?php if ('' !== get_the_post_thumbnail() && !is_single()): ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink();?>">
				<?php the_post_thumbnail('dinipress-featured-image');?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif;?>

	<div class="entry-content">
		<?php
/* translators: %s: Name of current post */
the_content(sprintf(
	__('<button type="button" class="btn btn-secondary">Continue reading</button>', 'dinipress'),
	get_the_title()
));

wp_link_pages(array(
	'before' => '<div class="page-links">' . __('Pages:', 'dinipress'),
	'after' => '</div>',
	'link_before' => '<span class="page-number">',
	'link_after' => '</span>',
));
?>
	</div><!-- .entry-content -->

	<?php
if (is_single()) {
	dinipress_entry_footer();
}
?>

</article><!-- #post-## -->
