<div class="row">
	<div class="list-item span9">
		<h3 class="list-tit tit3 fontup"><a class="" href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<div class="list-meta muted">
			Por <strong><?php the_author_posts_link(); ?></strong>, el <strong><?php the_time('F d, Y') ?></strong> | Archivado en: <?php the_category(', ') ?>. <?php comments_popup_link('Ningún&nbsp;comentario', '1&nbsp;comentario', '%&nbsp;comentarios'); ?>
		</div>
		<div class="list-text">
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>
