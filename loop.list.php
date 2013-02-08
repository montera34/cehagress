<div class="row">
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
		<div class="list-meta muted<?php //echo $list_class; ?>">
			Por <strong><?php the_author_posts_link(); ?></strong>, el <strong><?php the_time('F d, Y') ?></strong> | Archivado en: <?php the_category(', ') ?>. <?php comments_popup_link('Ningún&nbsp;comentario', '1&nbsp;comentario', '%&nbsp;comentarios'); ?>
		</div>
		<div class="list-text<?php //echo $list_class; ?>">
			<?php the_excerpt(); ?>
		</div>

		<?php if ( has_post_thumbnail() ) { ?>
		</div><!-- .span6 -->
		</div><!-- .row -->
		<?php } ?>
	</div>
</div>
