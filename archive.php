<?php get_header();?>

<?php // if (have_posts()): ?>
	<header class="jumbotron page-header" style="text-align: center;">
		<?php
the_archive_title('<h1 class="page-title">', '</h1>');
the_archive_description('<div class="taxonomy-description">', '</div>');
?>
	</header><!-- .page-header -->
<?php // endif;?>

<div class="container marketing">
	<div class="row">

	    <div class="col-sm-8 blog-main">

		<?php
if (have_posts()): ?>
			<?php
/* Start the Loop */
while (have_posts()): the_post();

	/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
	get_template_part('templates/post/content', get_post_format());

endwhile;

the_posts_pagination(array(
	'prev_text' => dinipress_get_svg(array('icon' => 'arrow-left')) . '<span class="screen-reader-text">' . __('Previous page', 'dinipress') . '</span>',
	'next_text' => '<span class="screen-reader-text">' . __('Next page', 'dinipress') . '</span>' . dinipress_get_svg(array('icon' => 'arrow-right')),
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'dinipress') . ' </span>',
));

else:

	get_template_part('templates/post/content', 'none');

endif;?>

		</div>

		<?php get_sidebar()?>

	</div>
</div>



<?php get_footer();