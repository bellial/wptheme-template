<?php
/**
 * scher functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package scher
 */

require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/woocommerce.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'scher_setup' ) ) :

	function scher_setup() {
		remove_action( 'wp_head', 'rsd_link' );
	  remove_action( 'wp_head', 'wlwmanifest_link' );
	  remove_action( 'wp_head', 'wp_generator' );
	  remove_action( 'wp_head', 'feed_links', 2 );
	  remove_action( 'wp_head', 'feed_links_extra', 3 );
	  remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	  remove_action( 'wp_head', 'parent_post_rel_link' );
	  remove_action( 'wp_head', 'start_post_rel_link' );
	  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	  remove_action( 'wp_head', 'rss' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

    add_filter( 'style_loader_src', 'at_remove_wp_ver_css_js', 9999 );
	  add_filter( 'script_loader_src', 'at_remove_wp_ver_css_js', 9999 );
	  add_filter( 'body_class', 'add_slug_to_body_class' );
	  add_filter( 'login_headerurl', 'custom_logo_login_url' );
	  add_filter( 'login_headertitle', 'custom_logo_login_title' );
	  add_filter( 'admin_footer_text', 'custom_admin_footer' );
	  add_action( 'admin_bar_menu', 'remove_logo_toolbar', 999 );
    add_post_type_support( 'page', 'excerpt' );
    // add_filter( 'show_admin_bar', '__return_false' );
	  // add_filter( 'the_content', 'filter_ptags_on_images' );
	  // add_filter( 'tiny_mce_before_init', 'tinymce_remove_root_block_tag' );

	  add_action( 'init', 'register_default_menu' );
	  add_action( 'login_head', 'my_custom_login_logo' );
    add_action( 'widgets_init', 'remove_recent_comments_style' );

		// Add featured image support
		add_theme_support('post-thumbnails');

		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'scher_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'scher_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scher_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'scher_content_width', 640 );
}
add_action( 'after_setup_theme', 'scher_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scher_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Carrinho', 'scher' ),
		'id'            => 'carrinho',
		'description'   => esc_html__( 'Carrinho de compras.', 'scher' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="title-sidebar">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Formulário de busca', 'scher' ),
		'id'            => 'form-busca',
		'description'   => esc_html__( 'Sidebar produtos.', 'scher' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Filtros', 'scher' ),
		'id'            => 'filtro-busca',
		'description'   => esc_html__( 'Sidebar produtos.', 'scher' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'scher_widgets_init' );


# Incluir na busca
# ---------------------------------------------------------------------------------
// function shapeSpace_filter_search($query) {
// 	if (!$query->is_admin && $query->is_search) {
// 		$query->set('post_type', array('post'));
// 	} 
// 	return $query;
// }
// add_filter('pre_get_posts', 'shapeSpace_filter_search');


# Checks if there are any posts in the results
# ---------------------------------------------------------------------------------
function is_search_has_results() {
	return 0 != $GLOBALS['wp_query']->found_posts;
}


# Remove css inline - recentcoments
# ---------------------------------------------------------------------------------
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}


# Alterando logo do login
# ---------------------------------------------------------------------------------
$location_path = get_template_directory_uri();

function my_custom_login_logo() {
	global $location_path;
	echo '<style type="text/css">
		.login h1 a {
		background-image:url('.$location_path.'/assets/images/logo-scher-pb.png) !important;
		width: 175px;
		margin-bottom: 0;
		background-size: cover;
	}
	</style>';
}


# Custom login
# ---------------------------------------------------------------------------------
function tpw_enqueue_custom_admin_style() {
  echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/assets/css/custom-login.css" />';
}
add_action('login_head', 'tpw_enqueue_custom_admin_style');


# Remove tag <p> da imagem
# ---------------------------------------------------------------------------------
function filter_ptags_on_images($content) {
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

function tinymce_remove_root_block_tag( $init ) {
	$init['forced_root_block'] = false;
	return $init;
}


# Add page slug to body class, love this - Credit: Starkers Wordpress Theme
# ---------------------------------------------------------------------------------
function add_slug_to_body_class($classes) {
	global $post;
	if (is_home()) {
		$key = array_search('blog', $classes);
		if ($key > -1) {
		unset($classes[$key]);
	}
	} elseif (is_page()) {
		$classes[] = sanitize_html_class('page-' . $post->post_name);
	} elseif (is_singular()) {
		$classes[] = sanitize_html_class('page-' . $post->post_name);
	}
	return $classes;
}


# Customiza a URL da logo no login
# ---------------------------------------------------------------------------------
function custom_logo_login_url() {
	return home_url();
}


# Customiza o titulo da logo no login
# ---------------------------------------------------------------------------------
function custom_logo_login_title() {
	return get_bloginfo( 'name' );
}


# Customiza o rodapé no admin
# ---------------------------------------------------------------------------------
function custom_admin_footer() {
	echo '<a target="_blank" href="'.home_url().'">'.get_bloginfo( 'name' ).'</a> &copy; ' . date( 'Y' );
}


# Remove o logo do WordPress da barra de topo
# ---------------------------------------------------------------------------------
function remove_logo_toolbar( $wp_toolbar ) {
	global $wp_admin_bar;
	$wp_toolbar->remove_node( 'wp-logo' );
}


# Remove wp version param from any enqueued scripts
# ---------------------------------------------------------------------------------
function at_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
		return $src;
}


# Remove wp version meta tag and from rss feed
# ---------------------------------------------------------------------------------
function at_remove_wp_ver_meta_rss() {
	return '';
}


# Registrar menu
# ---------------------------------------------------------------------------------
function register_default_menu() {
  // Using array to specify more menus if needed
	register_nav_menus(array( 
		'header-menu' => __('Menu principal', 'default_menu'),
		'footer-institucional' => __('Menu institucional', 'default_menu'),
		'footer-informacoes' => __('Menu informações', 'default_menu'),
		'sidebar-menu' => __('Paginas', 'default_menu'),
	));
}


# Função para criar o menu
# ---------------------------------------------------------------------------------
function default_theme_nav($menu_location, $menu_class) {
	wp_nav_menu(
		array(
		'theme_location'  => $menu_location,
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => $menu_class,
		'container_id'    => '',
		'menu_class'      => 'nav',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}


# Limit excerpt
# ---------------------------------------------------------------------------------
function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}


/**
 * Enqueue scripts and styles.
 */
function scher_scripts() {
	wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/lbn0rhh.css' );
	wp_enqueue_style( 'scher-style', get_template_directory_uri() . '/style.css?v=4.1', array(), $version );
	wp_enqueue_style( 'scher-css', get_template_directory_uri() . '/assets/css/main.css', array(), $version );

	// script
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/lib/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/lib/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/assets/js/lib/jquery.maskedinput.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'script-main', get_template_directory_uri() . '/assets/js/min/build.min.js?version=1.3', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'scher_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

