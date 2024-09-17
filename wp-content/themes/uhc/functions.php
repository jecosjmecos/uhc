<?php

/**
 * Theme functions.
 *
 * @package WordPress
 * @subpackage UHC
 */

/**
 * Theme dependencies.
 */
add_action( 'after_setup_theme', 'load_theme_dependencies' );
function load_theme_dependencies(){
	// Register theme menus.
	register_nav_menus(
		[
			'header_menu'	=> esc_html__( 'Header Menu', 'UHC' ),
			'footer_menu'	=> esc_html__( 'Footer Menu', 'UHC' )
		]
	);

	// Please place all custom functions declarations in this file.
	require_once( 'theme-functions/theme-functions.php' );
}

/**
 * Theme initalization.
 */
add_action( 'init', 'init_theme' );
function init_theme(){
	load_theme_textdomain( 'UHC', get_stylesheet_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );

	 add_image_size( 'logo', 150);
	 add_image_size( 'logo-footer', 240);
	 add_image_size( 'banner-slider', 1240, 440, 1);
	 add_image_size( 'info-section', 350, 350, 1);
	 add_image_size( 'image-240-240', 240, 240, 1);
	 add_image_size( 'image-450-350', 450, 350, 1);
	 add_image_size( 'image-300-360', 300, 360, 1);
	 add_image_size( 'image-358-471', 358, 471, 1);
	 add_image_size( 'image-400-400', 400, 400, 1);
	 add_image_size( 'image-500-500', 500, 500, 1);
}

/**
 * Enqueue styles and scripts.
 */
function inclusion_enqueue(){
	// Random value to prevent caching.
	// Change to some value on production, for example: '1.0.0'.
	$ver_num = mt_rand();

	// Styles.
	wp_enqueue_style( 'main', get_template_directory_uri() . '/static/css/main.min.css', [], $ver_num, 'all' );
//	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', ['main'], $ver_num, 'all' );

	// Scripts.
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/static/js/main.min.js', ['jquery'], $ver_num, true );
}
add_action( 'wp_enqueue_scripts', 'inclusion_enqueue' );

// Add ACF Page Options.
if( function_exists( 'acf_add_options_page' ) ){
	acf_add_options_page(
		[
			'page_title' 	=> 'Theme options',
			'menu_title'	=> 'Theme options',
			'menu_slug' 	=> 'options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		]
	);
}

function get_post_back_link($post_id)
{
    $link = get_post_type_archive_link('post');
    $icon = get_template_directory() . '/src/images/arrow.svg';
    $icon = file_exists($icon) ? '<span>' . file_get_contents($icon) . '</span>' : '';

    $categories = wp_get_post_categories($post_id);

    foreach ($categories as $cat_id) {
        $category = get_category($cat_id);

        if($category->slug == 'bez-kategoriyi') continue;
        if($category->category_parent !== 0) continue;

        $link = get_category_link($category->term_id);
    }

    echo '<a href="' . $link . '">' . $icon . __('Back', 'uhc') . '</a>';
}

function remove_archive_title_prefix($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
}

add_filter('get_the_archive_title', 'remove_archive_title_prefix');

