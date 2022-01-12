<?php

/**
 * your-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package your-theme
 */

//Turn on all error reporting
error_reporting();//error_reporting(0) to turn off

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */

if ( ! isset( $content_width ) ) 
	$content_width = 960;

// Replace the version number of the theme on each release.
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('yourtheme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function yourtheme_setup() {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         * The .mo files must use language-only filenames, like languages/de_DE.mo in your theme directory.
         * Unlike plugin language files, a name like my_theme-de_DE.mo will NOT work. 
         * Although plugin language files allow you to specify the text-domain in the filename, this will NOT work with themes. 
         * Language files for themes should include the language shortcut ONLY.
         */

        load_theme_textdomain('your-theme', get_stylesheet_directory() . '/languages');

        /**
         * This feature enables Post Thumbnails (https://codex.wordpress.org/Post_Thumbnails) support for a theme. 
         * Note that you can optionally pass a second argument, $args, 
         * with an array of the Post Types (https://codex.wordpress.org/Post_Types) for which you want to enable this feature.
         */

        add_theme_support('post-thumbnails');
        //add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
        //add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only
        //add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) ); // Posts and Movies

        /**
         * To display thumbnails in themes index.php or single.php or custom templates, use:
         * 
         * the_post_thumbnail();
         * 
         * To check if there is a post thumbnail assigned to the post before displaying it, use:
         * 
         * if ( has_post_thumbnail() ) {
         *  the_post_thumbnail();
         * }
         */

        /**
         * Registers navigation menu locations for a theme.
         * Use register_nav_menu() for creating a single menu. 
         * See Navigation Menus (https://codex.wordpress.org/Navigation_Menus) for adding theme support.
         */

        register_nav_menus(array(
            'header' => __('Header Menu', 'your-theme'),
            'main' => __('Main Menu', 'your-theme'),
            'footer' => __('Footer Menu', 'your-theme'),
        ));
     
        /**
         * This feature enables Post Formats support for a theme. When using child themes, be aware that it
         * will override the formats as defined by the parent theme, not add to it.
         */

        add_theme_support('post-formats');
        
        /**
         * To enable the specific formats (see supported formats at Post Formats), use:
         * add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
         * To check if there is a ‘quote’ post format assigned to the post, use has_post_format():
         * // In your theme single.php, page.php or custom post type
         * if ( has_post_format( 'quote' ) ) {
         *  echo 'This is a quote.';
         * }
         */

         // This feature enables plugins and themes to manage the document title tag (https://codex.wordpress.org/Title_Tag). 

        add_theme_support('title-tag');

           // Enables Theme_Logo (https://codex.wordpress.org/Theme_Logo) support for a theme.

           add_theme_support('custom-logo');

           /**
            * Note that you can add default arguments using:
            * add_theme_support( 'custom-logo', array(
            *     'height'               => 100,
            *     'width'                => 400,
            *     'flex-height'          => true,
            *     'flex-width'           => true,
            *     'header-text'          => array( 'site-title', 'site-description' ),
            *     'unlink-homepage-logo' => true,
            * ) );
            */

             /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */

        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

        //This feature enables Custom_Backgrounds (https://codex.wordpress.org/Custom_Backgrounds) support for a theme.

        add_theme_support('custom-background');

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
    
        /* woocommerce theme support with integrated plugins*/

        add_theme_support('woocommerce', array(
            'thumbnail_image_width' => 150,
            'single_image_width'    => 500,
            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 1,
                'max_columns'     => 4,
            ),
        ));
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
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
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles'); // Disabling emoji library from Wordpress.
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink  
    remove_action('wp_head', 'rest_output_link_wp_head', 10); //Disable Link header for the REST API
    remove_action('template_redirect', 'rest_output_link_header', 11, 0); //Disable Link header for the REST API
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10); //Remove oEmbed discovery links
    remove_action('wp_head', 'rest_output_link_wp_head', 10); // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
    remove_action('rest_api_init', 'wp_oembed_register_route'); // Remove the REST API endpoint.
    add_filter('embed_oembed_discover', '__return_false'); // Turn off oEmbed auto discovery.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // Don't filter oEmbed results.
    remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_host_js'); // Remove oEmbed-specific JavaScript from the front-end and back-end.
    // Remove all embeds rewrite rules.
    //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10); // Disable the hooks so that their order can be changed.
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 21); // Put the price after.

