	<footer id="colophon" class="site-footer">
		<div class="footer-infos">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="Scher" class="logo-foter">
					</div>
					
					<div class="col-md-3">
						<h4>Institucional</h4>
						<?php
							default_theme_nav('footer-institucional', 'nav-footer');
						?>
					</div>
					
					<div class="col-md-3">
						<h4>Informações</h4>
						<?php
							default_theme_nav('footer-informacoes', 'nav-footer');
						?>
					</div>
					
					<div class="col-md-3">
						<h4>Pagamento</h4>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bandeira-cartao.png" alt="Cartões" class="img-fluid">
					</div>

					<div class="col-md-3">
						<ul class="socialIcons">
							<li>
								<a href="https://www.facebook.com/schercalcados/" title="facebook" target="_blank" rel="noopener noreferrer">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-facebook.png" alt="facebook">
								</a>
							</li>
							<li>
								<a href="https://api.whatsapp.com/send?phone=5511994590621&text=Ol%C3%A1%2C%20estou%20navegando%20no%20site!" title="whatsapp" target="_blank" rel="noopener noreferrer">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-whatsapp.png" alt="whatsapp">
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/schercalcados/" title="instagram" target="_blank" rel="noopener noreferrer">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-instagram.png" alt="instagram">
								</a>
							</li>
						</ul>
						<address>
							R. José Bonifácio, 14 - Vila Assunção,
							Santo André - SP, CEP 09030-010
							CNPJ n.º 03.007.331/0001-41
							<br>
							<br>
							<a href="tel:11994590621" title="(11) 99459-0621">(11) 99459-0621</a>
							<a href="mailto:carla@scher.com.br" title="contato@scher.com.br">contato@scher.com.br</a>
						</address>
					</div>
				</div>
			</div>
		</div>

		<div class="rodape">
			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/lets-encrypt.png" alt="Lets Encrypt">
				<p>Scher <?php echo date('Y'); ?> - Todos os direitos reservados.</p>
				<a href="https://agencialeaf.com.br" target="_blank" rel="noopener noreferrer" title="Desenvolvido por - Agência Leaf" class="ico-leaf d-block">
					<img target="_blank" src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-leaf.png" alt="Desenvolvido por - Agência Leaf">
				</a>
			</div>
		</div>
	</footer>

	<div class="frete-gratis">
		<a href="#" title="Fechar" class="ico-fechar d-none d-sm-block">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/botao-fechar.svg" alt="Fechar">
		</a>

		<img src="<?php the_field('banner_flutante', 'option') ?>" alt="Frete grátis para vendas a cima de R$ 250,00" class="img-fluid d-none d-sm-block">
		
		<div class="box-frete d-block d-sm-none">
			<p>
				<strong>Frete grátis</strong> nas compras acima de R$250,00 <br>Somente para compras no site.
			</p>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>
