<?php
/*
Plugin Name: image gallery
Plugin URI:
Description: Добавляет галлерею изображений
Author: 
Version: 1.0
Author URI:
*/

define('VS_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
$dir = plugin_dir_path( __FILE__ );

add_action( 'admin_enqueue_scripts', 'register_scripts' );

function register_scripts() {
	wp_register_script( 'pg_js', VS_PATH.'js/pg.js', array( 'jquery','media-upload','thickbox' ) );

	if ( ! did_action( 'wp_enqueue_media' ) ) {
		wp_enqueue_media();
	}
	wp_enqueue_script( 'pg_js' );
}

add_action( 'admin_enqueue_scripts', 'register_styles' );

function register_styles() {
	wp_enqueue_style('vswtcss', VS_PATH.'css/pg.css', false);
}

require_once $dir . 'inc/add_gallery_meta_boxes.php';
