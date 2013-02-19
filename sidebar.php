<div id="margen" class="span3">
<?php // EVENTS
//$today = date('U');
$today = time();
//echo $today;
$args = array(
	'post_type' => 'evento',
	'meta_query' => array(
		array(
			'key' => '_cmb_evento_fin',
			'value' => $today,
			'type' => 'NUMERIC',
			'compare' => '>='
		),
		array(
			'key' => '_cmb_evento_fin',
			'value' => '_wp_zero_value',
			'compare' => '!='
		),
	),
	'meta_key' => '_cmb_evento_fin',
	'order' => 'ASC',
	'orderby' => 'meta_value_num',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>

	<h2 class="tit2">Próximos eventos</h2>
	<ul class="unstyled">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$evento_id = get_the_ID();
		$evento_inicio = get_post_meta( $evento_id, "_cmb_evento_inicio", true );
		$evento_fin = get_post_meta( $evento_id, "_cmb_evento_fin", true );
//		echo $evento_inicio;
//		echo $evento_fin;
	?>

		<li class="topslim">
			<h3 class="tit3 fontup"><a href="<?php the_permalink(); ?>" title="Más información sobre el evento" rel="bookmark"><?php the_title(); ?></a></h3>
			<span class="muted">
				<?php if ( $evento_inicio != '' ) {
					$evento_inicio_human = date("d/m/Y", $evento_inicio);
					$evento_fin_human = date("d/m/Y", $evento_fin);
					echo "Desde el " .$evento_inicio_human. " hasta el " .$evento_fin_human. ".";
				} else {
					$evento_fin_human = date("d/m/Y", $evento_fin);
					echo "Hasta el " .$evento_fin_human. ".";
				} ?>
			</span>
			<p><?php the_excerpt_rss(); ?></p>
		</li>
	<?php endwhile; ?>
		<li class="topslim">
			<a href="?post_type=evento" title="Archivo de eventos">Eventos pasados</a>
		</li>
	</ul>
<?php } else {
	// no eventos
} ?>
</div><!-- #sidebar -->
