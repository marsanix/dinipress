<?php

add_action('after_setup_theme', 'dinipress_menu');
if (!function_exists('dinipress_menu')):
	function dinipress_menu() {
		register_nav_menu('primary', __('Primary Menu', 'dinipress'));
	}
endif;

// function wpt_register_js() {
// 	wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', 'jquery');
// 	wp_enqueue_script('jquery.bootstrap.min');
// }
// add_action('init', 'wpt_register_js');
// function wpt_register_css() {
// 	wp_register_style('bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
// 	wp_enqueue_style('bootstrap.min');
// }
// add_action('wp_enqueue_scripts', 'wpt_register_css');

if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
	// file does not exist... return an error.
	return new WP_Error('wp-bootstrap-navwalker-missing', __('It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
	// file exists... require it.
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}