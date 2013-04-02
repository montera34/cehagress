<div class="art">
	<h2 class="art-tit tit2"><?php the_title(); ?></h2>
	<div class="art-text">
		<?php the_content();
		wp_link_pages( array( 'before' => '<section><div class="art-nav">P&aacute;ginas: ', 'after' => '</div></section>' ) ); ?>
	</div>
	<div class="art-meta row muted">
		<div class="span5 art-meta-col topslim">
		<ul class="unstyled">
			<?php if( get_post_type( $post->ID ) == 'evento' ) { // if evento
				$evento_id = $post->ID;
				$today = time();
				$evento_inicio = get_post_meta( $evento_id, "_cmb_evento_inicio", true );
				$evento_fin = get_post_meta( $evento_id, "_cmb_evento_fin", true );
						$evento_fin_human = date("d/m/Y", $evento_fin); ?>
				<li><i class="icon-calendar"></i> 
				<?php if ( $evento_fin < $today ) {
					echo "<span class='btn-warning'>Este evento caducó el " .$evento_fin_human. ".</span>";
				} else {
					if ( $evento_inicio != '' ) {
						$evento_inicio_human = date("d/m/Y", $evento_inicio);
						echo "Desde el " .$evento_inicio_human. " hasta el " .$evento_fin_human. ".";
					} else {
						echo "Caducó el " .$evento_fin_human. ".";
					}
				} ?>
				</li>
			<?php } elseif( get_post_type( $post->ID ) == 'page' ) { // if page ?>
				<li>Contenido publicado </strong>el <strong><?php the_time('F d, Y') ?></strong></li>
			<?php } else { // if not evento neither page ?>
			<li><i class="icon-calendar"></i> <?php the_time('F d, Y') ?>, por <?php the_author_posts_link(); ?></li>
			<li><i class="icon-tags"></i> <strong><?php the_category(', '); ?></strong><?php the_tags(', <span class="tags">',', ','</span>'); ?></li>
			<?php } ?>
			<?php if ( comments_open() ) { ?>
			<li><i class="icon-comment"></i> <?php comments_popup_link('Ningún comentario', '1 comentario', '% comentarios'); ?></li>
			<?php } ?>
		</ul>
		</div>
		<div class="span4 art-meta-col topslim">
			<?php include "social.php"; ?>
		</div>
	</div><!-- .art-meta -->
	<div class="art-comments row">
		<div class="span9 topslim">
		<?php comments_template(); ?>
		</div>
	</div><!-- .art-comments -->
</div>
