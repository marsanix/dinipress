<!doctype html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/favicon.ico">

    <title>
    <?php wp_title('|', true, 'right');?>
    <?php bloginfo('name');?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awasome icon -->
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <?php
if (is_singular() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}
?>

    <?php wp_head();?>

  </head>
  <body>

    <header>
      <!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> -->
      <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><?php bloginfo('name');?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php
wp_nav_menu(array(
	'menu' => 'primary',
	'theme_location' => 'primary',
	'depth' => 5,
	'container' => false,
	'menu_class' => 'nav navbar-nav mr-auto',
	'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
	'walker' => new WP_Bootstrap_Navwalker(),
)
);
?>
          <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul> -->
          <?php // get_search_form();?>
          <form action="<?php echo home_url('/'); ?>" role="search" method="get" id="searchform" class="searchform form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="s" placeholder="Search" aria-label="Search">
            <button id="searchsubmit" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">