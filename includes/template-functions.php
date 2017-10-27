<?php

if (!function_exists('dinipress_edit_link')):
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
	function dinipress_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'dinipress'),
				get_the_title()
			),
			'<span class="edit-link">&nbsp;&nbsp;',
			'</span>'
		);
	}
endif;

if (!function_exists('dinipress_time_link')):
/**
 * Gets a nicely formatted string for the published date.
 */
	function dinipress_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			//$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			$time_string = 'Updated on <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf($time_string,
			get_the_date(DATE_W3C),
			get_the_date(),
			get_the_modified_date(DATE_W3C),
			get_the_modified_date()
		);

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__('%s', 'dinipress'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;

if (!function_exists('dinipress_the_time')):
/**
 * Gets a nicely formatted string for the published date.
 */
	function dinipress_the_time() {
		$time_string = the_time('jS F Y');
		if (get_the_time('Y-m-d') === date('Y-m-d')) {
			$time_string = the_time();
		}

		$time_string = sprintf($time_string,
			get_the_date(DATE_W3C),
			get_the_date(),
			get_the_modified_date(DATE_W3C),
			get_the_modified_date()
		);

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__('%s', 'dinipress'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);
	}
endif;

if (!function_exists('dinipress_posted_on')):
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
	function dinipress_posted_on() {

		// Get the author name; wrap it in a link.
		$byline = sprintf(
			/* translators: %s: post author */
			__('by %s', 'dinipress'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'
		);

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . dinipress_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	}
endif;

if (!function_exists('dinipress_entry_footer')):
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
	function dinipress_entry_footer() {

		/* translators: used between list items, there is a space after the comma */
		$separate_meta = __(', ', 'dini');

		// Get Categories for posts.
		$categories_list = get_the_category_list($separate_meta);

		// Get Tags for posts.
		$tags_list = get_the_tag_list('', $separate_meta);

		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if (((dinipress_categorized_blog() && $categories_list) || $tags_list) || get_edit_post_link()) {

			echo '<footer class="entry-footer">';

			if ('post' === get_post_type()) {
				if (($categories_list && dinipress_categorized_blog()) || $tags_list) {
					echo '<span class="cat-tags-links">';

					// Make sure there's more than one category before displaying.
					if ($categories_list && dinipress_categorized_blog()) {
						echo '<span class="cat-links">' . dinipress_get_svg(array('icon' => 'folder-open')) . '<span class="screen-reader-text">' . __('Categories', 'dinipress') . '</span>' . $categories_list . '</span>';
					}

					if ($tags_list) {
						echo '<span class="tags-links">' . dinipress_get_svg(array('icon' => 'hashtag')) . '<span class="screen-reader-text">' . __('Tags', 'dinipress') . '</span>' . $tags_list . '</span>';
					}

					echo '</span>';
				}
			}

			dinipress_edit_link();

			echo '</footer> <!-- .entry-footer -->';
		}
	}
endif;

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function dinipress_get_svg($args = array()) {
	// Make sure $args are an array.
	if (empty($args)) {
		return __('Please define default parameters in the form of an array.', 'dinipress');
	}

	// Define an icon.
	if (false === array_key_exists('icon', $args)) {
		return __('Please define an SVG icon filename.', 'dinipress');
	}

	// Set defaults.
	$defaults = array(
		'icon' => '',
		'title' => '',
		'desc' => '',
		'fallback' => false,
	);

	// Parse args.
	$args = wp_parse_args($args, $defaults);

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
		 * Twenty Seventeen doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
		 *
		 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
		 *
		 * Example 1 with title: <?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
		 *
		 * Example 2 with title and description: <?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
		 *
		 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	*/
	if ($args['title']) {
		$aria_hidden = '';
		$unique_id = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ($args['desc']) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr($args['icon']) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ($args['title']) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html($args['title']) . '</title>';

		// Display the desc only if the title is already set.
		if ($args['desc']) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html($args['desc']) . '</desc>';
		}
	}

	/*
		 * Display the icon.
		 *
		 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
		 *
		 * See https://core.trac.wordpress.org/ticket/38387.
	*/
	$svg .= ' <use href="#icon-' . esc_html($args['icon']) . '" xlink:href="#icon-' . esc_html($args['icon']) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ($args['fallback']) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr($args['icon']) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dinipress_categorized_blog() {
	$category_count = get_transient('dinipress_categories');

	if (false === $category_count) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories(array(
			'fields' => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number' => 2,
		));

		// Count the number of categories that are attached to the posts.
		$category_count = count($categories);

		set_transient('dinipress_categories', $category_count);
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if (is_preview()) {
		return true;
	}

	return $category_count > 1;
}
