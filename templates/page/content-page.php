
<article class="blog-post" id="post-<?php the_ID();?>" <?php post_class();?>>
	<header>
			<?php the_title('<h2 class="blog-post-title">', '</h2>');?>
			<h6>
		      	<em>
		        	<time class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php dinipress_the_time()?></time>
            		<span class="text-muted author"><?php (get_the_author())?_e(', By', 'dinipress'):'' ?> <?php the_author()?></span>
		      	</em>
          		<?php dinipress_edit_link(get_the_ID())?>
		    </h6>

    </header>
    <section>
   
   	<?php
	while (have_posts()): the_post();

		the_post_thumbnail('dinipress-single-image');
		the_content();

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()):
			comments_template('', true);
		endif;

		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'dinipress'),
			'after' => '</div>',
		));
	
	endwhile; // End of the loop.
	?>

	<?php // comments_template('', true);?>
  </section>
</article>


