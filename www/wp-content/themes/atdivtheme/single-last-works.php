<?php
/*последняя работа*/
?>

<?php get_header(); ?>

<?php
the_post();

$last_work_name          = $post->post_title;
$last_work_thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
$last_work_categories    = get_the_terms(get_the_ID(), 'sofa_category'); //Категория модели
$last_work_date          = get_the_date( 'd m y', get_the_ID() ); //Дата публикации
$last_work_price         = get_post_meta(get_the_ID(), '_atdiv_last_works_price_data', true);     //Цена модели
$last_work_client        = get_post_meta(get_the_ID(), '_atdiv_last_works_client_data', true);    //Заказчик
$last_work_deadline      = get_post_meta(get_the_ID(), '_atdiv_last_works_deadline_data', true);  //Время выполенния заказа
$last_work_carcass       = get_post_meta(get_the_ID(), '_atdiv_last_works_carcass_data', true);   //Каркас модели
$last_work_filler        = get_post_meta(get_the_ID(), '_atdiv_last_works_filler_data', true);    //Наполнитель модели
$last_work_casing        = get_post_meta(get_the_ID(), '_atdiv_last_works_casing_data', true);    //Обивка модели
$last_work_gallery       = get_post_meta(get_the_ID(), '_gallery_img_data', true);                //Галлерея


//$last_work_category_name
foreach ($last_work_categories as $last_work_category) {
   $last_work_category_name = $last_work_category->name;
}

?>

<!-- header -->
<div class="container">
   <div class="row">
      <!-- header -->
      <div class="col-md-12">
         <div class="p-last-work-header">
            <span class="p-last-work-header__title">Заказ - <span class="p-last-work-header__title p-last-work-header__title_number">#lwi-<?php echo get_the_ID(); ?></span></span>
         </div>
      </div>
   </div>

   <div class="row">
      <!-- image -->
      <div class="col-md-8">
         <div class="p-last-work-slider">
            <div class="p-last-work__image" style="background-image:url('<?php echo $last_work_thumbnail_url; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
            <?php
               foreach ($last_work_gallery as $last_work_gallery_key => $last_work_gallery_image) {
               if ($last_work_gallery_key < 7) {
                  $image_url = json_decode($last_work_gallery_image)->url;
            ?>
                  <div class="p-last-work__image" style="background-image:url('<?php echo $image_url; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center;"></div>
            <?php
                  }
               }
            ?>
         </div>
         <div class="p-last-work-control"></div>
      </div>

      <!-- info -->
      <div class="col-md-4">
         <div class="p-last-work-info">
            <span class="p-last-work-info__text">Заказчик: <span class="p-last-work-info__value"><?php echo $last_work_client; ?></span> </span>
            <span class="p-last-work-info__text">Время выполнения:  <span class="p-last-work-info__value"><?php echo $last_work_deadline; ?></span> </span>
            <span class="p-last-work-info__text">Дата завершения:  <span class="p-last-work-info__value"><?php echo $last_work_date; ?></span> </span>
            <span class="p-last-work-info__text">Итоговая стоимость:  <span class="p-last-work-info__value"><?php echo $last_work_price; ?></span> </span>
            <span class="p-last-work-info__text">Модель:  <span class="p-last-work-info__value"><?php echo $last_work_name; ?></span> </span>
            <span class="p-last-work-info__text">Тип модели:  <span class="p-last-work-info__value"><?php echo $last_work_category_name; ?></span> </span>
            <span class="p-last-work-info__text">Каркас модели <span class="p-last-work-info__value"><?php echo $last_work_carcass; ?></span> </span>
            <span class="p-last-work-info__text">Наполнитель модели <span class="p-last-work-info__value"><?php echo $last_work_filler; ?></span> </span>
            <span class="p-last-work-info__text">Обивка модели <span class="p-last-work-info__value"><?php echo $last_work_casing; ?></span> </span>
         </div>
      </div>
   </div>

   <div class="row">
      <!-- order -->
      <div class="col-md-12">
         <div class="p-last-work-order">
            <a href="#p-last-work-order-form" class="p-last-work-order__button b-button">Сделать заказ модели</a>
            <form id="p-last-work-order-form" class="p-last-work-order-form b-form white-popup-block mfp-hide" action="" method="post">
               <span class="b-form__title">Оформить заказ</span>
               <span class="b-form__text">Номер заказа: <span class="b-form__text_value">#lwi-<?php echo get_the_ID(); ?></span> </span>

               <input class="b-form__field p-last-work-order-form__name" placeholder="ФИО" type="text" id="name" name="" value="">
               <input class="b-form__field p-last-work-order-form__email" placeholder="Email" type="email" name="" value="">
               <input class="b-form__field p-last-work-order-form__number" placeholder="Телефон" type="tel" name="" value="">
               <input class="p-last-work-order-form__order" type="hidden" name="" value="#lwi-<?php echo get_the_ID(); ?>">

               <input class="p-last-work-order-form__submit b-form__submit b-button" type="button" name="" value="Заказать">
            </form>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>
