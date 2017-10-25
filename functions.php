<?php

require_once get_template_directory() . '/includes/navwalker.php';
require_once get_template_directory() . '/includes/comments.php';
require_once get_template_directory() . '/includes/custom-wp-die.php';
require_once get_template_directory() . '/includes/widget.php';
require_once get_template_directory() . '/includes/template-functions.php';
require_once get_template_directory() . '/includes/custom-widget-categories.php';
require_once get_template_directory() . '/includes/custom-catwalker.php';

add_filter('show_admin_bar', '__return_false');

add_theme_support('post-thumbnails');