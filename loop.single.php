<div class="art">
	<h2 class="art-tit tit2"><?php the_title(); ?></h2>
	<div class="art-text">
		<?php the_content();
		wp_link_pages( array( 'before' => '<section><div class="art-nav">P&aacute;ginas: ', 'after' => '</div></section>' ) ); ?>
	</div>
	<div class="art-meta row muted">
		<div class="span3 art-meta-col unstyled">
		<ul class="unstyled">
			<li>Por <strong><?php the_author_posts_link(); ?>, </strong>el <strong><?php the_time('F d, Y') ?></strong></li>
			<li>Archivado en: <strong><?php the_category(', '); ?></strong>, <?php the_tags('<span class="tags">',', ','</span>'); ?></li>
		</ul>
		</div>
		<div class="span6 art-meta-col">
			<?php comments_popup_link('0', '1', '%'); ?> <i class="icon-comment"></i>
		</div>
	</div>
</div>
