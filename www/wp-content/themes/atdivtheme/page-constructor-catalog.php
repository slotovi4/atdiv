<?php
/*
   Template Name: Конструктор-каталог
*/
?>

<?php get_header(); ?>

<?php
/*категории диванов*/
$sofa_categories = get_terms([
   'taxonomy'   => 'sofa_category',
   'hide_empty' => false,
   'pad_counts' => 1,
   'parent'     => 0
]);

/*диваны*/
$sofas = get_posts([
   'numberposts' => -1,
	'post_type'   => 'sofa',
]);
?>

<!-- header -->
<div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="p-constructor-header">
            <!-- image -->
            <div class="p-constructor-header__image"></div>
            <!-- title -->
            <span class="p-constructor-header__title">конструктор</span>
            <!-- number -->
            <div class="p-constructor-header-page-number">
               <span class="p-constructor-header__number"><span class="p-constructor-header__number_current">01</span>/05</span>
               <!-- <span class="p-constructor-header__button">далее <i class="fa fa-angle-double-right" aria-hidden="true"></i></span> -->
            </div>
         </div>
      </div>
   </div>
</div>

<!-- constructor info section -->
<div class="p-constructor-info-section p-constructor-section">
   <div class="container">
      <div class="row">
         <!-- info -->
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="p-constructor-info">
               <!-- text -->
               <span class="p-constructor-info__text">
                  Данный конструктор дает вам возможность с нуля собрать диван своей мечты!
               </span>
               <span class="p-constructor-info__text">
                  Вам предоставиться весь асортимент материалов и моделей.
               </span>
               <span class="p-constructor-info__text">
                  Структура и внешний вид дивана ограничивается только вашей фантазией!
               </span>
               <span class="p-constructor-info__text">
                  Если у вас возникли вопросы или вы хотите проконсультироваться позвоните по номеру <span class="p-constructor-info__text p-constructor-info__text_number">+7 (978) 741-12-51</span>
               </span>
            </div>
         </div>
      </div>

      <!-- preview -->
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="p-constructor-preview">
               <div class="p-constructor-preview__point p-constructor-preview__point-first">
                   <span class="p-constructor-preview__text p-constructor-preview__text-first">Более 400 видов кожи и ткани</span>
               </div>
               <div class="p-constructor-preview__point p-constructor-preview__point-second">
                  <span class="p-constructor-preview__text p-constructor-preview__text-second">Качественные наполнители</span>
               </div>
               <div class="p-constructor-preview__point p-constructor-preview__point-third">
                  <span class="p-constructor-preview__text p-constructor-preview__text-third">Все виды каркасов</span>
               </div>
               <div class="p-constructor-preview__point p-constructor-preview__point-fourth">
                  <span class="p-constructor-preview__text p-constructor-preview__text-fourth">Большой выбор подлокотников</span>
               </div>
               <div class="p-constructor-preview__point p-constructor-preview__point-fifth">
                  <span class="p-constructor-preview__text p-constructor-preview__text-fifth">Удобные и легкие в использовании механимы трансформации</span>
               </div>
               <div class="p-constructor-preview__image"></div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- catalog -->