endif; // your-theme_setup

add_action('after_setup_theme', 'your-theme_setup');

//Add quantity label before quantity field in woocommerce

add_action('woocommerce_before_add_to_cart_quantity', 'wp_echo_qty_front_add_cart');

function wp_echo_qty_front_add_cart() {
    echo '<div class="qty">QTD </div>';
}


/* Remove wp version from any enqueued scripts
* --------------------------------------------------------------------------------- */

function remove_css_js_version($src) {
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}

add_filter('style_loader_src', 'remove_css_js_version', 9999);
add_filter('script_loader_src', 'remove_css_js_version', 9999);

// remove wp version number from head and rss

function remove_version() {
    return '';
}

add_filter('the_generator', 'remove_version');

//change section heading in woocommerce

add_filter('gettext',  'translate_words_array');
add_filter('ngettext',  'translate_words_array');

function translate_words_array($translated) {
    $words = array(
        // 'word to translate' = > 'translation'
        'Produtos relacionados' => 'Quem viu também gostou',
    );
    $translated = str_ireplace(array_keys($words),  $words,  $translated);
    return $translated;
}

//Page Slug Body Class

function add_slug_body_class($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

add_filter('body_class', 'add_slug_body_class');

/* Custom logo URL on login page
* --------------------------------------------------------------------------------- */

function custom_logo_login_url() {
    return home_url();
}

add_filter('login_headerurl', 'custom_logo_login_url');

/* Custom admin footer
* --------------------------------------------------------------------------------- */

function custom_admin_footer() {
    echo '<a target="_blank" href="' . home_url() . '">' . get_bloginfo('name') . '</a> &copy; ' . date('Y');
}

add_filter('admin_footer_text', 'custom_admin_footer');

/* Remove WordPress logo from top bar
* --------------------------------------------------------------------------------- */

function remove_logo_toolbar($wp_toolbar) {
    global $wp_admin_bar;
    $wp_toolbar->remove_node('wp-logo');
}

add_action('admin_bar_menu', 'remove_logo_toolbar');

/* Add custom logo in WordPress login screen
* --------------------------------------------------------------------------------- */

$location_path = get_stylesheet_directory_uri();
function my_custom_login_logo() {
    global $location_path;
    echo '<style type="text/css">
		.login h1 a {
		background-image:url(' . $location_path . '/assets/images/Logo-header.png);
		width: 280px;
		height: 52px;
		margin-bottom: 0;
		background-size: cover;
	}
	</style>';
}

add_action('login_head', 'my_custom_login_logo');

/* Custom logo title on login page
* --------------------------------------------------------------------------------- */

function custom_logo_login_title() {
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'custom_logo_login_title');

/* Remove Recent Comments
* --------------------------------------------------------------------------------- */

function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');

/* Checks if there are any posts in the results
* --------------------------------------------------------------------------------- */

function is_search_has_results() {
    return 0 != $GLOBALS['wp_query']->found_posts;
}

/* Function to create the menu
* --------------------------------------------------------------------------------- */

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

// Custom login header text.

add_filter('login_headertext', 'customize_login_headertext');

function customize_login_headertext($headertext) {
    $headertext = esc_html__('Welcome', 'plugin-textdomain');
    return $headertext;
}

/*
* Remove JSON API links in header html
*/

function remove_json_api(){

    // Remove the REST API lines from the HTML Header
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    add_filter('embed_oembed_discover', '__return_false');

    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Remove all embeds rewrite rules.
    //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

}
add_action('after_setup_theme', 'remove_json_api');

/**
 * Snippet completely disable the REST API and shows {"code":"rest_disabled","message":"The REST API is disabled on this site."} 
 * when visiting http://yoursite.com/wp-json/
 */

function disable_json_api() {

    // Filters for WP-API version 1.x
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');

    // Filters for WP-API version 2.x
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');
}

add_action('after_setup_theme', 'disable_json_api');

/**
 * Enqueue scripts and styles.
 */

function yourtheme_scripts() {
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/xxxxxx.css');
    wp_enqueue_style('normalize',  get_stylesheet_directory_uri() . '/assets/css/normalize.css', array(), false, 'all');
    wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), false, 'all');
    wp_enqueue_style('slick-theme-css', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css', array(), false, 'all');
    wp_enqueue_style('your-theme-stylesheet', get_stylesheet_uri(), array(), 'THEME_VERSION');

    // scripts
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('your-theme-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), 'THEME_VERSION', true);
}

add_action('wp_enqueue_scripts', 'yourtheme_scripts', 99);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function yourtheme_register_sidebars() {

    register_sidebar(array(
        'name'          => esc_html__('Footer Section One', 'your-theme'),
        'id'            => 'footer-section-one',
        'description'   => esc_html__('Widgets added here would appear inside the first section of the footer', 'your-theme'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Header Section One', 'your-theme'),
        'id'            => 'header-section-one',
        'description'   => esc_html__('Widgets added here would appear inside the first section of the header', 'your-theme'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Home Section One', 'your-theme'),
        'id'            => 'home-section-one',
        'description'   => esc_html__('Widgets added here would appear inside the first section of the home', 'your-theme'),
        'before_widget' => '<aside id="%1$s" class="row mx-auto my-auto justify-content-center %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Home Section Two', 'your-theme'),
        'id'            => 'home-section-two',
        'description'   => esc_html__('Widgets added here would appear inside the second section of the home', 'your-theme'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'          => esc_html__('404 Page', 'your-theme'),
        'id'            => '404',
        'description'   => esc_html__('Widgets added here would appear inside the 404 page', 'your-theme'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '',
        'after_title'   => '',
    ));
}

add_action('widgets_init', 'your-theme_register_sidebars');

/**
 * Continue shopping redirect
 */

add_filter('woocommerce_continue_shopping_redirect', 'change_continue_shopping');

function change_continue_shopping() {
    return "https://yoursite.com.br/shop/";
}

/**
 * Show cart contents / total Ajax
 */

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce;

    ob_start();

?>
    <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('Cart', 'your-theme'); ?>">
        <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'your-theme'), $woocommerce->cart->cart_contents_count); ?> – <?php echo $woocommerce->cart->get_cart_total(); ?>
    </a>
<?php
    $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}

add_filter('get_product_search_form', 'me_custom_product_searchform');

/**
 * Filter WooCommerce Search Field
 *
 */

function me_custom_product_searchform( $form ) {
	
    $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
                    <div>
                            <label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
                            <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'My Search form', 'woocommerce' ) . '" />
                            <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'woocommerce' ) .'" />
                            <input type="hidden" name="post_type" value="product" />
                    </div>
            </form>';

