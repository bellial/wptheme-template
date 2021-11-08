<?php

/**
 * The header for your theme.
 *
 * The header template file usually contains your site’s document type, meta information, links to stylesheets and scripts, 
 * and other data.
 * @package your-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('no-js'); ?> id="site-container">

	<?php wp_body_open(); ?>

	<header class="site-header" role="banner">
		<section class="header-menu">
			<ul>
				<li>FRETE GRÁTIS</li>
				<li>10% DE DESCONTO NO PAGAMENTO À VISTA</li>
				<li>PRAZO DE ENTREGA SUJEITO À CONFIRMAÇÃO</li>
			</ul>
		</section><!--header-menu-->

		<div class="container">
			<div class="row align-items-center justify-content-lg-left">
				<div class="col-lg sub">
					<div class="row row-cols-lg-2 con">
						<section class="col-lg-auto header-items">
							<div class="logo col-lg-6">
								<?php if (has_custom_logo()) :  ?>
									<?php
									// Get Custom Logo URL
									$custom_logo_id = get_theme_mod('custom_logo');
									$custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
									$custom_logo_url = $custom_logo_data[0];
									?>

									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

										<img class="img-fluid" src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />

									</a>
								<?php else : ?>
									<div class="site-name"><?php bloginfo('name'); ?></div>
								<?php endif; ?>
							</div><!--logo-->

							<div class="search-form col-lg-6">
								<?php if (is_active_sidebar('header-section-one')) : ?>
									<div class="header-section-one">
										<?php dynamic_sidebar('header-section-one'); ?>
									</div>
								<?php endif; ?>
							</div><!--search-form-->

							<section class="cad-login col-lg-5">
								<button class="button-login">
									<a href="<?php echo esc_url(home_url()); ?>/sacola" title="Sacola" class="cart-count">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-bag.svg" alt="Sacola" width="25" height="25">
										<span class="d-none d-lg-inline-block">Sacola</span>
										<?php
										if (WC()->cart->get_cart_contents_count() > 0) {
											echo sprintf(WC()->cart->get_cart_contents_count());
										} ?>
									</a>
								</button>

								<button class="button-login">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-user.svg" alt="Usuário" id="ico-user" class="ico-user" width="25" height="25"><span class="d-none d-lg-inline-block"></span>
									<?php
									global $current_user;
									wp_get_current_user();

									if (!is_user_logged_in()) { ?>

										<a href="<?php echo esc_url(home_url()); ?>/minha-conta" class="d-none d-lg-inline-block" title="Login">
											<a href="<?php echo esc_url(home_url()); ?>/minha-conta" class="d-none d-lg-inline-block" title="Login">Login</a>
									<?php } else { ?>
											<a href="<?php echo esc_url(home_url()); ?>/minha-conta" class="d-none d-lg-inline-block" title="Olá">
												<?php
												echo 'Olá, ' . $current_user->display_name . "\n";
												?>
											</a>
										</a>
									<?php } ?>
								</button>
							</section><!--cad-login-->
						</section><!--header-items-->
					</div><!--con-->
				</div><!--sub-->
			</div><!--justify-content-lg-left-->
		</div><!--container-->

		<div class="row">
			<nav class="primary-navigation">
				<?php
				// Menu principal
				default_theme_nav('main', 'menu navbar', 'main-menu');
				?>
			</nav>
		</div>
		
	</header>