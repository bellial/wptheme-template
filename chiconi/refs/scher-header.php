<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="facebook-domain-verification" content="lnszmn5nu154upzwumjclujopw5pi8" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header">
    <div class="container-fluid h-100">
      <div class="row h-100">
        <div class="col-md-2 col-5 my-auto d-none d-lg-block">
					<?php if(is_front_page() || is_home()) { ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url(home_url()); ?>" class="custom-logo-link">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-scher-pb.png" alt="Scher">
							</a>
						</h1>
					<?php } else { ?>
						<p class="site-title">
							<a href="<?php echo esc_url(home_url()); ?>" class="custom-logo-link">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-scher-pb.png" alt="Scher">
							</a>
						</p>
					<?php } ?>
        </div>
				
				<div class="col-md-2 col-5 my-auto d-block d-lg-none">
					<p class="site-title">
						<a href="<?php echo esc_url(home_url()); ?>" class="custom-logo-link">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-scher-pb.png" alt="Scher">
						</a>
					</p>
				</div>

				<div class="col-md-10 col-7 d-flex justify-content-end justify-content-lg-between my-auto">
					<?php
            // Menu principal
            default_theme_nav('header-menu', 'nav-main');
          ?>

					<div class="box-search d-flex">
						<?php dynamic_sidebar( 'form-busca' ); ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-lupa.svg" alt="Buscar" id="ico-search-busca" class="ico-search">
					</div>

					<p class="cad-login">
						<?php 
							global $current_user; wp_get_current_user();
							
							if ( ! is_user_logged_in() ) { 
						?>
							<a href="<?php echo esc_url(home_url()); ?>/minha-conta" class="d-none d-lg-inline-block" title="Cadastre-se">Cadastre-se </a> <span class="d-none d-lg-inline-block">ou faça</span>
							<a href="<?php echo esc_url(home_url()); ?>/minha-conta" class="d-none d-lg-inline-block" title="Login">seu login</a>
						<?php } else { ?>
							<a href="<?php echo esc_url(home_url()); ?>/minha-conta" class="d-none d-lg-inline-block" title="Olá">
								<?php
									echo 'Olá, ' . $current_user->display_name . "\n";
								?>
							</a>
						<?php } ?>

						<a href="<?php echo esc_url(home_url()); ?>/minha-conta" title="Cadastre-se" class="icon-login">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.svg" alt="Login" width="25" height="25">
						</a>
						
						<?php if( WC()->cart->get_cart_contents_count() >= 0) { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-bag.svg" alt="Sacola" width="25" height="25">
							<a href="<?php echo esc_url(home_url()); ?>/sacola" title="Sacola" class="cart-count">
								<?php echo sprintf ( WC()->cart->get_cart_contents_count() ); ?>
							</a>
						<?php } ?>
					</p>

					<!-- Menu responsivo -->
					<div class="menu-mobile my-auto d-block d-lg-none">
						<div class="nav-icon"> 
							<span></span> 
							<span></span> 
							<span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
