<?php
// Append associative array elements
function array_push_associative(&$arr) {
   $args = func_get_args();
   foreach ($args as $arg) {
       if (is_array($arg)) {
           foreach ($arg as $key => $value) {
               $arr[$key] = $value;
               $ret++;
           }
       }else{
           $arr[$arg] = "";
       }
   }
   return $ret;
}

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
// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker-master/twitter_bootstrap_nav_walker.php');

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
		'supports' => array('title', 'editor','excerpt','author','comments','trackbacks'),
		'taxonomies' => array(),
		'rewrite' => array('slug'=>'evento','with_front'=>false),
		'can_export' => true,
//		'_builtin' => false,
//		'_edit_link' => 'post.php?post=%d',
//		'map_meta_cap' => true, // should be true to make capability_type works
//		'capability_type' => 'page',
	));
	// comunicacion custom post type
	register_post_type( 'comunicacion', array(
		'labels' => array(
			'name' => __( 'Comunicaciones' ),
			'singular_name' => __( 'Comunicación' ),
			'add_new_item' => __( 'Añadir una comunicación' ),
			'edit' => __( 'Editar' ),
			'edit_item' => __( 'Editar esta comunicación' ),
			'new_item' => __( 'Nueva comunicación' ),
			'view' => __( 'Ver comunicación' ),
			'view_item' => __( 'Ver esta comunicación' ),
			'search_items' => __( 'Buscar comunicaciones' ),
			'not_found' => __( 'Ninguna comunicación encontrada' ),
			'not_found_in_trash' => __( 'No hay comunicaciones en la papelera' ),
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
		'supports' => array('title', 'editor','excerpt','author','comments','trackbacks'),
		'taxonomies' => array('seccion'),
		'rewrite' => array('slug'=>'comunicacion','with_front'=>false),
		'can_export' => true,
//		'_builtin' => false,
//		'_edit_link' => 'post.php?post=%d',
//		'map_meta_cap' => true, // should be true to make capability_type works
//		'capability_type' => 'page',
	));

} // end function create post type

// Custom Taxonomies
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
	// SECTIONS FOR COMUNICATIONS
	register_taxonomy( 'seccion', array('comunicacion'), array(
		'labels' => array(
			'name' => _x( 'Secciones para las comunicaciones','taxonomy general name' ),
			'singular_name' => _x( 'Sección','taxonomy general name' ),		
			'search_items' => __( 'Buscar secciones' ),
			'popular_items' => __( 'Secciones con más comunicaciones' ),
			'all_items' => __( 'Todas las secciones' ),
			'parent_item' => __( 'Parent sección' ),
			'edit_item' => __( 'Editar la sección' ),
			'update_item' => __( 'Actualizar la sección' ),
			'add_new_item' => __( 'Añadir una nueva sección' ),
			'new_item_name' => __( 'Nombre de la nueva sección' ),
//			'separate_items_with_commas' => __( 'Separate tags with commas' ),
//			'add_or_remove_items' => __( 'Add or remove tags' ),
//			'choose_from_most_used' => __( 'Choose from the most used tags' ),
//			'menu_name' => 
		),
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'hierarchical' => true,
		'update_count_callback' => true,
		'query_var' => true,
		'rewrite' => array('slug'=>'seccion','with_front'=>false,'hierarchical'=>true)
	));
}

// thumbnails support
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( "220", "220" );

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
	// comunicaciones meta data
	// just for comunicacion post type
	$meta_boxes[] = array(
		'id'         => 'comunica_author',
		'title'      => 'Sobre el autor de la comunicación',
		'pages'      => array( 'comunicacion', ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => false, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Apellidos',
				'desc' => 'Apellidos',
				'id'   => $prefix . 'comunica_lastname',
				'type' => 'text_small',
			),
			array(
				'name' => 'Nombre',
				'desc' => 'Nombre',
				'id'   => $prefix . 'comunica_firstname',
				'type' => 'text_small',
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

// Twenty Eleven theme comments function with some modifications
if ( ! function_exists( 'vb_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function vb_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<span class="ping-tit"><?php comment_author_link(); ?></span><br />
		<?php edit_comment_link('Editar', '<span class="edit-link">', '</span> | ');
		comment_text(); ?>
	</li>
	<?php	break;
		default :

			if ($comment->comment_approved == '0') { // if comment is not approved ?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
					<p>Tu comentario ser&aacute; revisado antes de aparecer publicado.</p>
       				</li>
	<?php		} else { // if comment is approved ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(array("row","bottomslim")); ?>>
		<div class="comment-meta row">
			<?php $avatar_size = 64;
			//if ( '0' != $comment->comment_parent ) { $avatar_size = 32; } ?>
			<div class="comment-avatar span1"><?php echo get_avatar( $comment, $avatar_size ); ?></div>
			<div class="span4">
			<ul class="unstyled">
				<li>Autor: <?php comment_author_link(); ?></li>
				<li><time datetime="<?php comment_date('Y-m-Y') ;?>" class="comment-date"><?php comment_date('d \d\e F \d\e Y'); ?></time></li>
				<li><a href="<?php comment_link( $comment->comment_ID ); ?>" title="Enlace permanente a este comentario">Enlace permanente al comentario</a></li>
			</ul>
			</div>
		</div>
		<div class="comment-text row">
			<div class="span5">
			<?php comment_text(); ?>
			</div>
		</div>
		<div class="row">
			<div class="span5"><i class="icon-share-alt"></i> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Responder a este comentario', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ;?></div>
		</div>
	</li><!-- end #comment -->
			
	<?php }
		break;
	endswitch;
}
endif; // ends check for vb_comment()





// trackbacks and pingbacks counter
function trackback_count() {
global $wpdb;
global $post;
$postid = $post->ID;
$count = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_type = 'pingback' AND comment_approved = '1' AND comment_post_ID = '$postid'";
//$count = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_type = 'pingback'";
$counter = $wpdb->get_var($count);
if ( $counter == 0 ) { echo "No hay trackbacks"; }
elseif ( $counter == 1 ) { echo "Un trackback"; }
else { echo "$counter trackbacks"; }
}

// human comments counter
function human_comment_count() {
global $wpdb;
global $post;
$postid = $post->ID;
$count = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_type = '' AND comment_approved = '1' AND comment_post_ID = '$postid'";
$counter = $wpdb->get_var($count);
if ( $counter == 0 ) { echo "No hay comentarios"; }
elseif ( $counter == 1 ) { echo "Un comentario"; }
else { echo "$counter comentarios"; }
}
?>
