<?php
/**
* Template Name: Full Width Page
*
* @package your-theme
* 
*/

?>
<?php get_header(); ?>

	<main>
		<section class="content-main">
			<div class="container">
				<?php
					the_title('<h1>', '</h1>');
					while ( have_posts() ) : the_post();
					the_content();
					endwhile;
				?>
			</div><!--container-->
		</section><!--content-main-->
	</main>

<?php
get_footer();
