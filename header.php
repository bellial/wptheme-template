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

    <header role="banner">
    <div class="container">
      <div class="row">
	  	<div class="col-sm-4">
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
        <div class="col-sm-8">
			<nav class="primary-navigation">
            </nav>
		</div>
           
			   <?php
            // Menu principal
            default_theme_nav('header', 'nav-main', 'menu-main');
          ?>
<!--
        <div class="box-search d-flex">
			<?php dynamic_sidebar( 'form-busca' ); ?>
			    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-search.svg" alt="Buscar" id="ico-search-busca" class="ico-search">
		</div>
        <p class="cad-login">
						<?php 
              global $current_user; 
              wp_get_current_user();
							
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-user.svg" alt="Usuário" id="ico-user" class="ico-user">
					</p>
                    <?php if( WC()->cart->get_cart_contents_count() >= 0) { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-bag.svg" alt="Sacola" width="25" height="25">
							<a href="<?php echo esc_url(home_url()); ?>/sacola" title="Sacola" class="cart-count">
								<?php echo sprintf ( WC()->cart->get_cart_contents_count() ); ?>
							</a>
						<?php } ?> --> <!--ver qual se assemelha mais com o layout, se ono ou scher e colocar as classes accordingly -->
                    
                    <!-- Menu responsivo -->
					<div class="menu-mobile my-auto">
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
					
