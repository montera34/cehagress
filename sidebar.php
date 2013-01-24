<div id="margen" class="span3">
<?php // CALENDAR
$args = array(
	'post_type' => 'evento',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>

	<h2 class="tit2">Calendario</h2>
	<ul class="unstyled">

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<li class="topslim">
			<h3 class="tit3 fontup"><a href="<?php the_permalink(); ?>" title="Más información sobre el evento" rel="bookmark"><?php the_title(); ?></a></h3>
			<p><?php the_excerpt_rss(); ?></p>
		</li>
	<?php endwhile; ?>
	</ul>
<?php } else {
	// no eventos
} ?>
</div><!-- #sidebar -->
