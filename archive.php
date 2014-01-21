<?php
get_header(); ?>

<?php
$pt = get_query_var('post_type');
// if eventos post type
if( $pt == 'evento' ) {
	$tit = "Eventos pasados";
	$today = time();
	$args = array(
		'post_type' => $pt,
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

}

// if seccion tax of comunication post type
elseif( is_tax('seccion') || $pt == 'comunicacion' ) {
	$comunica_orderby = sanitize_text_field( $_GET['by'] );
	if ( $comunica_orderby == '' ) { $comunica_orderby = 'meta_value'; }
	$args = array(
		'post_type' => 'comunicacion',
		'order' => 'ASC',
		'orderby' => $comunica_orderby,
		'posts_per_page' => -1
	);
	if ( $comunica_orderby == 'meta_value' ) {
		$arg = array('meta_key' => '_cmb_comunica_lastname');
		array_push_associative($args,$arg);
	}
	if( is_tax('seccion') ) { // if seccion tax
		$seccion_slug = get_query_var('seccion');
		$seccion = get_term_by('slug',$seccion_slug,'seccion');
		$seccion_desc = $seccion->description;
		$base_url = get_term_link($seccion);
		$tit = $seccion->name;
		$arg = array('seccion' => $seccion_slug);
		array_push_associative($args,$arg);
	}
	if( $pt == 'comunicacion' ) { // if comunicacion post type: all posts
		$base_url = get_post_type_archive_link( $pt );
		$tit = "Comunicaciones aceptadas para el Congreso";
	}
	preg_match('/\?/',$base_url,$matches); // check if pretty permalinks enabled
	if ( $matches[0] == "?" ) { // if no pretty permalinks
		$base_url = $base_url."&by=";
	} elseif ( $matches[0] != "?" ) { // if pretty permalinks
		$base_url = $base_url."?by=";
	}
//	preg_match('/\?/',$base_url,$matches); // recheck after add vis var
//	if ( $matches[0] == "?" ) { $param_url = "&order="; }
//	else { $param_url = "?order="; }
	$comunica_buttons = array(
		array(
			'orderby' => 'title',
			'label' => 'Título',
			'url' => $base_url.'title'
		),
		array(
			'orderby' => 'meta_value',
			'label' => 'Autor',
			'url' => $base_url.'meta_value'
		)
	);
} // end if comunicacion post type or seccion tax

else {
	$tit = single_cat_title('',FALSE);
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => $pt,
	);
	if ( $paged > 1 ) { $args['paged'] = $paged; }
}
?>

<div class="span1 filete topfat"></div>

<div id="content" class="span9">
	<h2 class="tit2"><?php echo $tit ?></h2>
<?php // ARCHIVE LOOP
// if eventos list
if( $pt == 'evento' ) {

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
} // end archive loop
			if ( $count != 0 ) { echo "</div><!-- .row -->"; }
} // end if evento post type

// if comunicaciones list
elseif( is_tax('seccion') || $pt == 'comunicacion' ) {
	if( is_tax('seccion') ) {
		echo "
			<div class='art-text'>" .$seccion_desc. "</div>
		";
	}
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		$comunica_count = $the_query->found_posts. " comunicaciones";
		$controls = array();
		foreach ( $comunica_buttons as $button ) {
			if ( $comunica_orderby == $button['orderby'] ) {
				$controls[] = "<a class='btn btn-mini disabled' href='" .$button['url']. "'>" .$button['label']. "</a>";
			} else {
				$controls[] = "<a class='btn btn-mini' href='" .$button['url']. "'>" .$button['label']. "</a>";
			}
		}
//		$secciones = get_terms("seccion"); print_r($secciones);
//		foreach ( $secciones as $sec ) {
//			$term_link = get_term_link($sec);
//			$controls[] = "<a class='btn btn-mini' href='" .$term_link. "'>" .$sec->name. "</a>";
//		}
		echo "<div class='list-controls topslim'><p>" .$comunica_count. "</p><ul class='inline'><li style='padding-left: 0;'>Ordenar comunicaciones por: </li>";
		foreach ( $controls as $control ) {
			echo "<li>" .$control. "</li>";
		}
		echo "</ul></div>";
		$count = 0;
		while ( $the_query->have_posts() ) : $the_query->the_post();
			include "loop.list.php";
		endwhile;
	} else {
		echo "<p>Aún no hay ninguna comunicación aceptada en esta sección.</p>";
	} // end archive loop
} // end if comunicacion post type

else {
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
			include "loop.list.php";
		endwhile;
	include "navigation.php";
	else :
	// if no news, code in here
	endif;
}
wp_reset_query()
?>


<?php get_footer(); ?>
