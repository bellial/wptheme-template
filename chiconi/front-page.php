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

<section class="section-destaqueProdutos main-woocommerce">
      <div class="container">
        <h2 class="title-destaque">Destaques</h2>

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
    <section class="section-destaqueProdutos main-woocommerce"> <!--igual a anterior porém loja-->
      <div class="container">
        <h2 class="title-destaque">Loja</h2>

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
    <section class="dicas-blogueira">
      <div class="container">
        <h2>Dicas da Chiconi</h2>

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

    <!--widget do instagram-->

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