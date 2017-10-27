      <!-- FOOTER -->

      <hr class="featurette-divider">

      <footer class="container">

        <div class="row">
            <?php dynamic_sidebar('footer-widget-area'); ?>
        </div>

        <div class="row footer">
            <div class="col">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2017 Dinipress, all right reserved. &middot; <a href="#">Terms</a></p>
            </div>
        </div>
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
