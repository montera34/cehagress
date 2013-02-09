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
} elseif ( is_single() && get_post_type( $post->ID ) == 'evento' ) {
// if evento post type ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Calendario</a> <span class="divider">&rsaquo;</span></li>
	<li><?php the_title(); ?></li>

<?php // end if evento
} elseif ( is_single() && get_post_type( $post->ID ) == 'post' ) {
// if post ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Noticias</a> <span class="divider">&rsaquo;</span></li>
	<li><?php the_title(); ?></li>

<?php // end if post
}
?>
</ul><!-- .breadcrumbs -->
