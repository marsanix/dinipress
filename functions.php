<?php

// register_nav_menus(
// 	array(
// 		'primary' => __('Navigasi Utama', 'themegue'),
// 	)
// );
//

add_action('after_setup_theme', 'wpt_setup');
if (!function_exists('wpt_setup')):
	function wpt_setup() {
		register_nav_menu('primary', __('Primary navigation', 'dinipress'));
	}
endif;

if (!file_exists(get_template_directory() . '/wp-bootstrap-navwalker.php')) {
	// file does not exist... return an error.
	return new WP_Error('wp-bootstrap-navwalker-missing', __('It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
	// file exists... require it.
	require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}

// function prefix_modify_nav_menu_args($args) {
// 	return array_merge($args, array(
// 		'walker' => WP_Bootstrap_Navwalker(),
// 	));
// }
// add_filter('wp_nav_menu_args', 'prefix_modify_nav_menu_args');