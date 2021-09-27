<footer id="colophon" class="site-footer">

  <?php if ( is_active_sidebar( 'footer-section-one' ) ) : ?>
    <div class="footer-section-one">
      <?php dynamic_sidebar( 'footer-section-one' ); ?>
    </div>
  <?php endif; ?>

		<div class="site-info">
			<div class="container">
        <p class="logo text-center"><!--a logo fica aside, ajeitar os PATHS-->
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-ono-footer.png" alt="Chiconi" class="img-fluid">
        </p>
        <div class="row">
          <div class="col-md-3">
            <div class="itemFooter">
              <h4>Menu</h4>
              <?php
                // Menu do Rodapé
                default_theme_nav('footer', 'menu', 'footer-menu');
              ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="itemFooter">
              <h4>Telefone</h4>
              <?php
                // ver como fazer a call do telefone
              ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="itemFooter">
              <h4>Whatsapp</h4>
              <!--call o numero do zap-->
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
              </div>
          </div>
        </div>
      </div>
		</div>

    <div class="copyright">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between my-auto">
                <div class="copyright">
                  <p><?php printf( 'Chiconi. Todos os direitos reservados. &copy; %s', date( 'Y' ) ); ?></p>
                  <a href="https://www.agencialeaf.com.br/" target="blank" class="d-block" title="Desenvolvido por: Agência Leaf">
                  <img alt="Desenvolvido por: Agência Leaf" width="20" src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-leaf.svg" alt="Desenvolvido por: Agência Leaf" />
          </a>
                </div>
            </div>
            
        </div>
    </div>
</div>
	</footer>
                

<?php wp_footer(); ?>

</body>
</html>