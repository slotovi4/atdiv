<?php

//подключаю css
function add_stylesheet() {
   wp_enqueue_style( 'libs_css', get_template_directory_uri() . '/css/libs.min.css');
   wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/main.css');
}
add_action('wp_print_styles', 'add_stylesheet');

//подключаю js
function add_js(){
   wp_enqueue_script( 'libs_js', get_template_directory_uri() . '/js/libs.min.js');
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js');
   wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/settings.min.js');
}
add_action( 'wp_enqueue_scripts', 'add_js' );

//подключаю миниатюры
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

//расположение меню
add_action( 'after_setup_theme', 'atdiv_register_nav_menu' );
function atdiv_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}

//получить минимальное значение
function get_min_value($array)
{
   $min_value = $array[0];
   foreach ($array as $value) {
      if ($min_value > $value)
         $min_value = $value;
   }

   return $min_value;
}

//получить максимальное значение
function get_max_value($array)
{
   $max_value = $array[0];
   foreach ($array as $value) {
      if ($max_value < $value)
         $max_value = $value;
   }

   return $max_value;
}
