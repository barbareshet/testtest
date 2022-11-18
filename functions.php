<?php

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));
	
};

function initSidebarWidgetArea() {

    register_sidebar(
        array(
            'name' => 'Footer Sidebar',
            'id' => 'footer-sidebar-1',
            'description' => 'Appears in the footer area',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) 
    );

    register_sidebar( 
        array(
            'name' => 'Share Modal',
            'id' => 'share-modal',
            'description' => 'Appears in the share modal modal',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) 
    );

};

add_action( 'widgets_init', 'initSidebarWidgetArea');

function more_posts() {
    global $wp_query;
    return $wp_query->current_post + 1 < $wp_query->post_count;
}

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );

/**
 * Functions and definitions
 *
 * @package MJK
 */

use MJK\App\Core\Init;
use MJK\App\Setup;
use MJK\App\Scripts;
use MJK\App\PostTypes;
use MJK\App\Taxonomies;
use MJK\App\Blocks\Blocks;
use MJK\App\Media;
use MJK\App\ACF;
use MJK\App\Admin\Gutenberg;
use MJK\App\Sidebars\PrimarySidebar;
use MJK\App\Sidebars\HomeSidebar;
use MJK\App\WooCommerce\Admin as WooCommerceAdmin;
use MJK\App\WooCommerce\Frontend as WooCommerceFrontend;
use MJK\App\Components\FormModal as FormModalComponent;

/**
 * Define Theme Version
 * Define Theme directories
 * Defines custom Hybrid Core directories.
 */
define( 'THEME_VERSION', '1.1.2' );
define( 'MJK_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'MJK_THEME_PATH_URL', trailingslashit( get_template_directory_uri() ) );

// Require Autoloader
require_once 'vendor/autoload.php';

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function starter_kit_allowed_block_types( $allowed_blocks, $post ) {
    // need to add to the list as more blocks are added
    $main_array = array(
		'acf/accordions',
		'acf/banner',
		'acf/cards',
        'acf/carousels',
        'acf/fifty-fifty-spacing',
		'acf/form',
		'acf/hero',
        'acf/home-carousel',
        'acf/home-hero-banner',
        'acf/image',
        'acf/listing',
		'acf/map',
		'acf/mixed-content',
		'acf/stroke',
		'acf/table',
		'acf/tabs',
        'acf/testimonials',
		'acf/text',
        'acf/video',
        'core/shortcode'
    );

    $post_array_blocks = array(
        'core/preformatted',
        'core/code',
        'core/freeform',
        'core/html',
        'core/pullquote',
        'core/table',
        'core/verse',
        'core/button',
        'core/columns',
        'core/media-text',
        'core/more',
        'core/nextpage',
        'core/separator',
        'core/spacer',
        'core/paragraph',
        'core/image',
        'core/heading',
        'core/gallery',
        'core/list',
        'core/quote',
        'core/audio',
        'core/cover',
        'core/file',
        'core/video',
        'core/shortcode',
        'core/archives',
        'core/categories',
        'core/latest-comments',
        'core/latest-posts',
        'core/embed'
    );

    if ($post->post_type === "post") {
        return $post_array_blocks;
    }

    if (($post->post_type === "page" && strpos(get_page_template(), 'page.php') !== false)) {
        return $main_array;
    }

    return $allowed_blocks;
}

add_filter( 'allowed_block_types', 'starter_kit_allowed_block_types', 10, 2 );

add_filter( 'widget_text', 'do_shortcode' );

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function () {

    $init = new Init();

    $init->add( new Gutenberg() );

    $init->add( new Setup() );
    $init->add( new Scripts() );
    $init->add( new PostTypes() );
    $init->add( new Blocks() );
    $init->add( new ACF() );
    $init->add( new PrimarySidebar() );
    $init->add( new HomeSidebar() );
    $init->add( new WooCommerceAdmin() );
    $init->add( new WooCommerceFrontend() );
    $init->add( new FormModalComponent() );
    $init->add( new Taxonomies() );

    $init->initialize();

    new Krumo();
    new Media();

    // Translation setup
    load_theme_textdomain( 'mjk', MJK_THEME_DIR . '/lang' );

    // Add automatic feed links in header
    add_theme_support( 'automatic-feed-links' );

    // Add Post Thumbnail Image sizes and support
    add_theme_support( 'post-thumbnails' );

    // Add title tag support for Yoast
    add_theme_support( 'title-tag' );

    // Switch default core markup to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ) );

    add_theme_support( 'woocommerce' );

} );


function my_admin_add_js() {
    include( 'assets/icons.svg' );

    ?>
    <script>
    window.onload = function () {
        var getBlockList = function(){
            wp.data.select( 'core/editor' ).getBlocks();
        };
        let blockList = getBlockList();
        wp.data.subscribe(() => {
            const newBlockList = getBlockList();
            const blockListChanged = newBlockList !== blockList;
            blockList = newBlockList;
            if ( blockListChanged ) {
                if ( window.lazyLoadInstance ) {
                    // console.log("fasdf", window.lazyLoadInstance);
                }
            }
        });
    }
    jQuery(document).ready(function(){
        setTimeout(function(){
            jQuery(".tab-content .tab-pane:first").addClass("show active");
        }, 5000);
        setInterval(function(){
            window.lazyLoadInstance.update();
        }, 2000);
    });
    </script>
<?php
}
add_action('admin_footer', 'my_admin_add_js');


/**
* Change src and srcset to data-src and data-srcset, and add class 'lazyload'
* @param $attributes
* @return mixed
*/
add_filter( 'wp_get_attachment_image_attributes', 'gs_change_attachment_image_markup' );
function gs_change_attachment_image_markup($attributes) {
    if (isset($attributes['src'])) {
        $attributes['data-src'] = $attributes['src'];
        $attributes['src'] = ""; //could add default small image or a base64 encoded small image here
    }
    if (isset($attributes['srcset'])) {
        $attributes['data-srcset'] = $attributes['srcset'];
        $attributes['srcset'] = "";
    }
    $attributes['class'] .= ' lazy';
    return $attributes;

}


add_filter('acf/format_value/type=wysiwyg', 'format_value_wysiwyg', 10, 3);
function format_value_wysiwyg( $content, $post_id, $field ) {
    $content = preg_replace("/<img(.*?)(src=|srcset=)(.*?)>/i", '<img$1data-$2$3>', $content);

    //-- Add .lazy class to each image that already has a class.
    $content = preg_replace('/<img(.*?)class=\"(.*?)\"(.*?)>/i', '<img$1class="$2 lazy"$3>', $content);

    //-- Add .lazy class to each image that doesn't already have a class.
    $content = preg_replace('/<img((.(?!class=))*)\/?>/i', '<img class="lazy"$1>', $content);

    return $content;
}