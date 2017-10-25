
<article class="blog-post" id="post-<?php the_ID();?>" <?php post_class();?>>
	<header>
			<?php the_title('<h2 class="blog-post-title">', '</h2>');?>
    	<p class="blog-post-meta"><?php the_date()?> by <a href="#"><?php the_author()?></a></p>
    	<?php dinipress_edit_link(get_the_ID());?>
    </header>

    <?php
the_content();

wp_link_pages(array(
	'before' => '<div class="page-links">' . __('Pages:', 'dinipress'),
	'after' => '</div>',
));
?>
</article>




