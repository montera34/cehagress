<?php
get_header(); ?>

<div class="span1 filete"></div>

<div id="content" class="span9">
	<h2 class="tit2 muted">Eventos pasados</h2>
<?php // ARCHIVE LOOP
// if eventos list
$today = time();
$args = array(
	'post_type' => 'evento',
	'meta_key' => '_cmb_evento_fin',
	'order' => 'ASC',
	'orderby' => 'meta_value_num',
	'meta_query' => array(
		array(
			'key' => '_cmb_evento_fin',
			'value' => $today,
			'type' => 'NUMERIC',
			'compare' => '<'
		),
		array(
			'key' => '_cmb_evento_fin',
			'value' => '_wp_zero_value',
			'compare' => '!='
		),
	),

);
// past events loop
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	$count = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$count++;
		if ( $count == 1 ) { echo "<div class='row'>"; }
		$evento_id = $post->ID;
		$today = time();
//		$evento_inicio = get_post_meta( $evento_id, "_cmb_evento_inicio", true );
		$evento_fin = get_post_meta( $evento_id, "_cmb_evento_fin", true );
		?>
		<div class="span3 muted topslim">
			<h3 class="list-tit tit3 fontup"><a class="muted" href="<?php the_permalink(); ?>" title="Más información sobre el evento" rel="bookmark"><?php the_title(); ?></a></h3>
			<span>
				<?php if ( $evento_inicio != '' ) {
					$evento_inicio_human = date("d/m/Y", $evento_inicio);
					$evento_fin_human = date("d/m/Y", $evento_fin);
					echo "Desde el " .$evento_inicio_human. " hasta el " .$evento_fin_human. ".";
				} else {
					$evento_fin_human = date("d/m/Y", $evento_fin);
					echo "Caducó el " .$evento_fin_human. ".";
				} ?>
			</span>
			<div class="list-text">
				<?php the_content(); ?>
			</div>
		</div>

		<?php if ( $count == 3 ) { echo "</div><!-- .row -->"; $count = 0; }
	endwhile;
} // end this page loop
			if ( $count != 0 ) { echo "</div><!-- .row -->"; }
wp_reset_query()
?>


<?php get_footer(); ?>
