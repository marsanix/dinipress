<?php if (have_posts()): while (have_posts()): the_post();?>
																														<article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
																														  <header>
																														    <h2>
																														      <?php the_title()?>
																														    </h2>
																														    <h6>
																														      <em>
																														        <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php dinipress_the_time()?>, </time>
																								                    <span class="text-muted author"><?php _e('By', 'dinipress');
		echo " ";
		the_author()?></span>
																														      </em>
																								                  <?php dinipress_edit_link()?>
																														    </h6>
																														    <p class="text-muted" style="margin-bottom: 30px;">
																														      <i class="fa fa-folder-open-o"></i>&nbsp;
																														      <?php _e('Filed under', 'dinipress');?>:
																														      <?php the_category(', ')?>&nbsp;&nbsp;&nbsp;
																														      <i class="fa fa-comment-o"></i>&nbsp;
																														      <?php _e('Comments', 'dinipress');?>:
																														      <?php comments_popup_link(__('None', 'dinipress'), '1', '%');?>
																														    </p>
																														  </header>
																														  <section>
																														    <?php the_post_thumbnail();?>
																														    <?php the_content()?>
																														    <?php wp_link_pages();?>
																														  </section>
																														</article>
																														<?php comments_template('', true);?>
																														<?php endwhile;?>
															<?php else: ?>
<?php wp_redirect(get_bloginfo('url') . '/404', 404);exit;?>
<?php endif;?>