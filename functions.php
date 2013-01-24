<?php
// custom menus
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
        if ( function_exists( 'register_nav_menus' ) ) {
                register_nav_menus(
                array(
                        'header-menu' => 'Menú de cabecera',
                )
                );
        }
}

// CUSTOM POST TYPES
add_action( 'init', 'create_post_type', 0 );
function create_post_type() {
	// event custom post type
	register_post_type( 'evento', array(
		'labels' => array(
			'name' => __( 'Eventos' ),
			'singular_name' => __( 'Evento' ),
			'add_new_item' => __( 'Añadir un evento' ),
			'edit' => __( 'Editar' ),
			'edit_item' => __( 'Editar este evento' ),
			'new_item' => __( 'Nuevo evento' ),
			'view' => __( 'Ver evento' ),
			'view_item' => __( 'Ver este evento' ),
			'search_items' => __( 'Buscar eventos' ),
			'not_found' => __( 'Ningún evento encontrado' ),
			'not_found_in_trash' => __( 'No hay eventos en la papelera' ),
			'parent' => __( 'Parent' )
		),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'has_archive' => true,
//		'menu_icon' => get_template_directory_uri() . '/images/icon-post.type-integrantes.png',
		'hierarchical' => false, // if true this post type will be as pages
		'query_var' => true,
		'supports' => array('title', 'editor','excerpt','author'),
		'taxonomies' => array(),
		'rewrite' => array('slug'=>'evento','with_front'=>false),
		'can_export' => true,
//		'_builtin' => false,
//		'_edit_link' => 'post.php?post=%d',
//		'map_meta_cap' => true, // should be true to make capability_type works
//		'capability_type' => 'page',
	));
?>
