<?php
/**
 * Add gallery post type metaboxes
 * 1. setup metaboxes
 * 2. register metaboxes
 * 3. adding metaboxes
 * 4. save the meta box's post metadata
 */

add_action( 'load-post.php', 'gallery_meta_boxes_setup' );
add_action( 'load-post-new.php', 'gallery_meta_boxes_setup' );

/**
 * 1. setup metaboxes
 */

function gallery_meta_boxes_setup() {

	add_action( 'add_meta_boxes', 'add_gallery_meta_boxes' );
	add_action( 'save_post', 'save_gallery_img_meta', 10, 2 );
}

/**
 * 2. register metaboxes
 */
function add_gallery_meta_boxes() {
	add_meta_box(
		'gallery-image',
		esc_html__( 'Изображения', 'pg' ),
		'gallery_image_meta_box',
		['last-works'],
		'advanced',
		'default'
	);
}

/**
 * 3. adding metaboxes
 */

function gallery_image_meta_box( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'gallery_image_nonce' );

	$gallery_img_meta = get_post_meta( $post -> ID, '_gallery_img_data', true );
	$gallery_img = !empty( $gallery_img_meta ) ? $gallery_img_meta : []; ?>

	<div class="gallery-img-fields-wrap clearfix">
		<?php foreach ( $gallery_img as $img) :
			$image = json_decode($img);

			if (isset($image -> sizes -> medium))
			$img_url = $image -> sizes -> medium -> url;

			elseif (isset($image -> sizes -> large))
			$img_url = $image -> sizes -> large -> url;

			elseif (isset($image -> sizes -> full))
			$img_url = $image -> sizes -> full -> url;

			$img_id = $image -> id; ?>

			<span data-img-id="<?php echo $img_id; ?>" class="edit-gallery-img-link">
				<div class="gallery-img-prev" style="background-image: url('<?php echo $img_url; ?>')">
					<input type="hidden" name="_gallery_img[]" value='<?php echo $img; ?>'>
					<span class="remove-gallery-img-button" id="remove-gallery-img-button"></span>
				</div>
			</span>

		<?php endforeach; ?>
	</div>
	<p class="hide-if-no-js howto">Нажмите на изображение, чтобы изменить или обновить его</p>
	<input type="button" value="Загрузите изображение" class="button button-secondary upload-gallery-img-button" id="upload-gallery-img-button">
	<input type="hidden" name="gallery-img" value="" class="gallery-img">
<?php }

/**
 * 4. Save the meta box's post metadata
 */

 function save_gallery_img_meta( $post_id, $post ) {

		/* Verify the nonce before proceeding. */
		if ( !isset( $_POST['gallery_image_nonce'] ) || !wp_verify_nonce( $_POST['gallery_image_nonce'], basename( __FILE__ ) ) )
			return $post_id;

		/* Get the post type object. */
		$post_type = get_post_type_object( $post->post_type );

		/* Check if the current user has permission to edit the post. */
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			return $post_id;

		/* Get the posted data and sanitize it for use as an HTML class. */
		$new_meta_value = array_filter(
			isset( $_POST['_gallery_img'] ) ? $_POST['_gallery_img'] : [],
			function( $element ) {
				return !empty( $element );
		});

		/* Get the meta key. */
		$meta_key = '_gallery_img_data';

		/* Get the meta value of the custom field key. */
		$meta_value = array_filter(
			!empty( get_post_meta( $post_id, $meta_key, true ) ) ? get_post_meta( $post_id, $meta_key, true ) : [],
			function( $element ) {
				return !empty( $element );
		});

		//$arr_diff = array_diff( $meta_value, $new_meta_value );
		if ( count( $new_meta_value ) != count( $meta_value ) || 0 != count( array_diff( $new_meta_value, $meta_value ) ) ) {
			$arr_diff = true;
		} else {
			$arr_diff = false;
		}

		/* If a new meta value was added and there was no previous value, add it. */
		if ( ( $new_meta_value && 0 != count( $new_meta_value ) && 0 == count( $meta_value ) ) || ( $new_meta_value && 0 != count( $new_meta_value ) && '' == $meta_value ) ) {
			add_post_meta( $post_id, $meta_key, $new_meta_value, true );
		}

		/* If the new meta value does not match the old value, update it. */
		elseif ( $new_meta_value && 0 != count( $new_meta_value ) && true == $arr_diff ) {
			update_post_meta( $post_id, $meta_key, $new_meta_value );
		}

		/* If there is no new meta value but an old value exists, delete it. */
		elseif ( 0 == count( $new_meta_value ) && $meta_value ) {
			delete_post_meta( $post_id, $meta_key, $meta_value );
		}
	}
