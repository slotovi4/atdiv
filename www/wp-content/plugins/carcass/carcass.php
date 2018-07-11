<?php
/*
   Plugin Name: carcass plugin
   Description: Добавляет каркас дивана
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

require_once( plugin_dir_path( __FILE__ ) . '/carcass-price/carcass-price.php' );				//Цена каркаса
require_once( plugin_dir_path( __FILE__ ) . '/carcass-category-image/categoty-image.php' );	//Изобрадения для категории

// Пост каркас
add_action('init', 'register_post_carcass');
function register_post_carcass(){
	register_post_type('carcass', array(
		'labels' => array(
			'name'               => 'Каркас',                // основное название для типа записи
			'singular_name'      => 'Каркас',                // название для одной записи этого типа
			'add_new'            => 'Добавить запись',       // для добавления новой записи
			'add_new_item'       => 'Добавление записи',     // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование записи', // для редактирования типа записи
			'new_item'           => '',           				 // текст новой записи
			'view_item'          => '',        					 // для просмотра записи этого типа.
			'search_items'       => '',         	 			 // для поиска по этим типам записи
			'not_found'          => 'Не найдено',            // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине',  // если не было найдено в корзине
			'parent_item_colon'  => '',                      // для родителей (у древовидных типов)
			'menu_name'          => 'Каркас',                // название меню
		),
		'public'              => true,
		'show_in_menu'        => true,                      // показывать ли в меню адмнки
		'supports'            => array('title', 'excerpt', 'thumbnail')    // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	));
}

//Категория каркаса
add_action('init', 'register_category_carcass');
function register_category_carcass() {
	register_taxonomy('carcass_category', array('carcass'), array(
		'label'                	=> '', 							// определяется параметром $labels->name
		'labels'                => array(
			'name'              	=> 'Категории каркаса',
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
