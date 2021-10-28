<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package your-theme
 */

get_header(); 
?>

<main>
  <section class="banner-background">
    <section class="banner-hero">
			<?php
        if( have_rows('banner_carrossel') ):
          $i = 0; // Set the increment variable
			?>
       <!--Boostrap 5 carousel-->
      <div id="banner-carrossel" class="carousel slide shadow curved" data-bs-ride="carousel" data-interval="4000">
        <div class="carousel-indicators">
				  <?php 
				    while( have_rows('banner_carrossel') ) : the_row();
				  ?>
          <button type="button" data-bs-target="#banner-carrossel" data-bs-slide-to="<?php echo $i;?>" class="<?php if($i == 0) echo 'active';?>" aria-current="true">
          </button>
				  <?php   
            $i++; // Increment the increment variable	
				    endwhile; 
          ?>
        </div><!--carousel-indicators-->

        <div class="carousel-inner">
          <?php 
            $j = 0; 
            while( have_rows('banner_carrossel') ) : the_row(); 
             $image = get_sub_field('imagem');
             $link = get_sub_field('link_banner');
          ?>
          <div class="carousel-item <?php if($j == 0) echo 'active';?>">
            <a href="<?php echo $link; ?>" class="d-block" title="">
              <img src="<?php echo $image; ?>" class="d-block w-100" alt="...">
            </a>
          </div><!--carousel-item-->
        <?php   
              $j++; // Increment the increment variable
	          endwhile; //End the loop
				  else :
            // no rows found
        endif; 
        ?>
        </div> <!--carousel-inner-->    
      </div><!--carousel-->
    </section><!--banner-hero-->
  </section><!--banner-background-->
	
  <section class="container-lancamentos">
	  <section class="lancamentos main-woocommerce container">
      <h2 class="title-produtos">Lançamentos</h2>
	    <?php 
        if ( is_active_sidebar( 'home-section-one' ) ) : 
          dynamic_sidebar( 'home-section-one' ); 
        endif; 
      ?>
	  </section><!--lancamentos-->
  </section><!--container-lancamentos-->
	
  <section class="container-loja">
    <section class="loja main-woocommerce container">
      <h2 class="title-produtos">Loja</h2>
	    <?php 
        if ( is_active_sidebar( 'home-section-two' ) ) : 
          dynamic_sidebar( 'home-section-two' ); 
        endif; 
      ?>
	  </section><!--loja-->
  </section><!--container-loja-->
  
  <section class="dicas-blogueira container">
    <h2 class="title-produtos">Dicas</h2>
    <div class="row justify-content-lg-evenly">
      <?php
        $argsPost = array(
          'post_type'     => 'post',
          'post_per_page' => 4
          );
        $queryPost = new WP_Query($argsPost);
          if ($queryPost->have_posts()) : 
            while($queryPost->have_posts()) : $queryPost->the_post();
              $excerpt = get_the_excerpt();
      ?>
      <div class="col-lg-3">
        <div class="item-postBlog">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block">
            <h3><?php the_title(); ?></h3>
            <span><?php the_content('[...]'); ?></span>
          </a>
          </div><!--item-postBlog-->
      </div><!--col-lg-3-->
        <?php
            endwhile;
          endif;
          wp_reset_query();
        ?>
    </div><!--justify-content-lg-evenly-->
  </section><!--dicas-blogueira-->

  <!--widget do instagram-->
  <section class="widget-insta">
    <h2 class="title-produtos">Siga Nosso Instagram</h2>
	</section><!--widget-insta-->

	<section class="newsletter container">
    <div class="row">
      <div class="col-lg-6">
        <h4 class="widget-title">Acompanhe nossas novidades</h4>
        <p class="textwidget">
          Cadastre seu e-mail para receber informações exclusivas
        </p>
      </div><!--col-lg-6-->
      <div class="col-lg-6 footer-form">
        <?php 
          if ( is_active_sidebar( 'footer-section-one' ) ) : 
        ?>
          <div class="row footer-section-one">
            <?php 
              dynamic_sidebar( 'footer-section-one' ); 
            ?>
          </div><!--footer-section-one-->
        <?php 
          endif; 
        ?>
      </div><!--footer-form-->
    </div><!--row-->
  </section><!--newsletter-->  
</main>

<?php
get_footer();
?>