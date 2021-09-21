<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header">
    <div class="container-fluid h-100">
      <div class="row h-100">
        <div class="col-lg-3 col-md-5 col-8 my-auto">
					<?php if(is_front_page() || is_home()) { ?>
						<h1 class="site-title">
							<?php the_custom_logo(); ?>
						</h1>
					<?php } else { ?>
						<p class="site-title">
              <?php the_custom_logo(); ?>
						</p>
					<?php } ?>
        </div>

				<div class="col-lg-9 col-md-7 col-4 d-flex justify-content-end my-auto">
					<?php
            // Menu principal
            default_theme_nav('header-menu', 'nav-main', 'menu-main');
          ?>

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
				<!--woocommerce cart icon-->
					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
    $count = WC()->cart->cart_contents_count;
    ?><a class="menucart-contents" style="color: #000; margin-left: 2vw; display: flex; font-family: 'gilroyextrabold'; text-transform: uppercase;" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Carrinho' ); ?>"><i class="wpmenucart-icon-shopping-cart-0" role="img" aria-label="Carrinho"></i><?php 
    if ( $count > 0 ) {
        ?>
        <span class="cartcontents"><?php echo esc_html( $count ); ?></span>
        <?php
    }
        ?></a>
 
<?php } ?>
					<!--end of woocommerce cart icon-->

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
