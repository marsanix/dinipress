<?php get_header();?>

<div class="jumbotron page-header" style="text-align: center;">
	<?php
$menu_items = wp_get_nav_menu_items('main-menu');
$this_item = current(wp_filter_object_list($menu_items, array('object_id' => get_queried_object_id())));
echo '<h1>' . $this_item->title . '</h1>';
?>
</div>

<div class="container">
  <div class="row">

    <div class="<?php if (is_active_sidebar('sidebar-widget-area')): ?>col-sm-8<?php else: ?>col-sm-12<?php endif;?>">
      <div id="content" role="main">

		<?php get_template_part('templates/page/content', 'page'); ?>

      </div><!-- /#content -->
    </div>

    <div class="col-sm-4" id="sidebar" role="navigation">
       <?php get_sidebar();?>
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer();?>
