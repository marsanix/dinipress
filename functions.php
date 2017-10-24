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
		register_nav_menu('primary', __('Primary Menu', 'dinipress'));
	}
endif;

if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
	// file does not exist... return an error.
	return new WP_Error('wp-bootstrap-navwalker-missing', __('It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
	// file exists... require it.
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

// function prefix_modify_nav_menu_args($args) {
// 	return array_merge($args, array(
// 		'walker' => WP_Bootstrap_Navwalker(),
// 	));
// }
// add_filter('wp_nav_menu_args', 'prefix_modify_nav_menu_args');

add_filter('show_admin_bar', '__return_false');

if (!function_exists('dini_edit_link')):
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
	function dini_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__('Edit<span class="screen-reader-text"> "%s"</span>', 'dinipress'),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;