    <footer>
      <div class="site-info">
        <div class="container-footer">
          <div class="container row">
            <div class="row col-lg-6 menu-row">
              <div class="col-lg-6">
                <div class="itemFooter menuRodape">
                  <h4>Menu</h4>
                  <?php
                    // Footer menu created in functions.php
                    default_theme_nav('footer', 'menu', 'footer-menu');
                  ?>
                </div><!--itemFooter-->
              </div><!--col-lg-6-->
                
              <div class="col-lg-6 contatosFooter">
                <div class="itemFooter">
                  <h4>Phone</h4>
                    <span>xxxx xxxx</span>
                    <h4>Whatsapp</h4>
                      <a href="https://api.whatsapp.com/send?phone=xxxxxxx&text=Ol%C3%A1!" title="Precisa de ajuda?" target="_blank">                    
                        <span>xxxx xxx xxxx</span>
                      </a>
                      <br>
                    <span>contact@yourtheme.com.br</span>
                </div><!--itemFooter-->
              </div><!--contatosFooter-->
            </div><!--menu-row-->
            <div class="col-lg-3">
              <div class="itemFooter">
                <div class="redeSocial container">
                  <ul class="socialIcons">
                    <?php
                      while( have_rows('redes_sociais', 'option') ): the_row();//made with ACF
                    ?>
                    <li>
                      <a href="<?php the_sub_field('url', 'option'); ?>" title="<?php the_sub_field('tag', 'option'); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php the_sub_field('icone', 'option'); ?>" alt="">
                        <span><?php the_sub_field('tag', 'option'); ?></span>
                      </a>
                    </li>
                    <?php
                      endwhile;
                    ?>
                  </ul>
                </div><!--redeSocial-->
              </div><!--itemFooter-->
            </div><!--col-lg-3-->
            <p class="col-md-3 logo-footer img-fluid">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Logo-footer.png" alt="Your logo" class="img-fluid">
            </p>
          </div><!--container row-->
        </div><!--container-footer-->
		  </div><!--site-info-->

      <div class="copyright">
        <div class="container">
          <div class="row">            
            <div class="copyright">
              <p>
                <?php 
                  printf( 'Your Theme. Todos os direitos reservados. &copy; %s', date( 'Y' ) ); 
                ?>
              </p>
              <a href="https://www.yoursite.com.br/" target="blank" class="d-block" title="Made with love by: Yourself">
                <img alt="Made by: Yourself" width="20" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-you.png" alt="Made by: Yourself" />
              </a>
            </div><!--copyright-->    
          </div><!--row-->
        </div><!--container-->
      </div><!--copyright-->

	  </footer>
    <?php 
      wp_footer(); 
    ?>

  </body>
</html>
