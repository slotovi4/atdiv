<?php
/*
   Plugin Name: sofa plugin
   Description: Добавляет пост диван
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

require_once( plugin_dir_path( __FILE__ ) . '/sofa-price/sofa-price.php' );   			 //Цена
require_once( plugin_dir_path( __FILE__ ) . '/sofa-bestseller/sofa-bestseller.php' );   //Скидка
require_once( plugin_dir_path( __FILE__ ) . '/sofa-size/sofa-height.php' );   			 //Высота
require_once( plugin_dir_path( __FILE__ ) . '/sofa-size/sofa-length.php' );   			 //Длина
require_once( plugin_dir_path( __FILE__ ) . '/sofa-size/sofa-width.php' );  				 //Ширина

// Пост диван
add_action('init', 'register_post_sofa');
function register_post_sofa(){
	register_post_type('sofa', array(
		'labels' => array(
			'name'               => 'Диван',                 // основное название для типа записи
			'singular_name'      => 'Диван',                 // название для одной записи этого типа
			'add_new'            => 'Добавить запись',       // для добавления новой записи
			'add_new_item'       => 'Добавление записи',     // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование записи', // для редактирования типа записи
			'new_item'           => '',           				 // текст новой записи
			'view_item'          => '',        					 // для просмотра записи этого типа.
			'search_items'       => '',         	 			 // для поиска по этим типам записи
			'not_found'          => 'Не найдено',            // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине',  // если не было найдено в корзине
			'parent_item_colon'  => '',                      // для родителей (у древовидных типов)
			'menu_name'          => 'Диван',                 // название меню
		),
		'public'              => true,
		'show_in_menu'        => true,                      // показывать ли в меню адмнки
		'supports'            => array('title', 'excerpt', 'thumbnail')    // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	));
}

//Категория дивана
add_action('init', 'register_category_sofa');
function register_category_sofa() {
	register_taxonomy('sofa_category', array('sofa', 'last-works'), array(
		'label'                	=> '', 							// определяется параметром $labels->name
		'labels'                => array(
			'name'              	=> 'Категории дивана',
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
