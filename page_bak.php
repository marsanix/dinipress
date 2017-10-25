<?php get_header();?>

<div class="jumbotron page-header" style="text-align: center;">
	<?php
$menu_items = wp_get_nav_menu_items('main-menu');
$this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));
echo '<h1>' . $this_item->title . '</h1>';
?>
</div>


<div class="container marketing">
	<div class="row">

	    <div class="col-sm-8 blog-main">

					<?php
while (have_posts()): the_post();

	get_template_part('templates/page/content', 'page');

	// If comments are open or we have at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()):
		comments_template();
	endif;

endwhile; // End of the loop.
?>

</div>

		<?php get_sidebar()?>

	</div>
</div>


<?php get_footer();?>
