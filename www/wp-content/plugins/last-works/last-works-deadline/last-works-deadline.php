<?php
/*
   Plugin Name: last-works-deadline
   Description: Добавляет время выполнения
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

add_action('add_meta_boxes', '_atdiv_last_works_deadline_metabox');
function _atdiv_last_works_deadline_metabox() {
	add_meta_box( 'last_works_deadline', 'Время выполнения', '_atdiv_last_works_deadline_metabox_callback', 'last-works' );
}

function _atdiv_last_works_deadline_metabox_callback($post) {
	$data = get_post_meta($post -> ID, '_atdiv_last_works_deadline_data', true);
	?>
	<div class="last-works-deadline-block">
		<?php
         if (!empty($data)) {
      ?>
         <input type="text" style="width:100%;" class="last-works-deadline-input-field" name="last-works-deadline-input-field" value="<?php echo $data; ?>">
		<?php
         } else {
		?>
         <input type="text" style="width:100%;" class="last-works-deadline-input-field" name="last-works-deadline-input-field" value="">
      <?php
         }
      ?>
	</div>
	<?php
}

add_action( 'save_post', '_atdiv_last_works_deadline_save_meta', 10, 2 );
function _atdiv_last_works_deadline_save_meta( $post_id, $post ) {

	/* Проверяем, если это автосохранение ничего не делаем с данными нашей формы. */
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	/* Получаю тип поста записи */
   $post_type = get_post_type_object( $post->post_type );

   /* Проверка, имеет ли текущий пользователь разрешение на редактирование поста */
   if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

   /* Получаю передаваемые данные */
   $new_meta_value = isset( $_POST['last-works-deadline-input-field'] ) ? $_POST['last-works-deadline-input-field'] : '';

	/* Мета ключ */
   $meta_key = '_atdiv_last_works_deadline_data';

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
