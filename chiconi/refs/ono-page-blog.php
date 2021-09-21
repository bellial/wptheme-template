<?php get_header(); ?>

	<main id="primary" class="site-main page-main">
		<section class="section-pageBlog">
			<div class="container">
				<div class="row">
				<?php
					$argsPosts = array(
						'post_type'      => 'post',
						'posts_per_page' => -1,
					);
					$queryPosts = new WP_Query($argsPosts);

					if ($queryPosts->have_posts()) {
						while($queryPosts->have_posts()) {
							$queryPosts->the_post();
				?>
					<div class="col-md-6">
						<article class="item-postBLog">
							<header class="postHeader">
								<?php the_title( '<h2>', '</h2>' ); ?>
							</header>
							<figure>
								<?php the_post_thumbnail( 'large', ['class' => 'img-fluid'] ); ?>
							</figure>
							<div class="boxPost">
								<?php the_excerpt(); ?>
							</div>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block linkPost"></a>
						</article>
					</div>
				<?php
						} // end while loop
					} // end if
					wp_reset_postdata();
				?>
				</div>
			</div>			
		</section>
	</main>

<?php
get_footer();
