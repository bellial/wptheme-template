<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package chiconi
 */

get_header(); 
?>

<main id="primary" class="site-main page-main">
  <section class="banner-background">
    <div class="col-sm-8">
      <nav class="primary-navigation">
        <?php
          // Menu principal
          default_theme_nav('main', 'menu', 'main-menu');
        ?>
      </nav>
    </div>
    <?php if( have_rows('banner_carrossel') ) : ?>
      
        <section class="banner-hero">
          <div id="carossel-home" class="container slide_home">
            <?php
                while( have_rows('banner_carrossel') ) : the_row();
            ?>
              <div>
                <a href="<?php the_sub_field('link_banner'); ?>" class="d-block" title="">
                <img src="<?php the_sub_field('imagem'); ?>" alt="" class="img-fluid">
                </a>
              </div>
            <?php endwhile; ?>
          </div>
        </section>
      </section>
    <?php
      endif;
      wp_reset_query();
    ?>

   <section class="lancamentos main-woocommerce">
      <div class="container">
        <h2 class="title-produtos">Lançamentos</h2>

        <div id="carrossel-lancamentos" class="owl-carousel owl-theme">
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
              <div class="itemLancamento">
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
    <section class="loja main-woocommerce"> <!--igual a anterior porém loja-->
      <div class="container">
        <h2 class="title-produtos">Loja</h2>

        <div id="carrossel-lancamentos" class="owl-carousel owl-theme">
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

   
	</main>

<?php
get_footer();
?>