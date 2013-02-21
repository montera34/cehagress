<div class="row list-data">
	<div class="list-item span9">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="row">
		<div class="span3">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="span6">
		<?php
		$list_class = " span6";
		} else { $list_class= " span9"; } ?>

		<h3 class="list-tit tit3 fontup<?php //echo $list_class; ?>"><a class="" href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<div class="list-text<?php //echo $list_class; ?>">
			<?php the_excerpt(); ?>
		</div>

		<?php if ( has_post_thumbnail() ) { ?>
		</div><!-- .span6 -->
		</div><!-- .row -->
		<?php } ?>
	</div>
</div><!-- .list-data -->
<div class="row">
	<div class="span9 list-meta">
		<ul class="inline muted<?php //echo $list_class; ?>">
			<li><i class="icon-calendar"></i> <?php the_time('F d, Y') ?>, por <?php the_author_posts_link(); ?></li>
			<li><i class="icon-comment"></i> <?php comments_popup_link('Ningún comentario', '1 comentario', '% comentarios'); ?></li>
			<li><i class="icon-tags"></i> <strong><?php the_category(', '); ?></strong><?php the_tags(', <span class="tags">',', ','</span>'); ?></li>
		</ul>
	</div>
</div><!-- .list-meta -->
