<?php
/*****CARCASS CATEGORY IMAGE BOX****/
if ( ! class_exists( 'carcass_META' ) ) {
class carcass_META {
/*
 * Initialize the class and start calling our hooks and filters
*/

public function init() {
	add_action( 'carcass_category_add_form_fields', array ( $this, 'add_carcass_category_image' ), 10, 2 );
   add_action( 'created_carcass_category', array ( $this, 'save_carcass_category_image' ), 10, 2 );
   add_action( 'carcass_category_edit_form_fields', array ( $this, 'update_carcass_category_image' ), 10, 2 );
   add_action( 'edited_carcass_category', array ( $this, 'updated_carcass_category_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
}

public function load_media() {
	wp_enqueue_media();
}

/*
 * Add a form field in the new carcass_category page
*/
public function add_carcass_category_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
      <label for="carcass_category-image"><?php _e('Изображение категории', 'hero-theme'); ?></label>
      <input type="hidden" id="carcass_category-image" name="carcass_category-image" class="custom_media_url" value="">
      <div id="carcass_category-image-wrapper"></div>
      <p>
      	<input type="button" class="button button-secondary carcass_media_button" id="carcass_media_button" name="carcass_media_button" value="<?php _e( 'Добавить изображение', 'hero-theme' ); ?>" />
      	<input type="button" class="button button-secondary carcass_media_remove" id="carcass_media_remove" name="carcass_media_remove" value="<?php _e( 'Удалить изображение', 'hero-theme' ); ?>" />
    	</p>
   </div>
 	<?php
}

/*
 * Save the form field
*/
public function save_carcass_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['carcass_category-image'] ) && '' !== $_POST['carcass_category-image'] ){
   	$image = $_POST['carcass_category-image'];
   	add_term_meta( $term_id, 'carcass_category-image', $image, true );
   }
}

/*
 * Edit the form field
*/
public function update_carcass_category_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
      <th scope="row">
      	<label for="carcass_category-image"><?php _e( 'Изображение категории', 'hero-theme' ); ?></label>
      </th>
      <td>
      <?php $image_id = get_term_meta ( $term -> term_id, 'carcass_category-image', true ); ?>
      <input type="hidden" id="carcass_category-image" name="carcass_category-image" value="<?php echo $image_id; ?>">
      <div id="carcass_category-image-wrapper">
         <?php
				if ( $image_id ) {
	    			$response = json_decode($image_id, true);
					echo wp_get_attachment_image ( $response['id'], 'thumbnail' );
	         }
			?>
      </div>
      <p>
         <input type="button" class="button button-secondary carcass_media_button" id="carcass_media_button" name="carcass_media_button" value="<?php _e( 'Добавить изображение', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary carcass_media_remove" id="carcass_media_remove" name="carcass_media_remove" value="<?php _e( 'Удалить изображение', 'hero-theme' ); ?>" />
      </p>
      </td>
   </tr>
<?php
}

/*
* Update the form field value
*/
public function updated_carcass_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['carcass_category-image'] ) && '' !== $_POST['carcass_category-image'] ){
   	$image = $_POST['carcass_category-image'];
      update_term_meta ( $term_id, 'carcass_category-image', $image );
   } else {
      update_term_meta ( $term_id, 'carcass_category-image', '' );
   }
}

/*
* Add script
*/
function add_script() {
	wp_enqueue_script( 'imageJS', plugins_url() . '/carcass/carcass-category-image/categoty-image-box.js');
}
}

$carcass_META = new carcass_META();
$carcass_META -> init();
}
