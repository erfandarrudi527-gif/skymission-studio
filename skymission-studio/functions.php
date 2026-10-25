<?php
/**
 * SkyMission Studio — Elementor + WooCommerce integration.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SKYMISSION_VERSION', '3.0.0' );
define( 'SKYMISSION_THEME_DIR', get_template_directory() );
define( 'SKYMISSION_THEME_URI', get_template_directory_uri() );

function skymission_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array('height'=>100,'width'=>300,'flex-height'=>true,'flex-width'=>true) );
    add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption','style','script') );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'woocommerce' );
    register_nav_menus( array('primary'=>__('Primary Menu','skymission-studio')) );
}
add_action( 'after_setup_theme', 'skymission_setup' );

function skymission_assets() {
    wp_enqueue_style('skymission-fonts','https://fonts.googleapis.com/css2?family=Syne+Mono&family=Inter:wght@300;400;500;600;700;900&display=swap',array(),null);
    wp_enqueue_style('skymission-style',get_stylesheet_uri(),array(),SKYMISSION_VERSION);
    wp_enqueue_script('skymission-script',get_template_directory_uri().'/script.js',array(),SKYMISSION_VERSION,true);
}
add_action('wp_enqueue_scripts','skymission_assets');

/* Elementor Pro Theme Builder locations. */
function skymission_register_elementor_locations($manager) {
    if (method_exists($manager,'register_all_core_location')) $manager->register_all_core_location();
}
add_action('elementor/theme/register_locations','skymission_register_elementor_locations');

/* WooCommerce support. */
function skymission_wc_wrapper_start() { echo '<main id="primary" class="site-main skymission-wc-main"><div class="skymission-wc-wrap">'; }
function skymission_wc_wrapper_end() { echo '</div></main>'; }
add_action('woocommerce_before_main_content','skymission_wc_wrapper_start',10);
add_action('woocommerce_after_main_content','skymission_wc_wrapper_end',10);

/* Keep WooCommerce template CSS from being constrained by the one-page layout. */
function skymission_wc_assets() {
    if (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
        wp_enqueue_style('skymission-style',get_stylesheet_uri(),array(),SKYMISSION_VERSION);
    }
}
add_action('wp_enqueue_scripts','skymission_wc_assets',20);

/* ---------------- Elementor custom section widgets ---------------- */
function skymission_register_custom_widgets($widgets_manager) {
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/trait-skymission-style.php';
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/class-skymission-hero.php';
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/class-skymission-how.php';
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/class-skymission-services.php';
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/class-skymission-why.php';
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/class-skymission-faq.php';
    require_once SKYMISSION_THEME_DIR . '/elementor-widgets/class-skymission-cta.php';
    $widgets_manager->register(new \SkyMission_Hero_Widget());
    $widgets_manager->register(new \SkyMission_How_Widget());
    $widgets_manager->register(new \SkyMission_Services_Widget());
    $widgets_manager->register(new \SkyMission_Why_Widget());
    $widgets_manager->register(new \SkyMission_FAQ_Widget());
    $widgets_manager->register(new \SkyMission_CTA_Widget());
}
add_action('elementor/widgets/register','skymission_register_custom_widgets');

/* Create the starter page as SIX independent Elementor widgets, not one HTML block. */
function skymission_make_elementor_home() {
    $page = get_page_by_title('SkyMission Home',OBJECT,'page');
    if (!$page) {
        $page_id = wp_insert_post(array('post_title'=>'SkyMission Home','post_status'=>'publish','post_type'=>'page'));
        if (!$page_id || is_wp_error($page_id)) return;
    } else { $page_id = $page->ID; }

    $data=[];
    foreach (array('hero','how','services','why','faq','cta') as $type) {
        $data[] = array(
            'id' => substr(md5('skymission-'.$type),0,7),
            'elType' => 'widget',
            'isInner' => false,
            'widgetType' => 'skymission_'.$type,
            'settings' => array(),
            'elements' => array(),
        );
    }
    update_post_meta($page_id,'_elementor_edit_mode','builder');
    update_post_meta($page_id,'_elementor_data',wp_slash(wp_json_encode($data)));
    update_post_meta($page_id,'_elementor_page_settings',array());
    update_post_meta($page_id,'_wp_page_template','default');
    update_option('page_on_front',$page_id);
    update_option('show_on_front','page');
    update_option('skymission_elementor_sections_version','3');
}
add_action('after_switch_theme','skymission_make_elementor_home');

/* If the theme is activated while Elementor is already active, ensure the starter page exists. */
function skymission_maybe_create_home() {
    if (get_option('skymission_elementor_sections_version') === '3') return;
    if (did_action('elementor/loaded')) skymission_make_elementor_home();
}
add_action('admin_init','skymission_maybe_create_home');

require_once SKYMISSION_THEME_DIR . '/elementor-widgets.php';