<div class="p-constructor-catalog-section p-constructor-section b-hide">
   <div class="container">
      <div class="row">
         <!-- all sofas catalog -->
         <div class="col-md-8 col-sm-12 col-xs-12">
            <!-- category list -->
            <div class="p-constructor-catalog-category-list">
               <span class="p-constructor-catalog-category-list__title p-constructor-catalog-category-list__title_selected" data-sofa-category="-1">Все</span>

               <?php
               foreach ($sofa_categories as $sofa_categories_key => $sofa_category) {
                  $sofa_category_name = $sofa_category->name;
                  $sofa_category_id   = $sofa_category->term_id;
                  ?>
                  <span class="p-constructor-catalog-category-list__title" data-sofa-category="<?php echo $sofa_category_id; ?>"><?php echo $sofa_category_name; ?></span>
                  <?php
               }
               ?>
            </div>

            <!-- sofa list -->
            <div class="p-constructor-catalog-sofas-list">
               <?php
               foreach ($sofas as $sofas_key => $sofa) {
                  $sofa_name          = $sofa->post_title;                                               //Название
                  $sofa_id            = $sofa->ID;                                                       //Id
                  $sofa_link          = $sofa->guid;                                                     //Ссылка
                  $sofa_thumbnail_url = get_the_post_thumbnail_url($sofa_id);                            //Изображение
                  $sofa_price         = get_post_meta($sofa_id, '_atdiv_sofa_price_data', true);         //Цена
                  $sofa_bestseller    = get_post_meta($sofa_id, '_atdiv_sofa_bestseller_data', true);    //Скидочная цена

                  $sofa_category_id   = wp_get_post_terms($sofa_id, 'sofa_category', array("fields" => "ids"));
                  ?>

                  <!-- sofas list sofa -->
                  <div class="p-constructor-catalog-sofas-list-sofa" data-sofa-category="<?php echo $sofa_category_id[0]; ?>">
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <!-- title -->
                        <span class="p-constructor-catalog-sofa-title"> <?php echo $sofa_name; ?></span>
                        <!-- image -->
                        <div style="background:url('<?php echo $sofa_thumbnail_url; ?>'); width:100%; height:130px; background-position:center; background-size:contain; background-repeat:no-repeat;"></div>
                        <!-- bottom -->
                        <div class="p-constructor-catalog-sofa-bottom">
                           <!-- link -->
                           <a class="p-constructor-catalog-sofa-link" href="<?php echo $sofa_link; ?>">Выбрать</a>
                           <!-- price -->
                           <?php if (empty($sofa_bestseller)) { //если не скидочный диван ?>
                              <span class="p-constructor-catalog-sofa-price">от <?php echo $sofa_price; ?><i class="p-constructor-catalog-sofas-list__rub fa fa-rub" aria-hidden="true"></i></span>
                           <?php } else { ?>
                              <span class="p-constructor-catalog-sofa-price p-constructor-catalog-sofa-price_bestseller">от <?php echo $sofa_bestseller; ?><i class="p-constructor-catalog-sofas-list__rub fa fa-rub" aria-hidden="true"></i></span>
                              <span class="p-constructor-catalog-sofa-price p-constructor-catalog-sofa-price_old"><?php echo $sofa_price; ?><i class="p-constructor-catalog-sofas-list__rub fa fa-rub" aria-hidden="true"></i></span>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <?php
               }
               ?>
            </div>
         </div>

         <!-- bestseller -->
         <div class="col-md-4">
            <div class="p-constructor-catalog-bestseller">
               <span class="p-constructor-catalog-bestseller__title">хит продаж</span>
               <?php
               $post_number = 0; //кол-во выведенных постов
               foreach ($sofas as $sofas_key => $sofa) {
                  $sofa_name          = $sofa->post_title;                                               //Название
                  $sofa_id            = $sofa->ID;                                                       //Id
                  $sofa_link          = $sofa->guid;                                                     //Ссылка
                  $sofa_thumbnail_url = get_the_post_thumbnail_url($sofa_id);                            //Изображение
                  $sofa_price         = get_post_meta($sofa_id, '_atdiv_sofa_price_data', true);         //Цена
                  $sofa_bestseller    = get_post_meta($sofa_id, '_atdiv_sofa_bestseller_data', true);    //Скидочная цена

                  if (!empty($sofa_bestseller) && $post_number != 2) {
                     $post_number++;
                  ?>
                  <!-- bestseller sofa -->
                  <div class="p-constructor-catalog-bestseller-sofa">
                     <span class="p-constructor-catalog-sofa-title"> <?php echo $sofa_name; ?></span>
                     <div style="background:url('<?php echo $sofa_thumbnail_url;?>'); width:100%; height:130px; background-position:center; background-size:contain; background-repeat:no-repeat;"></div>
                     <div class="p-constructor-catalog-sofa-bottom">
                        <a class="p-constructor-catalog-sofa-link" href="<?php echo $sofa_link; ?>">Выбрать</a>
                        <span class="p-constructor-catalog-sofa-price p-constructor-catalog-sofa-price_bestseller">от <?php echo $sofa_bestseller; ?><i class="p-constructor-catalog-sofas-list__rub fa fa-rub" aria-hidden="true"></i></span>
                        <span class="p-constructor-catalog-sofa-price p-constructor-catalog-sofa-price_old"><?php echo $sofa_price; ?><i class="p-constructor-catalog-sofas-list__rub fa fa-rub" aria-hidden="true"></i></span>
                     </div>
                  </div>
                  <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- controls -->
<div class="container">
   <div class="row">
      <div class="col-md-10 offset-md-1">
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-unlock fa fa-unlock" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control p-constructor-control-model p-constructor-control_active">
               <span class="p-constructor-control__text">выбор модели</span>
               <div class="p-constructor-control__image p-constructor-control__image-model"></div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-lock fa fa-lock" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control">
               <span class="p-constructor-control__text">выбор параметров</span>
               <div class="p-constructor-control__image p-constructor-control__image-order"></div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-lock fa fa-lock" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control">
               <span class="p-constructor-control__text">выбор обивки</span>
               <div class="p-constructor-control__image p-constructor-control__image-parameter"></div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-lock fa fa-lock" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control">
               <span class="p-constructor-control__text">оформление заказа</span>
               <div class="p-constructor-control__image p-constructor-control__image-upholstery"></div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>
