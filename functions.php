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
} // end function create post type

// CUSTOM META BOXES (using cmb lib) FOR CREATION CUSTOM STYLES
// see lib/metabox/example-functions.php for more info
// see https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki if you want even more
add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );


function cmb_sample_metaboxes( array $meta_boxes ) {
	$prefix = '_cmb_';
	// event dates meta box
	// just for evento post type
	$meta_boxes[] = array(
		'id'         => 'evento',
		'title'      => 'Fechas del evento',
		'pages'      => array( 'evento', ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Fecha fin',
				'desc' => 'Selecciona el día en que caduca el evento.',
				'id'   => $prefix . 'evento_fin',
				'type' => 'text_date_timestamp',
			),
			array(
				'name' => 'Fecha inicio',
				'desc' => 'En el caso de que el evento dure varios días, selecciona el día en que empieza el evento.',
				'id'   => $prefix . 'evento_inicio',
				'type' => 'text_date_timestamp',
			),

		)
	);
	// random images meta box
	// just for page-home.php page template
	$meta_boxes[] = array(
		'id'         => 'random-img',
		'title'      => 'Imágenes aleatorias para esta página',
		'pages'	     => array('page'), // post type
		'show_on'    => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Primera',
				'desc' => 'Sube una imagen de 1024x540px',
				'id' => $prefix . 'random_image1',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url','attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Segunda',
				'desc' => 'Sube una imagen de 1024x540px',
				'id' => $prefix . 'random_image2',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url','attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Tercera',
				'desc' => 'Sube una imagen de 1024x540px',
				'id' => $prefix . 'random_image3',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url','attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Cuarta',
				'desc' => 'Sube una imagen de 1024x540px',
				'id' => $prefix . 'random_image4',
				'type' => 'file',
				'save_id' => false, // save ID using true
				'allow' => array( 'url','attachment' ) // limit to just attachments with array( 'attachment' )
			),
		)
	);
	// images to use in home page meta box
	// just for page-home.php page template
	$meta_boxes[] = array(
		'id'         => 'pre-img',
		'title'      => 'Posición de las imágenes de esta página en la cabecera general',
		'pages'	     => array('page'), // post type
		'show_on'    => array( 'key' => 'page-template', 'value' => 'page-home.php' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name' => '',
				'desc' => 'Utilizar las imágenes de esta página para la cabecera general.',
				'id' => $prefix . 'random_image_true',
				'type' => 'checkbox'
			),
			array(
				'name' => '',
				'desc' => 'Porción visible de la 1ª imagen en la cabecera. Valor entre 0 y 465. 0 mostrará la parte inferior de la imagen; 465 la superior.',
				'id' => $prefix . 'random_image1_pos',
				'type' => 'text_small'
			),
			array(
				'name' => '',
				'desc' => 'Porción visible de la 2ª imagen en la cabecera. Valor entre 0 y 465. 0 mostrará la parte inferior de la imagen; 465 la superior.',
				'id' => $prefix . 'random_image2_pos',
				'type' => 'text_small'
			),
			array(
				'name' => '',
				'desc' => 'Porción visible de la 3ª imagen en la cabecera. Valor entre 0 y 465. 0 mostrará la parte inferior de la imagen; 465 la superior.',
				'id' => $prefix . 'random_image3_pos',
				'type' => 'text_small'
			),
			array(
				'name' => '',
				'desc' => 'Porción visible de la 4ª imagen en la cabecera. Valor entre 0 y 465. 0 mostrará la parte inferior de la imagen; 465 la superior.',
				'id' => $prefix . 'random_image4_pos',
				'type' => 'text_small'
			),
		)
	);
	// Add other metaboxes as needed

	return $meta_boxes;
} // end function cmb
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'lib/metabox/init.php';

}

?>
