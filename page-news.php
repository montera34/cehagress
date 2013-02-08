<?php /* Template Name: Listado de noticias */
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
			<?php the_content(); ?>
		</div>

	<?php endwhile;
} // end this page loop ?>

<?php // news loop
$args = array(
	'post_type' => 'post'
);

$news_query = new WP_Query( $args );
if ( $news_query->have_posts() ) :
	while ( $news_query->have_posts() ) : $news_query->the_post();
		include "loop.list.php";
	endwhile;
else :
// if no news, code in here
endif;
?>


<?php get_footer(); ?>
