<?php 
	/**
	 * Template Name: Home
	 */
	get_header(); 
?>

	<main id="primary" class="site-main page-main">
    <?php if( have_rows('banner_principal') ) : ?>
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

    <section class="destaques-oculos">
      <div class="container">
        <a href="https://onobrasil.com.br/categoria-produto/oculos-de-sol/" title="Óculos de sol" class="d-block">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/destaque-oculos-sol.png" alt="Óculos de sol" class="img-fluid">
        </a>

        <a href="https://onobrasil.com.br/categoria-produto/oculos-de-grau/" title="Óculos de grau" class="d-block">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/destaque-oculos-grau.png" alt="Óculos de sol" class="img-fluid">
        </a>
      </div>
    </section>
    
    <section class="novidades">
      <div class="container">
        <h2>Novidades</h2>
        <div id="carousel-novidades" class="owl-carousel owl-theme">
          <?php 
            $args_banner = array(
              'post_type'      => 'product',
              'post_status'    => 'publish',
              'posts_per_page' => 8,
              'orderby'        => 'rand',
              'tax_query' => array( 
                array(
                  'taxonomy'         => 'product_cat',
                  'terms'            => array('oculos-de-sol'),
                  // 'operator'         => 'AND',
                )
              ),
            );
            $query_banner = new WP_Query($args_banner);
          
            if ($query_banner->have_posts()) :
              while($query_banner->have_posts()) : $query_banner->the_post();

              global $product; 
          ?>
            <div class="item">
              <div class="itemNovidade">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block text-center">
                  <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                </a>
                <?php the_title('<h3>', '</h3>'); ?>
                <span class="valor">
                  <?php echo $product->get_price_html(); ?>
                </span>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn-comprar">Comprar</a>
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

    <section class="cta">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-destaque.jpg" alt="" class="img-fluid">
    </section>

    <section class="section-blog">
      <div class="container">
        <h2>BLOG</h2>
        <div class="row">
          <?php
            $argsPosts = array(
              'post_type'      => 'post',
              'posts_per_page' => 3,
            );
            $queryPosts = new WP_Query($argsPosts);

            if ($queryPosts->have_posts()) {
              while($queryPosts->have_posts()) {
                $queryPosts->the_post();
				  ?>
            <div class="col-md-4 col-sm-6 col-12">
              <div class="itemBlog">
                <h3>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block">
                    <?php the_title(); ?>
                  </a>
                </h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block linkPost">
                  Leia mais
                </a>
              </div>
            </div>
          <?php
						  } // end while loop
					  } // end if
					  wp_reset_postdata();
				  ?>
        </div>
      </div>
    </section>

    <section class="newsletter">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-5 my-auto">
            <div class="titleNews">
              <h3><strong>News</strong>letter</h3>
              <p>Insira seu email e ganhe 10%<br> de desconto na primeira compra.</p>
            </div>
          </div>
          <div class="col-md-7 my-auto">
            <?php echo do_shortcode( '[contact-form-7 id="6" html_id="formNews" title="Formulário newsletter"]' ); ?>
          </div>
        </div>
      </div>
    </section>
	</main>

<?php
get_footer();
