<?php
/*
   Template Name: Каталог "Последние работы"
*/
?>

<?php get_header(); ?>

<?php
/*КАтегории моделей*/
$sofa_categories = get_terms([
   'taxonomy'   => 'sofa_category',
   'hide_empty' => false,
   'pad_counts' => 1,
   'parent'     => 0
]);

/*Последние работы*/
$last_works = get_posts([
   'numberposts' => 16,
	'post_type'   => 'last-works',
]);
?>

<!-- header -->
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="p-last-works-header">
            <div class="p-last-works-header__logo"></div>
            <span class="p-last-works-header__title">Список последних работ</span>
         </div>
      </div>

      <?php
      foreach ($last_works as $last_work) {
         $last_work_id            = $last_work->ID;
         $last_work_name          = $last_work->post_title;
         $last_work_link          = $last_work->guid;
         $last_work_thumbnail_url = get_the_post_thumbnail_url($last_work_id);
         $last_work_categories    = get_the_terms($last_work_id, 'sofa_category'); //Категория модели
         $last_work_date          = get_the_date( 'd m y', $last_work_id ); //Дата публикации
         $last_work_price         = get_post_meta($last_work_id, '_atdiv_last_works_price_data', true);   //Цена модели
         $last_work_client        = get_post_meta($last_work_id, '_atdiv_last_works_client_data', true);   //Заказчик
         $last_work_deadline      = get_post_meta($last_work_id, '_atdiv_last_works_deadline_data', true);  //Время выполенния заказа

         //$last_work_category_name
         foreach ($last_work_categories as $last_work_category) {
            $last_work_category_name = $last_work_category->name;
         }
      ?>
      <!-- section -->

      <div class="col-md-3">
         <a href="<?php echo $last_work_link; ?>">
         <div class="b-last-work-section p-last-works-model-section" style="background-image:url('<?php echo $last_work_thumbnail_url; ?>'); height: 315px; background-size: cover; background-position: center;">
            <!-- name -->
            <span class="b-last-work__name"><?php echo $last_work_name; ?></span>

            <!-- info -->
            <div class="b-last-work-info">
               <div class="col-md-10">
                  <span class="b-last-work__text">Тип: <span class="b-last-work__text_little"><?php echo $last_work_category_name; ?></span></span>
                  <span class="b-last-work__text">Стоимость: <span class="b-last-work__text_little"><?php echo $last_work_price; ?> <i class="fa fa-rub" aria-hidden="true"></i></span></span>
                  <span class="b-last-work__text">Срок выполнения: <span class="b-last-work__text_little"><?php echo $last_work_deadline; ?></span></span>
                  <span class="b-last-work__text">Заказчик: <span class="b-last-work__text_little"><?php echo $last_work_client; ?></span></span>
               </div>
               <div class="col-md-2">
                  <span class="b-last-work__date"><?php echo $last_work_date; ?></span>
               </div>
            </div>
         </div>
         </a>
      </div>

      <?php
      }
      ?>
   </div>
</div>

<?php get_footer(); ?>
