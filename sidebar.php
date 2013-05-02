<div id="margen" class="span3">
<?php // EVENTS
$today = time();
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

	<h2 class="tit2 topfat">Próximos eventos</h2>
	<ul class="unstyled">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$evento_id = get_the_ID();
		$evento_inicio = get_post_meta( $evento_id, "_cmb_evento_inicio", true );
		$evento_fin = get_post_meta( $evento_id, "_cmb_evento_fin", true );
		if ( $evento_inicio != '' ) {
			$evento_inicio_human = date("d/m/Y", $evento_inicio);
			$evento_fin_human = date("d/m/Y", $evento_fin);
			$item_date = "Desde el " .$evento_inicio_human. " hasta el " .$evento_fin_human. ".";
		} else {
			$evento_fin_human = date("d/m/Y", $evento_fin);
			$item_date = "Hasta el " .$evento_fin_human. ".";
		}
		include "loop.sidebar.php";
	endwhile; ?>
		<li class="topslim">
			<a href="/?post_type=evento" title="Archivo de eventos">Eventos pasados</a>
		</li>
	</ul>
<?php } else {
	// no eventos
}
wp_reset_postdata(); ?>

<?php // NEWS
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 5,
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>

	<h2 class="tit2 topfat">Últimas noticias</h2>
	<ul class="unstyled">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$item_date = get_the_date("d\/m\/Y");
		include "loop.sidebar.php";
	?>

	<?php endwhile; ?>
		<li class="topslim">
			<a href="/archivo-de-noticias" title="Archivo de noticias">Noticias anteriores</a>
		</li>
	</ul>
<?php } else {
	// no news
}
wp_reset_postdata(); ?>


</div><!-- #sidebar -->
