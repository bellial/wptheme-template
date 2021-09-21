  <footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
        <p class="logo text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-ono-footer.png" alt="ONO" class="img-fluid">
        </p>

        <div class="row">
          <div class="col-md-3">
            <div class="itemFooter">
              <h4>Institucional</h4>
              <?php
                // Menu principal
                default_theme_nav('header-menu', 'nav-main-footer', 'menu-main');
              ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="itemFooter">
              <h4>Informações</h4>
              <?php
                // Menu principal
                default_theme_nav('extra-menu', 'nav-main-footer', 'menu-main');
              ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="itemFooter">
              <h4>Pagamentos</h4>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bandeiras.png" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col-md-3">
            <div class="itemFooter">
              <ul class="socialIcons">
                <?php
                  while( have_rows('redes_sociais', 'option') ): the_row();
                ?>
                  <li>
                    <a href="<?php the_sub_field('url', 'option'); ?>" title="<?php the_sub_field('nome_rede', 'option'); ?>" target="_blank" rel="noopener noreferrer">
                      <img src="<?php the_sub_field('icone', 'option'); ?>" alt="">
                    </a>
                  </li>
                <?php
                  endwhile;
                ?>
              </ul>

              <address>
				Rodovia do Sol, 2070 sala 902, <br class="d-none d-md-block">
				Ed. Royal Blue - Praia de Itaparica, <br class="d-none d-md-block">
				Vila Velha - ES, 29102-020. <br class="d-none d-md-block">
				Ono Brasil LTDA CNPJ: 38.327.796/0001-64
              </address>
            </div>
          </div>
        </div>
      </div>
		</div>

    <div class="rodape">
      <div class="container">
        <div class="d-flex justify-content-between my-auto">
          <p>ONO 2020 © Todos os direitos reservados.</p>
          <a href="https://www.agencialeaf.com.br/" target="blank" class="d-block" title="Desenvolvido por: Agencia Leaf">
            <img alt="Desenvolvido por: Agencia Leaf"
              width="20"
              src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-leaf.svg"
              alt="Desenvolvido por: Agencia Leaf"
            />
          </a>
        </div>
      </div>
    </div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
