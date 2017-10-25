<?php

function dinipress_widgets_init() {

	/*
		  Sidebar (one widget area)
	*/
	register_sidebar(array(
		'name' => __('Sidebar', 'dinipress'),
		'id' => 'sidebar-widget-area',
		'description' => __('The sidebar widget area', 'dinipress'),
		'before_widget' => '<section class="%1$s %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	/*
		  Footer (three widget areas)
	*/
	register_sidebar(array(
		'name' => __('Footer', 'dinipress'),
		'id' => 'footer-widget-area',
		'description' => __('The footer widget area', 'dinipress'),
		'before_widget' => '<div class="%1$s %2$s col-sm-4">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

}
add_action('widgets_init', 'dinipress_widgets_init');

// $args = array(
// 	'taxonomy' => 'product_cat',
// 	'show_option_none' => __('No Menu Items.'),
// 	'echo' => 1,
// 	'depth' => 2,
// 	'wrap_class' => 'product-categories',
// 	'level_class' => 'pattern_garment_type',
// 	'parent_title_format' => '<h5>%s</h5>',
// 	'current_class' => 'selected',
// 	'walker' => new Dinipress_Category_Walker(),
// );
// custom_list_categories($args);