<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package your-theme
 */

get_header();
?>

	<main>

		<section class="error-404 container">
			<header>
				<h1><?php esc_html_e( 'Sorry, page not found', 'your-theme' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'Couldn`t find the right product? How about these?', 'your-theme' ); ?></p>

					

				<?php dynamic_sidebar( '404' ); ?>
					

			</div><!-- page-content -->
		</section><!-- error-404 -->

	</main>
<?php
get_footer();
