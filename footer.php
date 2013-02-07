<?php
global $genvars;
require_once( get_stylesheet_directory(). '/general-vars.php' );
?>

	<div class="row">
		<div style="background-color: #ccc;" id="epi" class="span9">
		<div class="row">
			<div class="span2">
			<h3 class="tit3" style="margin-left: 5px;">Organizadores:</h3>	
			<p><img src="<?php echo $genvars['blogtheme']; ?>/images/organiza.ceha.png" alt="Comité Español de Historia del Arte" /></p>
			<p><img src="<?php echo $genvars['blogtheme']; ?>/images/organiza.uclm.png" alt="Universidad de Castilla- La Mancha" /></p>
			</div>
			<div class="span2">
			<h3 class="tit3">Contacto:</h3>
			<p><small>mail@uclm.es</small></p>
			</div>
			<div class="span2 offset3">
			<h3 class="tit3">Créditos:</h3>
			<p><small>Diseño: <a href="http://jorgechamorro.es">Jorge Chamorro</a><br />
			Desarrollo web: <a href="http://montera34.com">montera34</a></small></p>
			</div>
		</div>
		</div><!-- #epi -->
	</div>

	</div><!-- #content -->


	</div><!-- #hoja -->


</div><!-- #super -->

<?php wp_footer(); ?>
</body>
</html>
