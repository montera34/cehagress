<ul class="breadcrumb">
<?php
if ( is_front_page() ) {
// if home
	// no breadcrumb

} elseif ( is_page() && $post->post_parent == "0" ) {
// if parent page ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><?php the_title(); ?></li>

<?php // end if parent page
} elseif ( is_page() && $post->post_parent != "0" ) {
// if child page
	$parent_pag = get_page($post->post_parent);
	$parent_tit = $parent_pag->post_title;
	$parent_link = get_permalink($parent_pag->ID);
?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $parent_link; ?>"><?php echo $parent_tit; ?></a> <span class="divider">&rsaquo;</span></li>

	<li><?php the_title(); ?></li>

<?php // end if parent page
} elseif ( is_post_type_archive( array('evento') ) ) {
// if eventos archive ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li>Agenda</li>

<?php // end if eventos archivo
} elseif ( is_category() ) {
// if news archive
	$cat_id = get_query_var('cat');
	$cat_data = get_term( $cat_id,'category');
	$cat_name = $cat_data->name;
	$cat_url = get_term_link($cat_data);
?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $genvars['blogurl']; ?>/archivo-de-noticias">Archivo de noticias</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $cat_url ?>"><?php echo $cat_name?></a> <span class="divider">&rsaquo;</span></li>
	
<?php } elseif ( is_single() && get_post_type( $post->ID ) == 'evento' ) {
// if single evento post type ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $genvars['blogurl']; ?>/?post_type=evento">Agenda</a> <span class="divider">&rsaquo;</span></li>
	<li><?php the_title(); ?></li>

<?php // end if evento
} elseif ( is_single() && get_post_type( $post->ID ) == 'post' ) {
// if single post ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $genvars['blogurl']; ?>/archivo-de-noticias">Archivo de noticias</a> <span class="divider">&rsaquo;</span></li>
	<li><?php the_title(); ?></li>

<?php // end if post
}
?>
</ul><!-- .breadcrumbs -->