return $form;
}

// Replaces the excerpt "Read More" text by a link

function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="' . get_permalink($post->ID) . '"> [...]</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

// Create options page on wp admin sidebar to be used by ACF plugin

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'menu_title' => 'Redes Sociais',
        'page_title' => 'Redes Sociais',
        'position' => '99',
        'menu_slug' => 'pagina_opcoes',
        // 'parent_slug' => 'options-general.php',
        'update_button' => 'Atualizar',
        'updated_message' => 'Alterações feitas com sucesso.',
        'icon_url' => 'dashicons-welcome-widgets-menus'
    ]);
}

//woocommerce product template file

function get_custom_post_type_template($single_template) {
    global $post;

    if ($post->post_type == 'product') {
        $single_template = dirname(__FILE__) . '/single-template.php';
    }
    return $single_template;
}

add_filter('single_template', 'get_custom_post_type_template');

//remove woocommerce reviews tab

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs) {
    unset($tabs['reviews']); // Remove the reviews tab
    return $tabs;
}

//shortcode para parcelamento na grid dos produtos (plugin)

function parcelamento(){
	global $product;
    $prefix = 
	$taxa_de_juros = esc_html(get_option('parcelas_mwp_juros'));
	$total_meses=esc_html(get_option('parcelas_mwp_qtde'));
	$total_meses_s_juros=esc_html(get_option('parcelas_mwp_qtde_s_juros'));
	$investimento_inicial = $product->price;
    $min_value = $total_meses;

/**
 * Get product final price
 *
 * @var     string $price
 */
$price = $product->get_price_including_tax();

if ($price <= $min_value){
    $installments_html = '';
} elseif ($price > $min_value){
    $installments_price = $price / $total_meses;
    $formatted_installments_price = wc_price($price / $total_meses);

    if ($installments_price < $min_value){
        while ($total_meses > 2 && $installments_price < $min_value){
            $total_meses--;
            $installments_price = $price / $total_meses;
            $formatted_installments_price = wc_price($price / $total_meses);
        }
        if ($installments_price >= $min_value){
            $installments_html = "<div class='box_parcelas_mwp $class'>";
            $installments_html .= "<p class='price fswp_calc'><span class='parcelas_mwp_list_pre'>".esc_html($total_meses) ."x de </span>" .$formatted_installments_price ." <span class='fswp_installment_suffix'></span></p>";
            $installments_html .= "</div>";
        } else{
            $installments_html = '';
        }
    } else{
        $installments_html = "<div class='box_parcelas_mwp $class'>";
        $installments_html .= "<p class='price fswp_calc'><span class='parcelas_mwp_list_pre'>".esc_html($total_meses) ."x de </span>" .$formatted_installments_price ." <span class='fswp_installment_suffix'></span></p>";
        $installments_html .= "</div>";
    }
}

echo apply_filters('fswp_installments_calc_output', $installments_html, $total_meses, $formatted_installments_price);
}

