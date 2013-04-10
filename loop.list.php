<?php if ( is_tax('seccion') ) { $list_class=" tax-seccion"; } ?>
<div class="row list-data<?php echo $list_class ?>">
	<div class="list-item span9">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="row">
		<div class="span3">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="span6">
		<?php } ?>

		<h3 class="list-tit tit3 fontup"><a class="" href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<?php if ( is_tax('seccion') ) { // if tax seccion of comunicacion post type
			$comunica_author = "Autor: <strong>" .get_post_meta( $post->ID, '_cmb_comunica_firstname', true ). " " .get_post_meta( $post->ID, '_cmb_comunica_lastname', true ). "</strong>";
			$comunica_secs = get_the_terms( $post->ID, 'seccion');
			foreach ( $comunica_secs as $term ) {
				$comunica_sec_link = get_term_link($term);
				$comunica_sec = "Sección: <a href='" .$comunica_sec_link. "'>" .$term->name. "</a>";
			}
		?>
		<ul class="inline muted">
				<li style="padding-left: 0;"><i class="icon-user"></i> <?php echo $comunica_author; ?></li>
		</ul>
		<?php } // end if tax seccion ?>
		<div class="list-text">
			<?php the_excerpt(); ?>
		</div>

		<?php if ( has_post_thumbnail() ) { ?>
		</div><!-- .span6 -->
		</div><!-- .row -->
		<?php } ?>
	</div>
</div><!-- .list-data -->
<?php if ( !is_tax('seccion') ) { // if NOT tax seccion of comunicacion post type ?>
<div class="row">
	<div class="span9 list-meta">
		<ul class="inline muted">
				<li style="padding-left: 0;"><i class="icon-user"></i> <?php echo $comunica_author; ?></li>
				<li><i class="icon-tags"></i> <?php echo $comunica_sec; ?></li>

				<li style="padding-left: 0;"><i class="icon-calendar"></i> <?php the_time('F d, Y') ?>, por <?php the_author_posts_link(); ?></li>
				<?php if ( comments_open() ) { ?>
				<li><i class="icon-comment"></i> <?php comments_popup_link('Ningún comentario', '1 comentario', '% comentarios'); ?></li>
				<?php } // end if comments open ?>
				<li><i class="icon-tags"></i> <strong><?php the_category(', '); ?></strong><?php the_tags(', <span class="tags">',', ','</span>'); ?></li>
		</ul>
	</div>
</div><!-- .list-meta -->
<?php } // end if NOT tax seccion ?>
