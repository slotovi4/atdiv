<?php
/*
   Plugin Name: casing-pattern
   Description: Добавляет узор обивки
   Version: 1.0
   Author: slotovi4
   Author URI:
*/

add_action('add_meta_boxes', '_atdiv_casing_pattern_metabox');
function _atdiv_casing_pattern_metabox() {
	add_meta_box( 'casing_pattern', 'Узор', '_atdiv_casing_pattern_metabox_callback', 'casing' );
}

function _atdiv_casing_pattern_metabox_callback($post) {
	$data = get_post_meta($post -> ID, '_atdiv_casing_pattern_data', true);
	?>
	<div class="casing-pattern-block">
		<?php
         if (!empty($data)) {
      ?>
			<select class="casing-pattern-input-field" name="casing-pattern-input-field">
				<option selected value="<?php echo $data; ?>"><?php echo $data; ?></option>
				<option value="Есть">Есть</option>
				<option value="Отсутствует">Отсутствует</option>
			</select>
		<?php
         } else {
		?>
		<select class="casing-pattern-input-field" name="casing-pattern-input-field">
			<option selected value="">--</option>
			<option value="Есть">Есть</option>
			<option value="Отсутствует">Отсутствует</option>
		</select>
      <?php
         }
      ?>
	</div>
	<?php
}

add_action( 'save_post', '_atdiv_casing_pattern_save_meta', 10, 2 );
function _atdiv_casing_pattern_save_meta( $post_id, $post ) {

	/* Проверяем, если это автосохранение ничего не делаем с данными нашей формы. */
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	/* Получаю тип поста записи */
   $post_type = get_post_type_object( $post->post_type );

   /* Проверка, имеет ли текущий пользователь разрешение на редактирование поста */
   if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

   /* Получаю передаваемые данные */
   $new_meta_value = isset( $_POST['casing-pattern-input-field'] ) ? $_POST['casing-pattern-input-field'] : '';

	/* Мета ключ */
   $meta_key = '_atdiv_casing_pattern_data';

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
