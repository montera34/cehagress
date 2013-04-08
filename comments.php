<?php
if ( isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
  die ('Please do not load this page directly. Thanks! / Por favor, no intentes acceder a esta página directamente. Gracias.');
?>

<div id="comments" class="muted">

<?php if ( post_password_required() ) :
	echo '<p>Esta entrada está protegida con contraseña. Introduce la contraseña para leer los comentarios.</p></div><!-- end #comments -->';
	/* Esto código hace que no se siga ejecutando
	el código para la generación de comentarios,
	que salte para completar la carga de la página
	sin ellos */
	return;
endif;

if ( have_comments() ) { // si la entrada tiene comentarios
//	wp_list_comments(); ?>
	<h3 class="span5 comments-tit tit3">Comentarios<?php //human_comment_count(); ?></h3>
	<div class="row">
	<div class="span5">
	<ol class="comments-list unstyled">
		<?php // human comments list
		 wp_list_comments( array(
			'style' => 'ol',
			'type' => 'comment',
			'avatar_size' => 64,
			'reply_text' => 'responder a este comentario',
			'login_text' => 'iniciar sesión para comentar',
			'callback' => 'vb_comment'
		 ) );
		?>
	</ol><!-- end class comments-list -->
	</div>
<?php } else { // si la entrada no tiene comentarios
	if ( comments_open() ) { // si los comentarios están abiertos aunque no haya ?>
	<h3 class="span5 comments-tit tit3">Comentarios<?php //human_comment_count(); ?></h3>
	<div class="row">
	<div class="span5">
		<p>Aún no hay comentarios a esta entrada.</p>
		<p>Si tienes algo que decir, utiliza el formulario de la derecha.</p>
	</div>
	<?php } else { // si los comentarios están cerrados
		//echo '<p>Los comentarios están deshabilitados en esta entrada.</p>';
	}
} // fin if have_comments
?>


<?php if ( comments_open() ) { // si los comentarios están habilitados
//	comment_form(); ?>
		<div id="respond" class="span4">
		<div id="cancel-comment-reply">
			<?php cancel_comment_reply_link('<i class="icon-remove"></i> Cancelar la resuesta.'); ?>
		</div>

		<?php if(get_option('comment_registration') && !$user_ID) { // registration needed ?>
			<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">iniciar sesi&oacute;n</a> para comentar.</p>

		<?php } else { // registration don't needed ?>

			<form class="span4" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if($user_ID) { // user is logged in ?>
					<fieldset class="row">Sesi&oacute;n iniciada como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Cerrar sesi&oacute;n</a></fieldset>

				<?php } else { // user is not logged in ?>
					<fieldset class="row">
						<?php if($req) $req_text = "Necesario para comentar"; ?>
						<label for="author">Nombre</label>
						<input class="span4" type="text" name="author" id="author" value="" size="22" tabindex="1" placeholder="<?php echo $req_text?>" />  
					</fieldset>
					<fieldset class="row">
						<?php if($req) $req_text = "Necesario para comentar"; ?>
						<label for="email">Correo electr&oacute;nico</label>
						<input class="span4" type="text" name="email" id="email" size="22" tabindex="2" value="" placeholder="<?php echo $req_text?> / No ser&aacute; publicado" />
					</fieldset>
					<fieldset class="row">
						<label for="url">Sitio web</label>
						<input class="span4" type="text" name="url" id="url" size="22" tabindex="3" value="" />
					</fieldset>

				<?php } // end log in sentence ?>

				<fieldset class="row">
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
					<?php comment_id_fields(); ?>
					<label for="comment">Comentario</label>
					<textarea class="span4" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
				</fieldset>  
				<fieldset class="row">
					<input class="comment-boton" name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentario" />
					<!--<input type="hidden" name="comment_post_ID" value="<?php //echo $id; ?>" />-->
				</fieldset>  
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		</div><!-- #respond -->
	</div>
		<?php } // end registration need sentence ?>

<?php }
?>
</div><!-- end #comments -->
