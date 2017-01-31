<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function child_scripts_and_styles()
{
    if (!is_admin()) {


        // Custom javascript
        wp_enqueue_script('Matchheight', get_stylesheet_directory_uri() . '/js/plugins/jquery.matchHeight-min.js', null, null, true);
        wp_register_script('global', get_stylesheet_directory_uri() . '/js/global.js', null, null, true);

        wp_localize_script('global', 'ajaxSettings', array(
            'url' => admin_url('admin-ajax.php'),
            'base' => get_bloginfo('url'),
            'isHome' => is_home(),
            'isSinle' => is_single(),
            'postType' => get_post_type(),
            'xhr' => false,
            'isFront' => is_front_page(),
            'is_user' => is_user_logged_in(),
            'templates' => get_bloginfo('template_url'),
            'templateName' => get_page_template_slug(),
            'timer' => NULL,
            'nonce' => wp_create_nonce('ajax-nonce')
        ));
        wp_enqueue_script('global');


    }
}

add_action('wp_enqueue_scripts', 'child_scripts_and_styles');

function wdm_add_custom_fields()
{
   echo get_field('shortcode_button_product');
}
add_action( 'woocommerce_single_product_summary', 'wdm_add_custom_fields', 21 );

function product_btn_func ($atts) {
    extract(shortcode_atts (array(
        'name' => 'Name button'
    ), $atts));

    echo "<div class='ajax-result'>";

            echo "</div>";

    return "<div class='product_btn'><a href='#'>{$name}</a></div>";

}
add_shortcode ('product_btn', 'product_btn_func');


// Product Page Ajax

function product_ajax(){
    ob_start(); ?>

    <?php include_once ('next_event.php'); ?>

    <?php $output = ob_get_clean();
    echo json_encode($output);

    die();
}

add_action('wp_ajax_single-product-ajax', 'product_ajax');
add_action('wp_ajax_nopriv_single-product-ajax', 'product_ajax');


// Product Page Ajax