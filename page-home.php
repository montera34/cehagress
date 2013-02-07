<?php /* Template Name: Página con imágenes gran tamaño */
get_header(); ?>

<?php if ( !is_front_page() ) { ?>
	<div class="span1 filete"></div>
<?php } ?>

<div id="content" class="span9">

<?php // THIS PAGE LOOP
if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>

		<?php if ( is_front_page() ) {
		// if home, no title
		} else { ?>
			<h2 class="art-tit tit2"><?php the_title(); ?></h2>
		<?php } ?>
		<div class="art-text">
			<?php // random images, build in header
			echo $random_img_home; ?>
			<?php the_content(); ?>
		</div>

	<?php endwhile;
} // end loop ?>


<?php get_footer(); ?>
