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
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Carousel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarCollapse"> -->
        <?php
wp_nav_menu(array(
	'menu' => 'primary',
	'theme_location' => 'primary',
	'depth' => 2,
	'container' => 'div',
	'container_class' => 'collapse navbar-collapse',
	'container_id' => 'navbarCollapse',
	'menu_class' => 'nav navbar-nav',
	'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
	'walker' => new WP_Bootstrap_Navwalker())
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
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        <!-- </div> -->
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-md-4">
            <img style="margin-bottom: 10px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="348" height="280">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <img style="margin-bottom: 10px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="348" height="280">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <img style="margin-bottom: 10px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="348" height="280">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row">
          <div class="col-12 col-md-9">

            <div class="row">
              <div class="col-md-6">
                <img style="margin-bottom: 10px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="348" height="280">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>

                <hr class="featurette-divider">

                <div class="row">
                  <div class="col-12" style="margin-bottom: 7px;">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <img style="margin-top: 3px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="120" height="95">
                      </div>
                      <div class="col-12 col-sm-8">
                        <h5>Heading news post with thumbnail image and title only</h5>
                        <div>12 October 2017</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12" style="margin-bottom: 7px;">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <img style="margin-top: 3px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="120" height="95">
                      </div>
                      <div class="col-12 col-sm-8">
                        <h5>Heading news post with thumbnail image and title only</h5>
                        <div>12 October 2017</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12" style="margin-bottom: 7px;">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <img style="margin-top: 3px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="120" height="95">
                      </div>
                      <div class="col-12 col-sm-8">
                        <h5>Heading news post with thumbnail image and title only</h5>
                        <div>12 October 2017</div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <div class="col-md-6">
                <img style="margin-bottom: 10px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="348" height="280">
                <h2>Heading</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>

                <hr class="featurette-divider">

                <div class="row">
                  <div class="col-12" style="margin-bottom: 7px;">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <img style="margin-top: 3px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="120" height="95">
                      </div>
                      <div class="col-12 col-sm-8">
                        <h5>Heading news post with thumbnail image and title only</h5>
                        <div>12 October 2017</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12" style="margin-bottom: 7px;">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <img style="margin-top: 3px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="120" height="95">
                      </div>
                      <div class="col-12 col-sm-8">
                        <h5>Heading news post with thumbnail image and title only</h5>
                        <div>12 October 2017</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12" style="margin-bottom: 7px;">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <img style="margin-top: 3px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="120" height="95">
                      </div>
                      <div class="col-12 col-sm-8">
                        <h5>Heading news post with thumbnail image and title only</h5>
                        <div>12 October 2017</div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>

          </div>
          <div class="col-12 col-md-3 sidebar-offcanvas">

            <aside class="ml-sm-auto blog-sidebar">
              <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
              </div>
              <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                  <li><a href="#">March 2014</a></li>
                  <li><a href="#">February 2014</a></li>
                  <li><a href="#">January 2014</a></li>
                  <li><a href="#">December 2013</a></li>
                  <li><a href="#">November 2013</a></li>
                  <li><a href="#">October 2013</a></li>
                  <li><a href="#">September 2013</a></li>
                  <li><a href="#">August 2013</a></li>
                  <li><a href="#">July 2013</a></li>
                  <li><a href="#">June 2013</a></li>
                  <li><a href="#">May 2013</a></li>
                  <li><a href="#">April 2013</a></li>
                </ol>
              </div>
              <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                  <li><a href="#">GitHub</a></li>
                  <li><a href="#">Twitter</a></li>
                  <li><a href="#">Facebook</a></li>
                </ol>
              </div>
            </aside><!-- /.blog-sidebar -->

          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/vendor/holder.min.js"></script>

    <?php wp_footer();?>

  </body>
</html>
