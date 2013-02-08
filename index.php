<?php get_header(); ?>

<div id="content" class="span9">

	<div class="art-text">
	<?php if ( is_front_page() ) { ?>
		<h2 class="art-tit tit2">La portada no está configura. Puedes hacerlo fácilmente siguiendo las siguiente instrucciones</h2>
		<p>Para aprovechar la capacidad de meter imágenes en la portada, haz lo siguiente:</p>
		<ol>
			<li>Crea una página en el administrador, llámala por ejemplo Portada, y configura las fotografías que quieres que se muestren de manera aleatoria en la portada.</li>
			<li>En el administrador ve a Ajustes :: Lectura. Selecciona en Página frontal muestra la opción Una página estática, y en el desplegable Página inicial seleccionar la página creada en el paso anterior.</li>
		</ol>
	<?php } else { ?>
		<h2 class="art-tit tit2">ERROR 404: Contenido no encontrado</h2>
		<p>El contenido que buscas no está disponible.</p>
		<p>Mira en el menú de cabecera para ver si encuentras lo que buscas o prueba surerte con el buscador:</p>
		<?php get_search_form(); ?>
	<?php } ?>
	</div><!-- .art-text -->

<?php get_footer(); ?>
