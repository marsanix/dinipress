<?php

// Register our tweaked Category Archives widget
function myprefix_widgets_init() {
	register_widget('WP_Widget_Categories_Custom');
}
add_action('widgets_init', 'myprefix_widgets_init');

/**
 * Duplicated and tweaked WP core Categories widget class
 */
class WP_Widget_Categories_Custom extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	// public function __construct() {
	// 	$widget_ops = array(
	// 		'classname' => 'widget_categories',
	// 		'description' => __( 'A list or dropdown of categories.' ),
	// 		'customize_selective_refresh' => true,
	// 	);
	// 	parent::__construct( 'categories', __( 'Categories' ), $widget_ops );
	// }

	function __construct() {
		$widget_ops = array('classname' => 'widget_categories widget_categories_custom',
			'description' => __("A list of categories, with slightly tweaked output.", 'dinipress'),
			'customize_selective_refresh' => true,
		);
		parent::__construct('categories_custom', __('Dinipress Categories', 'dinipress'), $widget_ops);
	}

	/**
	 * Outputs the content for the current Categories widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Categories widget instance.
	 */
	public function widget($args, $instance) {
		static $first_dropdown = true;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Categories') : $instance['title'], $instance, $this->id_base);

		$c = !empty($instance['count']) ? '1' : '0';
		$h = !empty($instance['hierarchical']) ? '1' : '0';
		$d = !empty($instance['dropdown']) ? '1' : '0';

		echo $args['before_widget'];
		if ($title) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$cat_args = array(
			'orderby' => 'name',
			'show_count' => $c,
			'hierarchical' => $h,
		);

		if ($d) {
			$dropdown_id = ($first_dropdown) ? 'cat' : "{$this->id_base}-dropdown-{$this->number}";
			$first_dropdown = false;

			echo '<label class="screen-reader-text" for="' . esc_attr($dropdown_id) . '">' . $title . '</label>';

			$cat_args['show_option_none'] = __('Select Category');
			$cat_args['id'] = $dropdown_id;

			/**
			 * Filters the arguments for the Categories widget drop-down.
			 *
			 * @since 2.8.0
			 *
			 * @see wp_dropdown_categories()
			 *
			 * @param array $cat_args An array of Categories widget drop-down arguments.
			 */
			wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
			?>

<script type='text/javascript'>
/* <![CDATA[ */
(function() {
	var dropdown = document.getElementById( "<?php echo esc_js($dropdown_id); ?>" );
	function onCatChange() {
		if ( dropdown.options[ dropdown.selectedIndex ].value > 0 ) {
			location.href = "<?php echo home_url(); ?>/?cat=" + dropdown.options[ dropdown.selectedIndex ].value;
		}
	}
	dropdown.onchange = onCatChange;
})();
/* ]]> */
</script>

<?php
} else {
			?>
		<ul class="list-group">
<?php
$cat_args['title_li'] = '';
			$cat_args['class'] = 'list-group-item';
			$cat_args['walker'] = new Custom_Walker_Category();

			/**
			 * Filters the arguments for the Categories widget.
			 *
			 * @since 2.8.0
			 *
			 * @param array $cat_args An array of Categories widget options.
			 */
			// wp_list_categories(apply_filters('widget_categories_args', $cat_args));

			$this->dinipress_list_categories(apply_filters('widget_categories_args', $cat_args));

			?>
		</ul>
<?php
}

		echo $args['after_widget'];
	}

	function dinipress_list_categories($args = '') {
		$defaults = array(
			'child_of' => 0,
			'current_category' => 0,
			'depth' => 0,
			'echo' => 1,
			'exclude' => '',
			'exclude_tree' => '',
			'feed' => '',
			'feed_image' => '',
			'feed_type' => '',
			'hide_empty' => 1,
			'hide_title_if_empty' => false,
			'hierarchical' => true,
			'order' => 'ASC',
			'orderby' => 'name',
			'separator' => '<br />',
			'show_count' => 0,
			'show_option_all' => '',
			'show_option_none' => __('No categories'),
			'style' => 'list',
			'taxonomy' => 'category',
			'title_li' => __('Categories'),
			'use_desc_for_title' => 1,
		);

		$r = wp_parse_args($args, $defaults);

		if (!isset($r['pad_counts']) && $r['show_count'] && $r['hierarchical']) {
			$r['pad_counts'] = true;
		}

		// Descendants of exclusions should be excluded too.
		if (true == $r['hierarchical']) {
			$exclude_tree = array();

			if ($r['exclude_tree']) {
				$exclude_tree = array_merge($exclude_tree, wp_parse_id_list($r['exclude_tree']));
			}

			if ($r['exclude']) {
				$exclude_tree = array_merge($exclude_tree, wp_parse_id_list($r['exclude']));
			}

			$r['exclude_tree'] = $exclude_tree;
			$r['exclude'] = '';
		}

		if (!isset($r['class'])) {
			$r['class'] = ('category' == $r['taxonomy']) ? 'categories' : $r['taxonomy'];
		}

		if (!taxonomy_exists($r['taxonomy'])) {
			return false;
		}

		$show_option_all = $r['show_option_all'];
		$show_option_none = $r['show_option_none'];

		$categories = get_categories($r);

		$output = '';
		if ($r['title_li'] && 'list' == $r['style'] && (!empty($categories) || !$r['hide_title_if_empty'])) {
			$output = '<li class="' . esc_attr($r['class']) . '">' . $r['title_li'] . '<ul>';
		}
		if (empty($categories)) {
			if (!empty($show_option_none)) {
				if ('list' == $r['style']) {
					$output .= '<li class="cat-item-none">' . $show_option_none . '</li>';
				} else {
					$output .= $show_option_none;
				}
			}
		} else {
			if (!empty($show_option_all)) {

				$posts_page = '';

				// For taxonomies that belong only to custom post types, point to a valid archive.
				$taxonomy_object = get_taxonomy($r['taxonomy']);
				if (!in_array('post', $taxonomy_object->object_type) && !in_array('page', $taxonomy_object->object_type)) {
					foreach ($taxonomy_object->object_type as $object_type) {
						$_object_type = get_post_type_object($object_type);

						// Grab the first one.
						if (!empty($_object_type->has_archive)) {
							$posts_page = get_post_type_archive_link($object_type);
							break;
						}
					}
				}

				// Fallback for the 'All' link is the posts page.
				if (!$posts_page) {
					if ('page' == get_option('show_on_front') && get_option('page_for_posts')) {
						$posts_page = get_permalink(get_option('page_for_posts'));
					} else {
						$posts_page = home_url('/');
					}
				}

				$posts_page = esc_url($posts_page);
				if ('list' == $r['style']) {
					$output .= "<li class='cat-item-all'><a href='$posts_page'>$show_option_all</a></li>";
				} else {
					$output .= "<a href='$posts_page'>$show_option_all</a>";
				}
			}

			if (empty($r['current_category']) && (is_category() || is_tax() || is_tag())) {
				$current_term_object = get_queried_object();
				if ($current_term_object && $r['taxonomy'] === $current_term_object->taxonomy) {
					$r['current_category'] = get_queried_object_id();
				}
			}

			if ($r['hierarchical']) {
				$depth = $r['depth'];
			} else {
				$depth = -1; // Flat.
			}
			$output .= walk_category_tree($categories, $depth, $r);
		}

		if ($r['title_li'] && 'list' == $r['style'] && (!empty($categories) || !$r['hide_title_if_empty'])) {
			$output .= '</ul></li>';
		}

		/**
		 * Filters the HTML output of a taxonomy list.
		 *
		 * @since 2.1.0
		 *
		 * @param string $output HTML output.
		 * @param array  $args   An array of taxonomy-listing arguments.
		 */
		$html = apply_filters('wp_list_categories', $output, $args);

		if ($r['echo']) {
			echo $html;
		} else {
			return $html;
		}
	}

	/**
	 * Handles updating settings for the current Categories widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

		return $instance;
	}

	/**
	 * Outputs the settings form for the Categories widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form($instance) {
		//Defaults
		$instance = wp_parse_args((array) $instance, array('title' => ''));
		$title = sanitize_text_field($instance['title']);
		$count = isset($instance['count']) ? (bool) $instance['count'] : false;
		$hierarchical = isset($instance['hierarchical']) ? (bool) $instance['hierarchical'] : false;
		$dropdown = isset($instance['dropdown']) ? (bool) $instance['dropdown'] : false;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked($dropdown);?> />
		<label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown');?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked($count);?> />
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts');?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked($hierarchical);?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e('Show hierarchy');?></label></p>
		<?php
}

}