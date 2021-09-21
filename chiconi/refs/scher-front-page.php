<?php 
	/**
	 * Template Name: Home
	 */

	get_header(); 
?>

	<main id="primary" class="site-main">
    <?php if( have_rows('destaques_produtos') ) : ?>
      <section class="banner-hero">
        <div id="carousel-home" class="owl-carousel owl-theme">
          <?php
              while( have_rows('banner_principal') ) : 
                the_row();
          ?>
            <div class="item">
              <a class="d-block" title="" href="<?php the_sub_field('link_banner'); ?>" class="img-fluid">
                <img src="<?php the_sub_field('imagem'); ?>" alt="" class="img-fluid d-none d-md-block">
                <img src="<?php the_sub_field('imagem_mobile'); ?>" alt="" class="img-fluid d-block d-md-none">
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      </section>
    <?php
      endif;
      wp_reset_query();
    ?>

    <?php if( have_rows('destaques_produtos') ) : ?>
      <section class="cta-produtos">
        <div class="container">
          <div class="row">
            <?php
              while( have_rows('destaques_produtos') ) : 
                the_row();
            ?>
              <div class="col-md-4 col-sm-4 col-12">
                <div class="cta-produtos__item">
                  <a href="<?php the_sub_field('url_produto'); ?>" title="Ver mais" class="d-block">
                    <img src="<?php the_sub_field('imagem_destaque'); ?>" alt="" class="img-fluid d-none d-md-block">
                    <img src="<?php the_sub_field('imagem_destaque_mobile'); ?>" alt="" class="img-fluid d-block d-md-none">
                  </a>
                </div>
              </div>
            <?php
              endwhile;
            ?>
          </div>
        </div>
      </section>
    <?php
      endif;
      wp_reset_query();
    ?>

    <section class="section-destaqueProdutos main-woocommerce">
      <div class="container">
        <h2 class="title-destaque">Destaques</h2>

        <?php 
          echo do_shortcode( '[products limit="8" columns="4" orderby="rand" order="ASC" class="quick-sale"]' ); 
        ?>
      </div>
    </section>

    <section class="cta-home text-center">
      <a href="<?php echo esc_url(home_url()); ?>/paulista-da-cabeca-aos-pes/" title="Scher" class="d-block">
        <figure>
          <img src="https://scher.com.br/wp-content/uploads/2021/09/SCHER_SOCIAL_BANNER_SITE_VERAO_PRIMAVERABANNER_SITE_PAULISTA.png" alt="Banner Paulista" class="img-fluid d-none d-md-block">
          <img src="https://scher.com.br/wp-content/uploads/2021/09/SCHER_SOCIAL_BANNER_SITE_VERAO_PRIMAVERABANNER_MOBILE-PAULISTA.png" alt="Banner Paulista" class="img-fluid d-md-none">
        </figure>
      </a>
    </section>

    <section class="dicas-blogueira">
      <div class="container">
        <h2>Dicas blogueira</h2>

        <div class="row">
          <?php
            $argsPost = array(
              'post_type'     => 'post',
              'post_per_page' => 5
            );
            $queryPost = new WP_Query($argsPost);

            if ($queryPost->have_posts()) : 
              while($queryPost->have_posts()) : $queryPost->the_post();

              $excerpt = get_the_excerpt();
          ?>
            <div class="col-md-4">
              <div class="item-postBlog">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                  <h3><?php the_title(); ?></h3>
                  <span><?php echo string_limit_words($excerpt, 20); ?> [...]</span>
                </a>
              </div>
            </div>
          <?php
            endwhile;
            endif;
            wp_reset_query();
          ?>
        </div>
      </div>
    </section>

    <section class="assinar-newsletter">
			<div class="container h-100">
				<div class="row h-100">
					<div class="col-md-12 my-auto">
            <div class="d-flex">
              <figure>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-news.png" alt="Insira seu e-mail e ganhe!" class="img-fluid">
              </figure>
              <div>
                <p>um <span>Guia de Estilo</span> exclusivo, produzido pela consultora de imagem Ale Cortat</p>
              </div>
            </div>
          </div>
					<div class="col-md-12 my-auto">
						<?php
							echo do_shortcode( '[contact-form-7 id="17" title="Assinar newsletter"]' );
						?>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
