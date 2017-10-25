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

if (is_sticky() && is_home()):
	echo dinipress_get_svg(array('icon' => 'thumb-tack'));
endif;
?>

	<div class="row">

		<div class="col-6">
			<?php if ('' !== get_the_post_thumbnail() && !is_single()): ?>
				<div class="post-thumbnail">
					<a href="<?php the_permalink();?>">
						<?php the_post_thumbnail('dinipress-featured-image');?>
					</a>
				</div><!-- .post-thumbnail -->
			<?php endif;?>
		</div>
		<div class="col-6">

			<header class="entry-header">

	<?php

if (is_single()) {
	the_title('<h1 class="entry-title">', '</h1>');
} elseif (is_front_page() && is_home()) {
	the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
} else {
	the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
}

?>
	<h6>
      <em>
        <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>" pubdate><?php dinipress_the_time()?>, </time>
        <span class="text-muted author"><?php _e('By', 'dinipress');
echo " ";
the_author()?></span>
      </em>
      <?php dinipress_edit_link()?>
    </h6>

	</header><!-- .entry-header -->

	<section class="entry-content">

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
	</section>

<!-- 	<footer>
      <p class="text-muted" style="margin-bottom: 20px;">
        <i class="fa fa-folder-open-o"></i>&nbsp;
        <?php _e('Category', 'dinipress');?>:
        <?php the_category(', ')?>&nbsp;&nbsp;&nbsp;
        <i class="fa fa-comment-o"></i>&nbsp;
        <?php _e('Comments', 'dinipress');?>:
        <?php comments_popup_link(__('Leave a Comment', 'dinipress'), __('1', 'dinipress'), __('%', 'dinipress'));?>
        <?php // comments_popup_link(__('None', 'dinipress'), '1', '%');?>
      </p>

      	<?php
if (is_single()) {
	dinipress_entry_footer();
}
?>

    		</footer> -->
    	</div>
	</div>

</article><!-- #post-## -->

<?php if (function_exists('b4st_pagination')) {b4st_pagination();} else if (is_paged()) {?>
<ul class="pagination">
<li class="page-item older">
  <?php next_posts_link('<i class="fa fa-arrow-left"></i> ' . __('Previous', 'b4st'))?></li>
<li class="page-item newer">
  <?php previous_posts_link(__('Next', 'b4st') . ' <i class="fa fa-arrow-right"></i>')?></li>
</ul>
<?php }?>

