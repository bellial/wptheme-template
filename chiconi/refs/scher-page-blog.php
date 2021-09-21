<?php get_header(); ?>

	<main id="primary" class="site-main">

		<section class="dicas-blogueira">
      <div class="container">
        <?php the_title('<h1>', '</h1>'); ?>

        <div class="row">
          <?php
            $argsPost = array(
              'post_type'     => 'post',
              'post_per_page' => 3
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
	</main>

<?php
get_footer();
