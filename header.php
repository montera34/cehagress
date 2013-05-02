<?php
global $genvars;
require_once( get_stylesheet_directory(). '/general-vars.php' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
	/* From twentyeleven theme
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	//bloginfo( 'name' );
		echo $genvars['blogname'];

		// Add the blog description for the home/front page.
		$site_description = $genvars['blogdesc'];
		if ( $site_description != '' && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet/less" href="<?php echo $genvars['blogtheme']; ?>/style.less" media="all" />
<script src="<?php echo $genvars['blogtheme']; ?>/js/less-1.3.3.min.js"></script>
<!-- Bootstrap -->
<link href="<?php echo $genvars['blogtheme']; ?>/css/bootstrap.min.css" rel="stylesheet" />
<!-- Font Squirrel -->
<link rel="stylesheet" href="<?php echo $genvars['blogtheme']; ?>/fonts/stylesheet.css" type="text/css" charset="utf-8" />

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $genvars['blogname']; ?> RSS Feed suscription" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php echo $genvars['blogname']; ?> Atom Feed suscription" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); ?>

</head>

<?php
// color modes:
// @red + @blue
// @purple + @green
// @darkblue + @gold
// @olive + @bluesea
$colors = array('red blue red_blue','purple green purple_green','darkblue gold darkblue_gold','olive bluesea olive_bluesea');
$color_key = array_rand($colors, 1);
$color_class = $colors[$color_key];

// random image in header
$args = array(
	'post_type' => 'page',
	'meta_key' => '_cmb_random_image_true',
	'meta_value' => 'on',
	'nopaging' => 'true',
);
$random_query = new WP_Query( $args );
if ( $random_query->have_posts() ) {
	while ( $random_query->have_posts() ) : $random_query->the_post();
		//global $imgs_src;
		$imgs_src = array();
		$img1_src = get_post_meta( $post->ID, "_cmb_random_image1", true );
		$img2_src = get_post_meta( $post->ID, "_cmb_random_image2", true );
		$img3_src = get_post_meta( $post->ID, "_cmb_random_image3", true );
		$img4_src = get_post_meta( $post->ID, "_cmb_random_image4", true );
		if ( $img1_src != '' ) { array_push($imgs_src,$img1_src); }
		if ( $img2_src != '' ) { array_push($imgs_src,$img2_src); }
		if ( $img3_src != '' ) { array_push($imgs_src,$img3_src); }
		if ( $img4_src != '' ) { array_push($imgs_src,$img4_src); }
		//global $imgs_pos;
		$imgs_pos = array();
		$img1_pos = get_post_meta( $post->ID, "_cmb_random_image1_pos", true );
		$img2_pos = get_post_meta( $post->ID, "_cmb_random_image2_pos", true );
		$img3_pos = get_post_meta( $post->ID, "_cmb_random_image3_pos", true );
		$img4_pos = get_post_meta( $post->ID, "_cmb_random_image4_pos", true );
		if ( $img1_pos != '' ) { array_push($imgs_pos,$img1_pos); }
		if ( $img2_pos != '' ) { array_push($imgs_pos,$img2_pos); }
		if ( $img3_pos != '' ) { array_push($imgs_pos,$img3_pos); }
		if ( $img4_pos != '' ) { array_push($imgs_pos,$img4_pos); }
		if ( count($imgs_src > 0 ) ) { $rand_img = array_rand($imgs_src, 1); }
		global $random_img_home;
		$random_img_home = "<img src='" .$imgs_src[$rand_img]. "' alt='" .$genvars['blogname']. " -- " .$genvars['blogdesc']. "' />";
		$random_img_pre = "<div style='height: 75px; text-indent: -9999px; background-image: url(" .$imgs_src[$rand_img]. "); background-repeat: no-repeat; background-position: 0 -" .$imgs_pos[$rand_img]. "px;'>" .$genvars['blogname']. " -- " .$genvars['blogdesc']. "</div>";
	endwhile;
}
wp_reset_query()
// end random image in header
?>

<body class="<?php echo $color_class ?>">

<div id="super" class="container">

	<div id="preup" class="row">
			<div id="lema" class="span3">
				<div class="fontup"><strong>Toledo, 1-4 Octubre 2014</strong></div>
				<?php if ( !is_front_page() ) { ?>
				<div id="lema-tagline" class="tit3"><em><?php echo $genvars['blogdesc']; ?></em></div>
				<?php } ?>
			</div><!-- #lema -->
			<div id="banner" class="span9">
				<?php if ( is_front_page() ) { ?>
					<h2 class="tit2"><em><?php echo $genvars['blogdesc']; ?></em></h2>
				<?php } else { echo $random_img_pre; } ?>
			</div><!-- #banner -->
	</div><!-- #preup -->
	<div id="predown" class="row">
			<div id="logo" class="span3">
				<a href="<?php echo $genvars['blogurl']; ?>"><h1><?php echo $genvars['blogname']; ?></h1></a>
			</div><!-- #logo -->
			<div id="navega" class="span9">
					<?php // main navigation menu for home page
		                        $menu_slug = "header-menu";
		                        $args = array(
		                                'theme_location' => $menu_slug,
		                                'container' => 'false',
		                                'menu_id' => 'pre-menu',
		                                'menu_class' => 'menu',
		                        );
		                        wp_nav_menu( $args );
		                        ?>
			</div><!-- #navega -->
			<div id="breadcrumbs" class="span9">
				<?php include "breadcrumbs.php"; ?>
			</div><!-- #breadcrumb -->
	</div><!-- #preup -->

	<div id="hoja" class="row">
	<?php get_sidebar(); ?>
