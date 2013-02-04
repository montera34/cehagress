<ul class="breadcrumbs unstyled inline">
<?php
if ( is_home() ) {
// if home
	// no breadcrumb

} elseif ( is_page() ) {
// if page ?>
	<li><a href="<?php echo $genvars['blogurl']; ?>">Inicio</a> <span class="divider">&rsaquo;</span></li>


<?php // end if page
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
	<li><?php the_title(); ?>"</li>

<?php // end if post
}
?>
</ul><!-- .breadcrumbs -->
