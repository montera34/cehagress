<?php get_header(); ?>

<div class="span1 filete"></div>
<div id="content" class="span9">

<?php // THIS PAGE LOOP
if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		include "loop.single.php";
	endwhile;
} // end loop ?>

<?php get_footer(); ?>
