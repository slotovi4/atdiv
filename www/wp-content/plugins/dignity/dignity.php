<?php
/*
Plugin Name: dignity
Description: Добавляет пост "Наши достоинства", настройки: "Текст под заголовком"
Version: 1.0
Author: slotovi4
Author URI:
*/

require_once( plugin_dir_path( __FILE__ ) . '/pre_title/pre_title.php' );	//Текст под заголовком

add_action('init', 'register_post_dignity');
function register_post_dignity(){
	register_post_type('dignity', array(
		'labels' => array(
			'name'               => 'Наши достоинства',      // основное название для типа записи
			'singular_name'      => 'Наши достоинства',      // название для одной записи этого типа
			'add_new'            => 'Добавить запись',       // для добавления новой записи
			'add_new_item'       => 'Добавление записи',     // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование записи', // для редактирования типа записи
			'menu_name'          => 'Наши достоинства',      // название меню
		),
		'public'              => true,
		'show_in_menu'        => true,                      // показывать ли в меню адмнки
		'supports'            => array('title', 'thumbnail', 'editor')    // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	) );
}