add_shortcode( 'parcelas_mwp', 'parcelamento' );

// WP Query Shortcode to pull woocommerce products dynamically
/**
 * Create WooCommerce Featured Image Loop Slider
 */

function woo_featured_image_loop() {
    ob_start();

    //slick start
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8
    );
    $post_query = new WP_Query($args);?>

    <div id="carrossel-lancamentos" class="posts-carousel">
        <?php
        if ($post_query->have_posts()) :
            while ($post_query->have_posts()) :
                $post_query->the_post();
                global $product; ?>
                <div class="card">
                    <div class="itemLancamento card-body">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="card-text d-block text-center">
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="card-img-top">
                        </a>
                        <?php the_title('<h3 class="card-title">', '</h3>'); ?>
                        <p class="descricao">
                            <?php echo $product->get_short_description(); ?>
                        </p>
                        <span class="valor">
                            <?php echo $product->get_price_html(); ?>
                        </span>
                        <span class="parcela">
                            <?php echo do_shortcode("[parcelas_mwp]"); ?>
                        </span>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-comprar">Comprar</a>
                    </div><!--itemLancamento-->
                </div><!--card-->
    <?php
            endwhile;
        endif;
        wp_reset_postdata();
        return ob_get_clean();
    ?>
    </div><!--posts-carousel-->
    <?php
}
add_shortcode('woo_featured_image', 'woo_featured_image_loop');

    // WP Query Shortcode to pull woocommerce products dynamically
     /**
     * Create WooCommerce Featured Image Loop Slider
     */

    function woo_loja_image_loop() {
        ob_start();

        //slick start
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8
        );
        $post_query = new WP_Query($args); ?>

        <div id="carrossel-lancamentos" class="loja-carousel">
            <?php
            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) :
                    $post_query->the_post();
                    global $product; ?>
                    <div class="card">
                        <div class="itemLancamento card-body">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="card-text d-block text-center">
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="card-img-top">
                            </a>
                            <?php the_title('<h3 class="card-title">', '</h3>'); ?>
                            <p class="descricao">
                                <?php echo $product->get_short_description(); ?>
                            </p>
                            <span class="valor">
                                <?php echo $product->get_price_html(); ?>
                            </span>
                            <span class="parcela">
                            <?php echo do_shortcode("[parcelas_mwp]"); ?>
                        </span>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-comprar">Comprar</a>
                        </div><!--itemLancamento-->
                    </div><!--card-->
        <?php
                endwhile;
            endif;
            wp_reset_postdata();
            return ob_get_clean();
        ?>
        </div><!--loja-carousel-->
        <?php
        }
        add_shortcode('woo_loja_image', 'woo_loja_image_loop');
        
