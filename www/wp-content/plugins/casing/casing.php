<?php
/*
   Plugin Name: casing
   Description: Добавляет пост "Обивка", настройки: "Цена", "Узор", "Плотность", "Цвет", "Категория"
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

require_once( plugin_dir_path( __FILE__ ) . '/casing-price/casing-price.php' );	      //Цена обивки
require_once( plugin_dir_path( __FILE__ ) . '/casing-pattern/casing-pattern.php' );	   //Узор обивки
require_once( plugin_dir_path( __FILE__ ) . '/casing-density/casing-density.php' );	   //Плотность обивки
require_once( plugin_dir_path( __FILE__ ) . '/casing-color/casing-color.php' );	      //Цвет обивки
require_once( plugin_dir_path( __FILE__ ) . '/casing-category/casing-category.php' );	//Категория обивки

add_action('init', 'register_post_casing');
function register_post_casing() {
	register_post_type('casing', array(
		'labels' => array(
			'name'               => 'Обивка',                // основное название для типа записи
			'singular_name'      => 'Обивка',                // название для одной записи этого типа
			'add_new'            => 'Добавить запись',       // для добавления новой записи
			'add_new_item'       => 'Добавление записи',     // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование записи', // для редактирования типа записи
			'menu_name'          => 'Обивка',                // название меню
		),
		'public'              => true,
		'show_in_menu'        => true,                      // показывать ли в меню адмнки
		'supports'            => array('title', 'thumbnail', 'excerpt')    // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	) );
}

//Категория обивки
add_action('init', 'register_category_casing');
function register_category_casing() {
	register_taxonomy('casing_category', array('casing'), array(
		'label'                	=> '', 							// определяется параметром $labels->name
		'labels'                => array(
			'name'              	=> 'Категории обивки',
			'singular_name'     	=> 'Категория',
			'menu_name'         	=> 'Категории',
			'add_new_item'      	=> 'Добавить новую категорию',
			'edit_item'         	=> 'Редактирование категории',
			'update_item'       	=> 'Обновить категорию'
		),
		'description'           => '', 							// описание таксономии
		'public'                => true, 						// show_in_nav_menus = true - этот тип записей не будет спрятан из выбора меню навигации
		'hierarchical'          => true,							// наличие иерархии (метки или категории)
		'show_ui'					=> true,
		'show_in_menu'				=> true,
	));
}
