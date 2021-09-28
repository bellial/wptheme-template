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
    load_theme_textdomain( 'chiconi', get_stylesheet_directory() . '/languages' );
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
    /**
     * Add support for custom navigation menus.
     */
    register_nav_menus( array(
        //'header' => __('Menu do Header', 'chiconi' ),
        'main' => __('Menu Principal', 'chiconi' ),
        'footer' => __('Menu do Rodapé', 'chiconi' ),
    ) );
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    // Adds <title> tag support
    add_theme_support( 'title-tag' );

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

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
$location_path = get_stylesheet_directory_uri();
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
		'theme_location'  => $menu_location, // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
		 'menu'            => '', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
		 'container'       => 'div', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
		 'container_class' => '', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
		// 'container_id'    => $menu_id, // (string) The ID that is applied to the container.
		 'menu_class'      => $menu_class, // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
		 'menu_id'         => $menu_id, // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
		 'echo'            => true, // (bool) Whether to echo the menu or return it. Default true.
		 'fallback_cb'     => 'wp_page_menu', // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
		 'before'          => '', // (string) Text before the link markup.
		 'after'           => '', // (string) Text after the link markup.
		 'link_before'     => '', // (string) Text before the link text.
		 'link_after'      => '', // (string) Text after the link text.
		//'items_wrap'      => '<ul>%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
		'item_spacing'      => 'preserve', // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
        'depth'           => 0, // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
		 'walker'          => '' // (object) Instance of a custom walker class.
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
   //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

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
    wp_enqueue_style( 'superfish', get_stylesheet_directory_uri() . '/assets/css/superfish.css', array(), false, 'all' );
	wp_enqueue_style( 'chiconi-stylesheet', get_stylesheet_uri());
   

	
	// scripts
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	//wp_enqueue_script( 'carousel', get_stylesheet_directory_uri() . '/assets/js/lib/owl.carousel.min.js', array('jquery'), '20151215', true );
	//wp_enqueue_script( 'maskedinput', get_stylesheet_directory_uri() . '/assets/js/lib/jquery.maskedinput.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'superfish', get_stylesheet_directory_uri() . '/assets/js/superfish.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'chiconi-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '_S_VERSION', true );
}
add_action( 'wp_enqueue_scripts', 'chiconi_scripts', 99 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function chiconi_register_sidebars() {
	
    register_sidebar( array(
         'name'          => esc_html__( 'Footer Section One', 'chiconi' ),
         'id'            => 'footer-section-one',
         'description'   => esc_html__( 'Widgets added here would appear inside the first section of the footer', 'chiconi' ),
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget'  => '</aside>',
         'before_title'  => '',
         'after_title'   => '',
     ) );
     register_sidebar( array(
        'name'          => esc_html__( 'Header Section One', 'chiconi' ),
        'id'            => 'header-section-one',
        'description'   => esc_html__( 'Widgets added here would appear inside the first section of the header', 'chiconi' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
 }
 add_action( 'widgets_init', 'chiconi_register_sidebars' );	

/**
 * Continuar Comprando para loja
 */

add_filter( 'woocommerce_continue_shopping_redirect', 'zb_change_continue_shopping' );

function zb_change_continue_shopping() {
return "https://erikachiconisemijoias.com.br/loja/";
}

/*woocommerce cart icon */

 /*Ensure cart contents update when products are added to the cart via AJAX*/
 

 function my_header_add_to_cart_fragment( $fragments ) {
 
	ob_start();

 	$cart_url =  WC()->cart->get_cart_url();
 	$cart_contents_count = WC()->cart->cart_contents_count;
 	$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'Carrinho'), $cart_contents_count);
 	$cart_total = WC()->cart->get_cart_total();

 	?><a class="fs-cart-contents" href="<?php echo $cart_url; ?>" title="Carrinho"><i class="fa fa-shopping-cart"></i><?php
 	if ( $cart_contents_count > 0 ) {
 	?>
 		<span class="cart-quantity"><?php echo $cart_contents_count; ?></span> <span class="cart-total"><?php echo $cart_total; ?></span>
 		<?php            
 	}
 	?></a>
     
     <?php
 
 	$fragments['a.fs-cart-contents'] = ob_get_clean();
     
 	return $fragments;
 }
 add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );
 


 add_filter( 'get_product_search_form' , 'me_custom_product_searchform' );



