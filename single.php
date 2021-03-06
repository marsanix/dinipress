<?php get_header();?>

<header class="jumbotron page-header" style="text-align: center;">
	<h1 class="page-title"><?php the_category(' <li class="fa fa-angle-right"></li> ')?></h1>
</header>

<div class="container">
  <div class="row">

    <div class="<?php if (is_active_sidebar('sidebar-widget-area')): ?>col-sm-8<?php else: ?>col-sm-12<?php endif;?>">
      <div id="content" role="main">
        <?php get_template_part('templates/post/content', 'single');?>
      </div><!-- /#content -->
    </div>

    <div class="col-sm-4" id="sidebar" role="navigation">
       <?php get_sidebar();?>
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer();?>
