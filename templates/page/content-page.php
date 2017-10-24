
<div class="container marketing">
	<div class="row">

	    <div class="col-sm-8 blog-main">

	    	<article class="blog-post" id="post-<?php the_ID();?>" <?php post_class();?>>
	   			<header>
	   				<?php the_title('<h2 class="blog-post-title">', '</h2>');?>
	            	<p class="blog-post-meta"><?php the_date()?> by <a href="#"><?php the_author()?></a></p>
	            	<?php dini_edit_link(get_the_ID());?>
	            </header>

	            <?php
the_content();

wp_link_pages(array(
	'before' => '<div class="page-links">' . __('Pages:', 'dinipress'),
	'after' => '</div>',
));
?>
			</article>

		</div>

		<?php get_sidebar()?>

	</div>
</div>


