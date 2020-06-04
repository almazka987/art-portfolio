<?php
// Styles & Scripts
require_once( get_template_directory() . '/inc/assets.php' );

// Widgets
require_once( get_stylesheet_directory() . '/inc/widgets.php' );

// Register post type
require_once( get_stylesheet_directory() . '/inc/register-post-type.php' );

// Duplicater
require_once( get_stylesheet_directory() . '/inc/duplicate-posts.php' );

// Debug
if ( ! function_exists( 'pr' ) ) {
	function pr( $val ) {
		echo '<pre style="font-size: 16px; color: black;">';
		print_r( $val );
		echo '</pre>';
	}
}

// add images thumbnails
add_theme_support( 'post-thumbnails' );

// custom image size
// add_image_size( 'sizeLogo', 220, 155, true );

// register menu
function theme_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

// Options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Главные настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'icon_url' => 'dashicons-images-alt2',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Свойства хедера',
		'menu_title'	=> 'Шапка сайта',
		'menu_slug' 	=> 'theme-header-settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Свойства футера',
		'menu_title'	=> 'Подвал сайта',
		'menu_slug' 	=> 'theme-footer-settings',
		'parent_slug'	=> 'theme-general-settings',
	));

}
