<?php get_header(); ?>

<div class="span1 filete"></div>

<div id="content" class="span9">

<?php // THIS PAGE LOOP
if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>

		<h2 class="art-tit tit2"><?php the_title(); ?></h2>
		<div class="art-text">
			<?php the_content(); ?>
		</div>

	<?php endwhile;
} // end loop ?>

<?php get_footer(); ?>
