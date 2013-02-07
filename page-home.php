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
			<?php // random images
			$imgs_src = array();
			$img1_src = get_post_meta( $post->ID, "_cmb_random_image1", true );
			$img2_src = get_post_meta( $post->ID, "_cmb_random_image2", true );
			$img3_src = get_post_meta( $post->ID, "_cmb_random_image3", true );
			$img4_src = get_post_meta( $post->ID, "_cmb_random_image4", true );
			if ( $img1_src != '' ) { array_push($imgs_src,$img1_src); }
			if ( $img2_src != '' ) { array_push($imgs_src,$img2_src); }
			if ( $img3_src != '' ) { array_push($imgs_src,$img3_src); }
			if ( $img4_src != '' ) { array_push($imgs_src,$img4_src); }
			if ( count($imgs_src > 0 ) ) { $rand_img = array_rand($imgs_src, 1); }
			echo "<img src='" .$imgs_src[$rand_img]. "' alt='' />";
			?>
			<?php the_content(); ?>
		</div>

	<?php endwhile;
} // end loop ?>


<?php get_footer(); ?>
