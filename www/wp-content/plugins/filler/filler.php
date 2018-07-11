<?php
/*
   Plugin Name: filler plugin
   Description: Добавляет наполнитель дивана
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

require_once( plugin_dir_path( __FILE__ ) . '/filler-price/filler-price.php' );	//Цена

// Пост наполнитель
add_action('init', 'register_post_filler');
function register_post_filler(){
	register_post_type('filler', array(
		'labels' => array(
			'name'               => 'Напонитель',                // основное название для типа записи
			'singular_name'      => 'Напонитель',                // название для одной записи этого типа
			'add_new'            => 'Добавить запись',       // для добавления новой записи
			'add_new_item'       => 'Добавление записи',     // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование записи', // для редактирования типа записи
			'new_item'           => '',           				 // текст новой записи
			'view_item'          => '',        					 // для просмотра записи этого типа.
			'search_items'       => '',         	 			 // для поиска по этим типам записи
			'not_found'          => 'Не найдено',            // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине',  // если не было найдено в корзине
			'parent_item_colon'  => '',                      // для родителей (у древовидных типов)
			'menu_name'          => 'Напонитель',                // название меню
		),
		'public'              => true,
		'show_in_menu'        => true,                      // показывать ли в меню адмнки
		'supports'            => array('title', 'thumbnail')    // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	));
}
