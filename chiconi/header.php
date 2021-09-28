<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package chiconi
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	

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
			
		</section>
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col">
					<div class="logo">
						<?php if( has_custom_logo() ):  ?>
							<?php 
								// Get Custom Logo URL
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								$custom_logo_url = $custom_logo_data[0];
							?>

						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
						title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" 
						rel="home">

							<img src="<?php echo esc_url( $custom_logo_url ); ?>" 
								alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>

						</a>
						<?php else: ?>
							<div class="site-name"><?php bloginfo( 'name' ); ?></div>
						<?php endif; ?>
					</div>	
				</div>

				<section class="col-6 search-items">
				<div class="search-form">
					<?php if ( is_active_sidebar( 'header-section-one' ) ) : ?>
					<div class="header-section-one">
					<?php dynamic_sidebar( 'header-section-one' ); ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-search.svg" alt="Buscar" id="ico-search-busca" class="ico-search">
					</div>
					<?php endif; ?>
				</div> 
				<section class="cad-login">
					
							<button class="button-login">
								<a href="<?php echo esc_url(home_url()); ?>/sacola" title="Sacola" class="cart-count">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-bag.svg" alt="Sacola" width="25" height="25">
								<span class="d-none d-lg-inline-block">Sacola</span>
								<?php 
									if( WC()->cart->get_cart_contents_count() > 0) { 
								echo sprintf ( WC()->cart->get_cart_contents_count() ); 
									}?>
								
								</a>
							</button>
						<button class="button-login">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-user.svg" alt="Usuário" id="ico-user" class="ico-user" width="25" height="25"><span class="d-none d-lg-inline-block"></span>
					<?php 
						global $current_user; 
						wp_get_current_user();

						if ( ! is_user_logged_in() ) { 
					?>
					
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
					</section>
					</section>
					<section class="zap col my-auto d-none d-lg-block">
				<a href="https://api.whatsapp.com/send?phone=08008794848&text=Ol%C3%A1!" title="Precisa de ajuda?" target="_blank" class="btn-whatsapp">
					<span>Alguma dúvida?<br><strong>Te ajudo agora! >>></strong></span>
					<img class="img-fluid" alt="Precisa de ajuda?" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ico-zap.png">
				</a>
					</section>
							
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
					
