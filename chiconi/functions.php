<?php
/**
 * chiconi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chiconi
 */

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 1200; /* pixels */ 

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'chiconi_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function chiconi_setup() {
      /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'chiconi', get_template_directory() . '/languages' );
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
    /**
     * Add support for custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'chiconi' ),
        'secondary' => __('Secondary Menu', 'chiconi' )
    ) );
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    /**
     * This feature enables plugins and themes to manage the document title tag. 
     * This should be used in place of wp_title() function. 
     */
    add_theme_support( 'title-tag' );

    /*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    //This feature enables Custom_Backgrounds support for a theme.
    add_theme_support( 'custom-background' );
    /**
     * Note that you can add default arguments using:
     * $defaults = array(
     *   'default-image'          => '',
     *   'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
     *   'default-position-x'     => 'left',    // 'left', 'center', 'right'
     *   'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
     *   'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
     *   'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
     *   'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
     *   'default-color'          => '',
     *   'wp-head-callback'       => '_custom_background_cb',
     *   'admin-head-callback'    => '',
     *   'admin-preview-callback' => '',
     *  );
     *add_theme_support( 'custom-background', $defaults );
    */
 
    // This feature enables Selective Refresh for Widgets being managed within the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	


    }

    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version
    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action('wp_head', 'print_emoji_detection_script', 7 );
    remove_action('wp_print_styles', 'print_emoji_styles' );  
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink  


endif; // chiconi_setup
add_action( 'after_setup_theme', 'chiconi_setup' );

# Remove wp version from any enqueued scripts
# ---------------------------------------------------------------------------------
function remove_css_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
    add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
    add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );

// remove wp version number from head and rss
function artisansweb_remove_version() {
    return '';
}
add_filter('the_generator', 'artisansweb_remove_version');

//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
    }
add_filter( 'body_class', 'add_slug_body_class' );

# Customiza a URL da logo no login
# ---------------------------------------------------------------------------------
function custom_logo_login_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'custom_logo_login_url' );

# Customiza o titulo da logo no login
# ---------------------------------------------------------------------------------
function custom_logo_login_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'custom_logo_login_title' );

# Customiza o rodapé no admin
# ---------------------------------------------------------------------------------
function custom_admin_footer() {
	echo '<a target="_blank" href="'.home_url().'">'.get_bloginfo( 'name' ).'</a> &copy; ' . date( 'Y' );
}
add_filter( 'admin_footer_text', 'custom_admin_footer' );

# Remove o logo do WordPress da barra de topo
# ---------------------------------------------------------------------------------
function remove_logo_toolbar( $wp_toolbar ) {
	global $wp_admin_bar;
	$wp_toolbar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'remove_logo_toolbar');

# Alterando logo do login (add a logo no PATH, depois descomentar)
# ---------------------------------------------------------------------------------
/*
$location_path = get_template_directory_uri();
function my_custom_login_logo() {
	global $location_path;
	echo '<style type="text/css">
		.login h1 a {
		background-image:url('.$location_path.'/assets/images/logo-ono.png) !important;
		width: 280px;
		height: 52px;
		margin-bottom: 0;
		background-size: cover;
	}
	</style>';
}
add_action( 'login_head', 'my_custom_login_logo' );
*/

# Remove Recent Comments
# ---------------------------------------------------------------------------------
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );

//Adding Custom Logo support to your Theme
function chiconi_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
/**
 * Displaying the custom logo in your theme 
 * if ( function_exists( 'the_custom_logo' ) ) {
 *  the_custom_logo();
 *}
 */ 
}
add_action( 'after_setup_theme', 'chiconi_custom_logo_setup' );

# Checks if there are any posts in the results
# ---------------------------------------------------------------------------------
function is_search_has_results() {
	return 0 != $GLOBALS['wp_query']->found_posts;
}

# Função para criar o menu
# ---------------------------------------------------------------------------------
function default_theme_nav($menu_location, $menu_class, $menu_id) {
	wp_nav_menu(
		array(
		'theme_location'  => $menu_location,
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => $menu_class,
		'container_id'    => $menu_id,
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

// Customize login header text.
add_filter( 'login_headertext', 'wpdoc_customize_login_headertext' );

function wpdoc_customize_login_headertext( $headertext ) {
    $headertext = esc_html__( 'Welcome to WordPress', 'plugin-textdomain' );
    return $headertext;
}

/*
* Remove JSON API links in header html
*/
function remove_json_api () {

    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

   // Remove all embeds rewrite rules.
   add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action( 'after_setup_theme', 'remove_json_api' );

/*
	Snippet completely disable the REST API and shows {"code":"rest_disabled","message":"The REST API is disabled on this site."} 
	when visiting http://yoursite.com/wp-json/
*/
function disable_json_api () {

    // Filters for WP-API version 1.x
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');
  
    // Filters for WP-API version 2.x
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');
  
  }
  add_action( 'after_setup_theme', 'disable_json_api' );

/**
 * Enqueue scripts and styles.
 */
function chiconi_scripts() {
	wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/uqw4hoo.css' ); 
    wp_enqueue_style( 'normalize',  get_stylesheet_directory_uri() . '/assets/css/normalize.css', array(), false, 'all' );
    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style( 'chiconi-stylesheet', get_stylesheet_uri(), array('normalize','bootstrap'), '_S_VERSION', 'all' );

	
	// scripts
	//wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/lib/bootstrap.min.js', array('jquery'), '20151215', true );
	//wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/lib/owl.carousel.min.js', array('jquery'), '20151215', true );
	//wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/assets/js/lib/jquery.maskedinput.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'chiconi-scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '_S_VERSION', true );
}
add_action( 'wp_enqueue_scripts', 'chiconi_scripts' );

/**
 * take a look at the paths and files below to understand better what they do
 */
/**
 * CPT
 *
*require get_template_directory() . '/cpt/acf.php';
*/
/**
 * Woocommerce
 *
*require get_template_directory() . '/inc/woocommerce.php';
*/
/**
 * Implement the Custom Header feature.
 *
*require get_template_directory() . '/inc/custom-header.php';
*/
/**
 * Custom template tags for this theme.
 *
*require get_template_directory() . '/inc/template-tags.php';
*/
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
*require get_template_directory() . '/inc/template-functions.php';
*/
/**
 * Customizer additions.
 *
*require get_template_directory() . '/inc/customizer.php';
*/

/**
 * Continuar Comprando para loja
 */

add_filter( 'woocommerce_continue_shopping_redirect', 'zb_change_continue_shopping' );

function zb_change_continue_shopping() {
return "https://erikachiconisemijoias.com.br/loja/";
}

/*woocommerce cart icon */
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 *

* function my_header_add_to_cart_fragment( $fragments ) {
 
* 	ob_start();

* 	$cart_url =  WC()->cart->get_cart_url();
* 	$cart_contents_count = WC()->cart->cart_contents_count;
* 	$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'Carrinho'), $cart_contents_count);
* 	$cart_total = WC()->cart->get_cart_total();

* 	?><a class="fs-cart-contents" href="<?php echo $cart_url; ?>" title="Carrinho"><i class="fa fa-shopping-cart"></i><?php
* 	if ( $cart_contents_count > 0 ) {
* 	?>
* 		<span class="cart-quantity"><?php echo $cart_contents_count; ?></span> <span class="cart-total"><?php echo $cart_total; ?></span>
* 		<?php            
* 	}
* 	?></a><?php
 
* 	$fragments['a.fs-cart-contents'] = ob_get_clean();
     
* 	return $fragments;
* }
* add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );
*/

