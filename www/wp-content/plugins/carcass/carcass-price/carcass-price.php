<?php
/*
   Plugin Name: carcass-price
   Description: Добавляет цену каркаса
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

add_action('add_meta_boxes', '_atdiv_carcass_price_metabox');
function _atdiv_carcass_price_metabox() {
	add_meta_box( 'carcass_price', 'Цена', '_atdiv_carcass_price_metabox_callback', 'carcass' );
}

function _atdiv_carcass_price_metabox_callback($post) {
	$data = get_post_meta($post -> ID, '_atdiv_carcass_price_data', true);
	?>
	<div class="carcass-price-block">
		<?php
         if (!empty($data)) {
      ?>
         <input type="number" style="width:100%;" class="carcass-price-input-field" name="carcass-price-input-field" value="<?php echo $data; ?>">
		<?php
         } else {
		?>
         <input type="number" style="width:100%;" class="carcass-price-input-field" name="carcass-price-input-field" value="">
      <?php
         }
      ?>
	</div>
	<?php
}

add_action( 'save_post', '_atdiv_carcass_price_save_meta', 10, 2 );
function _atdiv_carcass_price_save_meta( $post_id, $post ) {

	/* Проверяем, если это автосохранение ничего не делаем с данными нашей формы. */
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	/* Получаю тип поста записи */
   $post_type = get_post_type_object( $post->post_type );

   /* Проверка, имеет ли текущий пользователь разрешение на редактирование поста */
   if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

   /* Получаю передаваемые данные */
   $new_meta_value = isset( $_POST['carcass-price-input-field'] ) ? $_POST['carcass-price-input-field'] : '';

	/* Мета ключ */
   $meta_key = '_atdiv_carcass_price_data';

	/* Получаю старое значение из поля по ключу */
   $meta_value = !empty( get_post_meta( $post_id, $meta_key, true ) ) ? get_post_meta( $post_id, $meta_key, true ) : '';

	/* Если старое значение пустое и новое не пустое => add*/
   if ( empty( $meta_value ) && !empty( $new_meta_value ) ) {
      delete_post_meta($post_id, $meta_key, $meta_value);
      add_post_meta( $post_id, $meta_key, $new_meta_value, true );
   }

   /* Если старое значение отлично от нового => update */
   elseif ( $new_meta_value != $meta_value ) {
      update_post_meta( $post_id, $meta_key, $new_meta_value );
   }

   /* Если новое значение пустое => delete */
   elseif ( empty( $new_meta_value ) ) {
      delete_post_meta( $post_id, $meta_key, $meta_value );
   }
}
