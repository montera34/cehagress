<?php
global $genvars;
require_once( get_stylesheet_directory(). '/general-vars.php' );
?>

	<div class="row">
		<div id="epi" class="span9">
		<div class="row">
			<div class="span2">
			<h3 class="tit3" style="margin-left: 5px;">Organizadores:</h3>	
			<p><a href="http://www.arteceha.com/CEHA/ceha.html" title="Comité Español de Historia del Arte"><img src="<?php echo $genvars['blogtheme']; ?>/images/organiza.ceha.png" alt="Comité Español de Historia del Arte" /></a></p>
			<p><a href="http://uclm.es" title="Universidad de Castilla- La Mancha"><img src="<?php echo $genvars['blogtheme']; ?>/images/organiza.uclm.png" alt="Universidad de Castilla- La Mancha" /></a></p>
			</div>
			<div class="span2">
			<h3 class="tit3">Colaboradores:</h3>	
			<p><a href="http://uclm.es/ceclm" title="Centro de Estudios de Castilla- La Mancha"><img src="<?php echo $genvars['blogtheme']; ?>/images/organiza.ceclm.png" alt="Centro de Estudios de Castilla- La Mancha" /></a></p>
			<p><a href="http://www.uclm.es/organos/vic_empresas/catedras.asp?op=5" title="Cátedras Universidad-Empresa -- Universidad de Castilla- La Mancha"><img src="<?php echo $genvars['blogtheme']; ?>/images/colabora.crural.png" alt="Cátedras Universidad-Empresa -- Universidad de Castilla- La Mancha" /></a></p>
			</div>
			<div class="span3">
			<h3 class="tit3">Contacto:</h3>
			<p><i class="icon-envelope icon-white"></i> <a href="/informacion-practica/contacto/"><small>Envíanos un correo</small></a></p>
			<p><i class="icon-plus-sign icon-white"></i> <a href="https://www.facebook.com/XxCongresoNacionalDeHistoriaDelArte"><small>Facebook</small></a> | <a href="https://twitter.com/xxcongresoceha"><small>Twitter</small></a></p>
			</div>
			<div class="span2">
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

<!-- Bootstrap JS: compiled and minified -->
    <script src="<?php echo $genvars['blogtheme']; ?>/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
