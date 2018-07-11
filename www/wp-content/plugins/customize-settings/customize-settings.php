<?php
/**
* Plugin Name: customize-settings
* Description: добавляет настройки "Контактная информация" в Customize menu
*/

//Раздел "Шапка сайта" в меню customizer
add_action('customize_register', function($customizer) {
	//Создание раздела
   $customizer->add_section(
      'header_section',
      array(
         'title' => 'Контактная информация',
         'description' => 'Настройка адреса, телефона, E-mail',
         'priority' => 11,
   ));

	//Настройка адреса
	$customizer->add_setting(
		'address',
		array('default' => 'Россия, Симферополь')
	);

	$customizer->add_control(
	   'address',
	   array(
	      'label' => 'Адрес',
	      'section' => 'header_section',
	      'type' => 'text',
   ));

   //Настройка подробного адреса
	$customizer->add_setting(
		'detailed_address',
		array('default' => 'г.Симферополь, Ул. Гагарина 181/15, 4-й этаж каб. 211.')
	);

	$customizer->add_control(
	   'detailed_address',
	   array(
	      'label' => 'Подробный Адрес',
	      'section' => 'header_section',
	      'type' => 'text',
   ));

	//Настройка т.ф номера
	$customizer->add_setting(
		'number_tf',
		array('default' => 'т.ф.: +7(3652) 000-000')
	);

	$customizer->add_control(
   'number_tf',
   array(
      	'label' => 'Телефон т.ф.:',
      	'section' => 'header_section',
      	'type' => 'text',
   ));

   //Настройка моб номера
	$customizer->add_setting(
		'number_mob',
		array('default' => 'моб.: +7(978) 741-42-51')
	);

	$customizer->add_control(
   'number_mob',
   array(
      	'label' => 'Телефон моб.:',
      	'section' => 'header_section',
      	'type' => 'text',
   ));

	//Настройка E-mail
	$customizer->add_setting(
		'E-mail',
		array('default' => 'roman.bruns@mail.ru')
	);

	$customizer->add_control(
   'E-mail',
   array(
      	'label' => 'E-mail',
      	'section' => 'header_section',
      	'type' => 'text',
   ));
});
