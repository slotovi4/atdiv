<?php
/*
   Plugin Name: last-works
   Description: Добавляет последние работы
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

require_once( plugin_dir_path( __FILE__ ) . '/last-works-price/last-works-price.php' );		//Цена
require_once( plugin_dir_path( __FILE__ ) . '/last-works-filler/last-works-filler.php' );		//Напонитель
require_once( plugin_dir_path( __FILE__ ) . '/last-works-casing/last-works-casing.php' );		//Обивка
require_once( plugin_dir_path( __FILE__ ) . '/last-works-carcass/last-works-carcass.php' );	//Каркас
require_once( plugin_dir_path( __FILE__ ) . '/last-works-client/last-works-client.php' );	//Заказчик
require_once( plugin_dir_path( __FILE__ ) . '/last-works-deadline/last-works-deadline.php' );	//Время выполнения

// Пост последние работы
add_action('init', 'register_post_last_works');
function register_post_last_works(){
	register_post_type('last-works', array(
		'labels' => array(
			'name'               => 'Последние работы',      // основное название для типа записи
			'singular_name'      => 'Последние работы',      // название для одной записи этого типа
			'add_new'            => 'Добавить запись',       // для добавления новой записи
			'add_new_item'       => 'Добавление записи',     // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование записи', // для редактирования типа записи
			'new_item'           => '',           				 // текст новой записи
			'view_item'          => '',        					 // для просмотра записи этого типа.
			'search_items'       => '',         	 			 // для поиска по этим типам записи
			'not_found'          => 'Не найдено',            // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине',  // если не было найдено в корзине
			'parent_item_colon'  => '',                      // для родителей (у древовидных типов)
			'menu_name'          => 'Последние работы',      // название меню
		),
		'public'              => true,
		'show_in_menu'        => true,                      // показывать ли в меню адмнки
		'supports'            => array('title', 'thumbnail', 'editor')    // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	));
}
