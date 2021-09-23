<?php get_header(); ?>

	<main id="primary" class="site-main page-main">
		<section class="page-main content-post-single">
			<div class="container">
				<?php the_title('<h1>','</h1>'); ?>
				<figure>
					<img src="<?php the_post_thumbnail_url() ?>" alt="" class="img-fluid">
				</figure>
				<?php
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
				?>
			</div>

		</section>
	</main>

<?php
get_footer();
