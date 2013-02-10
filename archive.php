<?php
get_header(); ?>

<div class="span1 filete"></div>

<div id="content" class="span9">
<?php // ARCHIVE LOOP
// if eventos list
$args = array(
	'post_type' => 'evento',
	'meta_key' => '_cmb_evento_fin',
	'order' => 'ASC',
	'orderby' => 'meta_value_num',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	$count = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$count++;
		if ( $count == 1 ) { echo "<div class='row'>"; }
		$evento_id = $post->ID;
		$today = time(); //echo $today;
		$evento_fin = get_post_meta( $evento_id, "_cmb_evento_fin", true );
			if ( $evento_fin < $today ) {
			// evento caducado ?>
			<div class="span3 muted">
			<?php } else { ?>
			<div class="span3">
		<?php } ?>
			<h3 class="list-tit tit3"><?php the_title(); ?></h3>
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
