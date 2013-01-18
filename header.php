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

<body>

<div id="super" class="container">

	<div id="preup" class="row">
			<div id="lema" class="span3">
				1-4 Octubre 2014
			</div><!-- #lema -->
			<div id="banner" class="span9">
				<?php echo $genvars['blogdesc']; ?>
			</div><!-- #banner -->
	</div><!-- #preup -->
	<div id="predown" class="row">
			<div id="logo" class="span3">
				<?php echo $genvars['blogname']; ?>
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
			<div id="breadcrumb" class="span9 offset3">
					Breadcrumb
			</div><!-- #breadcrumb -->
	</div><!-- #preup -->

	<div id="hoja" class="row">
	<?php get_sidebar(); ?>
