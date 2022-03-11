<?php
/**
 * WiredBeauty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage WiredBeauty
 * @since WiredBeauty 1.0
 */

define( 'ASSETS_URL', get_template_directory_uri()."/assets" );

// scripts & styles
add_action( 'wp_enqueue_scripts', function() {
    wp_register_script('general', ASSETS_URL."/general.js", array(), wp_get_theme()->get( 'Version' ), true );  
    wp_enqueue_script('general');  
    wp_enqueue_style( 'styles', ASSETS_URL."/general.css", array(), wp_get_theme()->get( 'Version' ) );
} );

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'edit.php' ); 
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// Menu
function register_my_menu() {
    register_nav_menu('header-menu',__( 'Menu Header' ));
  }
  add_action( 'init', 'register_my_menu' );