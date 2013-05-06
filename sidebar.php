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

	<h2 class="tit2 topfat">Agenda</h2>
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
			<strong><a href="/?post_type=evento" title="Archivo de eventos">Eventos pasados</a></strong>
		</li>
	</ul>
<?php } else {
	// no eventos
}
wp_reset_postdata(); ?>

<?php // NEWS
$args = array(
	'parent' => '0',
	'orderby' => 'id',
	'order' => 'ASC',
);
$news_cats = get_terms('category',$args);
foreach ( $news_cats as $term ) {
	$term_name = $term->name;
	$term_link = get_term_link( $term );
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'cat' => $term->term_id,
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>

	<h2 class="tit2 topfat"><?php echo $term_name; ?></h2>
	<ul class="unstyled">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$item_date = get_the_date("d\/m\/Y");
		include "loop.sidebar.php";
	?>

	<?php endwhile; ?>
		<li class="topslim">
			<strong><a href="<?php echo $term_link ?>" title="Archivo de noticias de la sección <?php echo $term_name; ?>">Más noticas en esta sección</a></strong><br /><a href="/archivo-de-noticias" title="Archivo de noticias">Archivo de todas las secciones</a>
		</li>
	</ul>
<?php } else {
	// no news
}
wp_reset_postdata();

} // end foreach news categories ?>


</div><!-- #sidebar -->
