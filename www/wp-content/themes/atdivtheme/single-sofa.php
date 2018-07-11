<?php
/*Диван*/
?>

<?php get_header(); ?>

<?php
the_post();

//sofa
$sofa_name          = $post->post_title;                                               //Название
$sofa_id            = $post->ID;                                                       //Id
$sofa_link          = $post->guid;                                                     //Ссылка
$sofa_thumbnail_url = get_the_post_thumbnail_url($sofa_id);                            //Изображение
$sofa_thumbnail_title = get_post(get_post_thumbnail_id())->post_title;                 //Название изображения
$dir = wp_get_upload_dir();                                                            //папка с загрузками
$baseurl = $dir['baseurl'];                                                            //пусть к папке с загрузками
$sofa_price         = get_post_meta($sofa_id, '_atdiv_sofa_price_data', true);         //Цена
$sofa_bestseller    = get_post_meta($sofa_id, '_atdiv_sofa_bestseller_data', true);    //Скидочная цена
$sofa_length        = get_post_meta($sofa_id, '_atdiv_sofa_length_data', true);        //Длина
$sofa_width         = get_post_meta($sofa_id, '_atdiv_sofa_width_data', true);         //Ширина
$sofa_height        = get_post_meta($sofa_id, '_atdiv_sofa_height_data', true);        //Высота
$sofa_categories 	  = get_the_terms(get_the_ID(), 'sofa_category');							//Категория

//если скидочный диван то замена основной цены на скидочную
if (!empty($sofa_bestseller))
   $sofa_price = $sofa_bestseller;

//sofa_category_name
foreach ($sofa_categories as $sofa_categories_key => $sofa_category) {
   $sofa_category_name = $sofa_category->name;
}

//carcass category
$carcass_categories = get_terms(array(
   'taxonomy'   => 'carcass_category',
   'hide_empty' => true,
 ));

//wireframes
$wireframes = get_posts(array(
   'post_type'   => 'carcass',
   'numberposts' => ''
));

//filler
$fillers = get_posts(array(
   'post_type'   => 'filler',
   'numberposts' => ''
));

//casing category
$casing_categories = get_terms(array(
   'taxonomy'   => 'casing_category',
   'hide_empty' => true,
 ));

//casings
$casings = get_posts(array(
    'post_type'   => 'casing',
    'numberposts' => ''
));

//get casings price array
$casings_price_array = array();
foreach ($casings as $casing) {
   $casing_id   = $casing->ID;   //id
   $casing_price = get_post_meta($casing_id, '_atdiv_casing_price_data', true);  //цена обивки

   array_push($casings_price_array, $casing_price);
}

$casings_min_price = get_min_value($casings_price_array);//минимальная цена обивки
$casings_max_price = get_max_value($casings_price_array);//максималная цена обивки

//get casings density array
$casings_density_array = array();
foreach ($casings as $casing) {
   $casing_id   = $casing->ID;   //id
   $casing_density = get_post_meta($casing_id, '_atdiv_casing_density_data', true);  //Плотноть обивки

   array_push($casings_density_array, $casing_density);
}

$casings_min_density = get_min_value($casings_density_array);//минимальная плотность обивки
$casings_max_density = get_max_value($casings_density_array);//максимальная плотность обивки
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
               <span class="p-constructor-header__number"><span class="p-constructor-header__number_current">03</span>/05</span>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- single sofa -->
<div class="container">
   <div class="row">
      <!-- sofa-section -->
      <div class="col-md-8 col-sm-12 col-xs-12">
         <!-- sofa title -->
         <span class="p-constructor-sofa__title">
            Итог <span class="p-constructor-sofa__price p-constructor-total"><?php echo $sofa_price; ?></span> <i class="p-constructor-sofa__price fa fa-rub" aria-hidden="true"></i>
         </span>

         <!-- dimension -->
         <div class="p-constructor-sofa-dimension">
            <!-- old values -->
            <input class="p-constructor-sofa-dimension__input-old-length" type="hidden" disabled value="<?php echo $sofa_length; ?>">
            <input class="p-constructor-sofa-dimension__input-old-width" type="hidden" disabled value="<?php echo $sofa_width; ?>">
            <input class="p-constructor-sofa-dimension__input-old-height" type="hidden" disabled value="<?php echo $sofa_height; ?>">

            <!-- error -->
            <span class="p-constructor-sofa-dimension__error b-hide"></span>

            <!-- inputs -->
            <div class="p-constructor-sofa-dimension-section">
               <span class="p-constructor-sofa-dimension__text p-constructor-sofa-dimension__length"><input class="p-constructor-sofa-dimension__input p-constructor-sofa-dimension__input-length" type="number" disabled value="<?php echo $sofa_length; ?>"> см</span>
               <span class="p-constructor-sofa-dimension__text p-constructor-sofa-dimension__width"><input class="p-constructor-sofa-dimension__input p-constructor-sofa-dimension__input-width" type="number" disabled value="<?php echo $sofa_width; ?>"> см</span>
               <span class="p-constructor-sofa-dimension__text p-constructor-sofa-dimension__height"><input class="p-constructor-sofa-dimension__input p-constructor-sofa-dimension__input-height" type="number" disabled value="<?php echo $sofa_height; ?>"> см</span>
            </div>

            <!-- button -->
            <input class="p-constructor-sofa-dimension__button" type="button" name="" value="Изменить">
         </div>

         <!-- sofa section -->
         <!-- image -->
         <div class="p-constructor-sofa-image" data-image-title="<?php echo $sofa_thumbnail_title; ?>" data-baseurl="<?php echo $baseurl; ?>" style="background-image:url('<?php echo $sofa_thumbnail_url; ?>'); height:350px; background-repeat:no-repeat; background-size:contain;">
            <!-- carcass-category-list -->
            <span class="p-constructor-sofa-property p-constructor-sofa-property__carcass b-sofa__button" data-open-block=".b-sofa__carcass-category-list" data-click="false"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
               <span class="p-constructor-sofa-property__carcass-text">Каркас</span>
               <div class="p-constructor-sofa-property-units-section b-sofa__carcass-category-list b-hide">
                  <?php
                  foreach ($carcass_categories as $carcass_categories_key => $carcass_category) {
                     $carcass_category_name = $carcass_category->name;
                     $carcass_category_id   = $carcass_category->term_id;
                     $carcass_category_image_json = get_term_meta($carcass_category_id, 'carcass_category-image', 'true'); //изобрадение категории(json)
                     $carcass_category_image = json_decode($carcass_category_image_json, true); //изобрадение категории
                     ?>
                     <span class="
                        p-constructor-sofa-property
                        p-constructor-sofa-property-unit
                        p-constructor-sofa-property-unit-category
                        p-constructor-sofa-property-unit-carcass
                        "
                        style="background-image:url('<?php echo $carcass_category_image['url']; ?>'); height:111px;background-position: center; background-repeat:no-repeat; background-size:contain;"
                        data-category-id="<?php echo $carcass_category_id; ?>">
                        <span class="p-constructor-sofa-property-unit__text"><?php echo $carcass_category_name; ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                     </span>
                     <?php
                  }
                  ?>
               </div>
            </span>

            <!-- filler-units-list -->
            <span class="p-constructor-sofa-property p-constructor-sofa-property__filler b-sofa__button" data-open-block=".b-sofa__fillers-list" data-click="false"><i class="fa fa-plus-square-o" aria-hidden="true"></i>
               <span class="p-constructor-sofa-property__filler-text">Наполнитель</span>
               <div class="b-sofa__fillers-list b-hide">
                  <?php
                  foreach ($fillers as $fillers_key => $filler) {
                     $filler_name = $filler->post_title;
                     $filler_id   = $filler->ID;
                     $filler_thumbnail_url = get_the_post_thumbnail_url($filler_id);
                     $filler_price = get_post_meta($filler_id, '_atdiv_filler_price_data', true); //Цена
                     ?>
                     <span class="
                        p-constructor-sofa-property
                        p-constructor-sofa-property-unit
                        p-constructor-sofa-property-unit-filler"
                        style="background-image:url('<?php echo $filler_thumbnail_url; ?>'); height:111px;background-position: center; background-repeat:no-repeat; background-size:contain;"
                        data-background-image="<?php echo $filler_thumbnail_url; ?>"
                        data-price="<?php echo $filler_price; ?>"
                        >
                        <span class="p-constructor-sofa-property-unit__text p-constructor-sofa-property-unit__text_name"><?php echo $filler_name; ?></span>
                        <span class="p-constructor-sofa-property-unit__text p-constructor-sofa-property-unit__text_price"><?php echo $filler_price; ?> <i class="fa fa-rub" aria-hidden="true"></i></span>
                     </span>
                     <?php
                  }
                  ?>
               </div>
            </span>

            <!-- carcas-units-list -->
            <div class="p-constructor-sofa-modal">
               <!-- close-button -->
               <div class="p-constructor-sofa-modal__close-button">
                  <i class="fa fa-times" aria-hidden="true"></i>
               </div>
               <?php
               foreach ($carcass_categories as $carcass_categories_key => $carcass_category) {
                  $carcass_category_name = $carcass_category->name;     //название категории
                  $carcass_category_id   = $carcass_category->term_id;  //id категории
                  ?>
                  <!-- modal-section -->
                  <div class="p-constructor-sofa-modal-section b-hide" data-category-id="<?php echo $carcass_category_id; ?>">
                     <div class="row">
                        <!-- list -->
                        <div class="col-md-7 col-sm-7 col-xs-7">
                           <h5 class="p-constructor-sofa-modal__title"><?php echo $carcass_category_name; ?></h5>
                           <div class="p-constructor-sofa-modal-list">
                              <?php
                              //прохождение по записям каркаса
                              foreach ($wireframes as $wireframes_key => $carcass) {
                                 $carcass_title           = $carcass->post_title;                              //title каркаса
                                 $carcass_id              = $carcass->ID;                                      //id каркаса
                                 $carcass_post_categories = get_the_terms($carcass_id, 'carcass_category');    //категории каркаса
                                 $carcass_thumbnail_url   = get_the_post_thumbnail_url($carcass_id);           //изображение каркаса

                                 //прохождение по категориям записи каркаса
                                 foreach ($carcass_post_categories as $carcass_post_categories_key => $carcass_post_category) {
                                    $carcass_post_category_id = $carcass_post_category->term_id;   //id категории каркаса

                                    if ($carcass_post_category_id == $carcass_category_id) { ?>
                                       <div class="col-md-4 col-sm-6 col-xs-12">
                                          <div class="p-constructor-sofa-modal-unit b-carcass-list__carcass">
                                             <span class="p-constructor-sofa-modal__name"><?php echo $carcass_title; ?></span>
                                             <div style= "
                                                   background-image:url('<?php echo $carcass_thumbnail_url; ?>');
                                                   width: 100%;
                                                   height:75px;
                                                   background-size: cover;
                                                   background-position: center;
                                                   background-repeat: no-repeat;">
                                             </div>
                                             <input type="button" class="p-constructor-sofa-modal__button b-button" data-carcass-id="<?php echo $carcass_id; ?>" name="" value="подробнее">
                                          </div>
                                       </div>
                                       <?php
                                    }
                                 }
                              }
                              ?>
                           </div>
                        </div>

                        <!-- carcass information -->
                        <div class="col-md-5 col-sm-5 col-xs-5">
                           <div class="p-constructor-sofa-modal-info b-hide">
                           <?php
                           foreach ($wireframes as $wireframes_key => $carcass) {
                              $carcass_title           = $carcass->post_title;                              //title каркаса
                              $carcass_excerpt         = $carcass->post_excerpt;                            //описание каркаса
                              $carcass_id              = $carcass->ID;                                      //id каркаса
                              $carcass_post_categories = get_the_terms($carcass_id, 'carcass_category');    //категории каркаса
                              $carcass_thumbnail_url   = get_the_post_thumbnail_url($carcass_id);           //изображение каркаса
                              $carcass_price           = get_post_meta($carcass_id, '_atdiv_carcass_price_data', true);  //Цена каркаса

                              ?>
                              <div class="p-constructor-carcass-info b-hide" data-carcass-id="<?php echo $carcass_id; ?>">
                                 <span class="p-constructor-sofa-modal__name"><?php echo $carcass_title; ?></span>
                                 <div style= "
                                       background-image:url('<?php echo $carcass_thumbnail_url; ?>');
                                       width: 100%;
                                       height: 150px;
                                       background-size: contain;
                                       background-position: center;
                                       background-repeat: no-repeat;">
                                 </div>
                                 <span class="p-constructor-sofa-modal__excerpt"><?php echo $carcass_excerpt; ?></span>
                                 <span class="p-constructor-sofa-modal__price">цена: <?php echo $carcass_price; ?> <i class="fa fa-rub" aria-hidden="true"></i></span>
                                 <input type="button" class="p-constructor-sofa-modal__selected p-constructor-sofa-modal__selected-carcass b-button" data-price="<?php echo $carcass_price; ?>" data-background-image="<?php echo $carcass_thumbnail_url; ?>" value="выбрать" >
                              </div>
                              <?php
                           }
                           ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
               }
               ?>
            </div>

            <!-- casing-modal -->
            <div class="p-constructor-casing-modal">
               <div class="row">
                  <!-- header filter -->
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="p-constructor-casing-modal-header">
                        <span class="p-constructor-casing-modal-header__title p-constructor-casing-modal-header__title_selected" data-category-id="-1">Все</span>
                        <?php
                        foreach ($casing_categories as $casing_category) {
                           $casing_category_name = $casing_category->name;
                           $casing_category_id   = $casing_category->term_id;
                           ?>
                           <span class="p-constructor-casing-modal-header__title" data-category-id="<?php echo $casing_category_id; ?>"><?php echo $casing_category_name; ?></span>
                           <?php
                        }
                         ?>
                     </div>
                  </div>

                  <!-- left filter -->
                  <div class="col-md-4 col-sm-4 col-xs-4">
                     <div class="p-constructor-casing-modal-filter">
                        <span class="p-constructor-casing-modal-filter__text">Цена:
                           <input type="text" class="p-constructor-casing-modal-filter__value p-constructor-casing-modal-filter__price" name="" value="">
                           <div class="p-constructor-casing-modal-filter-range p-constructor-casing-modal-filter__price-range"></div>
                           <input class="p-constructor-casing-modal-filter__min-price" type="hidden" name="" value="<?php echo $casings_min_price; ?>">
                           <input class="p-constructor-casing-modal-filter__max-price" type="hidden" name="" value="<?php echo $casings_max_price; ?>">
                        </span>
                        <span class="p-constructor-casing-modal-filter__text">Плотность:
                           <input type="text" class="p-constructor-casing-modal-filter__value p-constructor-casing-modal-filter__density" name="" value="">
                           <div class="p-constructor-casing-modal-filter-range p-constructor-casing-modal-filter__density-range"></div>
                           <input class="p-constructor-casing-modal-filter__min-density" type="hidden" name="" value="<?php echo $casings_min_density; ?>">
                           <input class="p-constructor-casing-modal-filter__max-density" type="hidden" name="" value="<?php echo $casings_max_density; ?>">
                        </span>
                        <span class="p-constructor-casing-modal-filter__text">Категория:
                           <select class="p-constructor-casing-modal-filter__select p-constructor-casing-modal-filter__category" name="">
                              <option value="Все">Все</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                           </select>
                        </span>
                        <span class="p-constructor-casing-modal-filter__text">Узор:
                           <select class="p-constructor-casing-modal-filter__select p-constructor-casing-modal-filter__pattern" name="">
                              <option value="Все">Все</option>
                              <option value="Есть">Есть</option>
                              <option value="Отсутствует">Отсутствует</option>
                           </select>
                        </span>
                        <span class="p-constructor-casing-modal-filter__button b-button">Применить</span>
                     </div>
                  </div>

                  <!-- casing info -->
                  <div class="col-md-3 col-sm-5 col-xs-5">
                     <div class="p-constructor-casing-modal-info">
                        <?php
                        foreach ($casings as $casing) {
                           $casing_id   = $casing->ID;   //id
                           $casing_name = $casing->post_title; //название обивки
                           $casing_thumbnail_url = get_the_post_thumbnail_url($casing_id);                     //изображение обивки
                           $casing_price    = get_post_meta($casing_id, '_atdiv_casing_price_data', true);     //цена обивки
                           $casing_color    = get_post_meta($casing_id, '_atdiv_casing_color_data', true);     //цвет обивки
                           $casing_density  = get_post_meta($casing_id, '_atdiv_casing_density_data', true);   //плотность обивки
                           $casing_category = get_post_meta($casing_id, '_atdiv_casing_category_data', true);  //категория обивки
                           $casing_pattern  = get_post_meta($casing_id, '_atdiv_casing_pattern_data', true);   //узор обивки
                           ?>
                           <div class="p-constructor-casing-modal-info-section" data-casing-id="<?php echo $casing_id; ?>">
                              <span class="p-constructor-casing-modal-info__title"><?php echo $casing_name; ?></span>
                              <div class="p-constructor-casing-modal-info__image"
                                   style="background-image:url('<?php echo $casing_thumbnail_url; ?>'); height:95px; width:95px; background-position: center; background-repeat:no-repeat;">
                                   <input class="p-constructor-casing-modal-info__button" data-casing-id="<?php echo $casing_id; ?>" type="button" name="" value="выбрать">
                              </div>
                              <span class="p-constructor-casing-modal-info__text">Цена: <span class="p-constructor-casing-modal-info__value">от <?php echo $casing_price; ?> руб, пог/м</span></span>
                              <span class="p-constructor-casing-modal-info__text">Цвет: <span class="p-constructor-casing-modal-info__value"><?php echo $casing_color; ?></span></span>
                              <span class="p-constructor-casing-modal-info__text">Плотность: <span class="p-constructor-casing-modal-info__value"><?php echo $casing_density; ?> гр/м2</span></span>
                              <span class="p-constructor-casing-modal-info__text">Категория: <span class="p-constructor-casing-modal-info__value"><?php echo $casing_category; ?></span></span>
                              <span class="p-constructor-casing-modal-info__text">Узор: <span class="p-constructor-casing-modal-info__value"><?php echo $casing_pattern; ?></span></span>
                           </div>
                           <?php
                        }
                        ?>
                     </div>
                  </div>

                  <!-- casing list -->
                  <div class="col-md-5 col-sm-3 col-xs-3">
                     <div class="p-constructor-casing-modal-list">
                        <?php
                        foreach ($casings as $casing) {
                           $casing_id = $casing->ID;
                           $casing_name = $casing->name;
                           $casing_thumbnail_url = get_the_post_thumbnail_url($casing_id);                     //изображение обивки
                           $casing_price    = get_post_meta($casing_id, '_atdiv_casing_price_data', true);     //цена обивки
                           $casing_color    = get_post_meta($casing_id, '_atdiv_casing_color_data', true);     //цвет обивки
                           $casing_density  = get_post_meta($casing_id, '_atdiv_casing_density_data', true);   //плотность обивки
                           $casing_category = get_post_meta($casing_id, '_atdiv_casing_category_data', true);  //категория обивки
                           $casing_pattern  = get_post_meta($casing_id, '_atdiv_casing_pattern_data', true);   //узор обивки

                           $casing_category_id = wp_get_post_terms($casing_id, 'casing_category', array("fields" => "ids")); //id категории
                           $casing_category_name = wp_get_post_terms($casing_id, 'casing_category', array("fields" => "names")); //id категории
                           ?>
                           <div class="p-constructor-casing-modal-list__image"
                                style="background-image:url('<?php echo $casing_thumbnail_url; ?>'); height:50px; width:50px; background-position: center; background-repeat:no-repeat;"
                                data-casing-id="<?php echo $casing_id; ?>"
                                data-casing-price="<?php echo $casing_price; ?>"
                                data-casing-color="<?php echo $casing_color; ?>"
                                data-casing-density="<?php echo $casing_density; ?>"
                                data-casing-category="<?php echo $casing_category; ?>"
                                data-casing-pattern="<?php echo $casing_pattern; ?>"
                                data-category-id="<?php echo $casing_category_id[0]; ?>"
                                data-category-name="<?php echo $casing_category_name[0]; ?>"
                                >
                           </div>
                           <?php
                        }
                        ?>
                     </div>
                  </div>

                  <!-- hide button -->
                  <span class="p-constructor-casing-modal__hide-button b-hide-button"><i class="p-constructor-casing-modal__hide-button-icon fa fa-angle-double-left" aria-hidden="true"></i></span>
               </div>
            </div>

         </div>
      </div>

      <!-- order -->
      <div class="col-md-4">
         <div class="p-constructor-order">
            <!-- order title -->
            <span class="p-constructor-order__title">информация по заказу</span>

            <!-- sofa info section -->
            <div class="row">
               <!-- sofa image -->
               <div class="col-md-6">
                  <div style="background-image:url('<?php echo $sofa_thumbnail_url; ?>'); height:65px;background-position: center; background-repeat:no-repeat; background-size:contain;"></div>
               </div>

               <!-- sofa info -->
               <div class="col-md-6">
                  <div class="p-constructor-order-sofa-info">
                     <span class="p-constructor-order__text">название: <span class="p-constructor-order__value"><?php echo $sofa_name; ?></span></span>
                     <span class="p-constructor-order__text">тип:
                        <span class="p-constructor-order__value"><?php echo $sofa_category_name;?></span>
                     </span>
                     <span class="p-constructor-order__text">цена: <span class="p-constructor-order__value"><?php echo $sofa_price; ?> <i class="fa fa-rub" aria-hidden="true"></i></span></span>
                  </div>
               </div>
            </div>

            <!-- sofa dimension -->
            <div class="row">
               <div class="col-md-4">
                  <div class="p-constructor-order-sofa-dimension">
                     <span class="p-constructor-order__text">длина: <span class="p-constructor-order__value p-constructor-order__value-length"><?php echo $sofa_length; ?> см</span></span>
                     <span class="p-constructor-order__text">ширина: <span class="p-constructor-order__value p-constructor-order__value-width"><?php echo $sofa_width; ?> см</span></span>
                     <span class="p-constructor-order__text">высота: <span class="p-constructor-order__value p-constructor-order__value-height"><?php echo $sofa_height; ?> см</span></span>
                  </div>
               </div>

               <!-- sofa filler -->
               <div class="col-md-4">
                  <div class="p-constructor-order-sofa-property">
                     <span class="p-constructor-order__text">наполнитель</span>
                     <div class="p-constructor-order__dimension p-constructor-order__filler p-constructor-sofa-property"></div>
                     <span class="p-constructor-order__filler-price p-constructor-order-sofa-property__price"></span>
                  </div>
               </div>

               <!-- sofa carcass -->
               <div class="col-md-4">
                  <div class="p-constructor-order-sofa-property">
                     <span class="p-constructor-order__text">каркас</span>
                     <div class="p-constructor-order__dimension p-constructor-sofa-property p-constructor-order__carcass"></div>
                     <span class="p-constructor-order__carcass-price p-constructor-order-sofa-property__price"></span>
                  </div>
               </div>
            </div>

            <!-- sofa casing -->
            <div class="row">
               <div class="col-md-12">
                  <div class="p-constructor-order-sofa-casing">
                     <div class="col-md-5">
                        <div class="p-constructor-order-sofa-casing__image"></div>
                     </div>

                     <div class="col-md-7">
                        <span class="p-constructor-order__text">Тип: <span class="p-constructor-order-sofa-casing__type p-constructor-order__value"></span> </span>
                        <span class="p-constructor-order__text">Цена: <span class="p-constructor-order-sofa-casing__price p-constructor-order__value"></span> </span>
                        <span class="p-constructor-order__text">Цвет: <span class="p-constructor-order-sofa-casing__color p-constructor-order__value"></span></span>
                        <span class="p-constructor-order__text">Плотность: <span class="p-constructor-order-sofa-casing__density p-constructor-order__value"></span></span>
                        <span class="p-constructor-order__text">Категория: <span class="p-constructor-order-sofa-casing__category p-constructor-order__value"></span></span>
                        <span class="p-constructor-order__text">Узор: <span class="p-constructor-order-sofa-casing__pattern p-constructor-order__value"></span></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- ordering -->
         <div class="p-constructor-ordering">
            <span class="p-constructor-ordering__hide-button b-hide-button">
               <i class="p-constructor-ordering__hide-button-icon p-constructor-ordering__hide-button-first-icon fa fa-info-circle" aria-hidden="true"></i>
               <i class="p-constructor-ordering__hide-button-icon p-constructor-ordering__hide-button-second-icon fa fa-bars" aria-hidden="true"></i>
            </span>
            <div class="row">
               <div class="col-md-12">
                  <?php echo do_shortcode( '[contact-form-7 id="92" title="Форма конструтора" html_class="p-constructor-ordering-form"]' ); ?>
                  <input class="p-constructor-sofa-name-field"  type="hidden" name="sofa-name" value="<?php echo $sofa_name; ?>">
                  <input class="p-constructor-sofa-price-field" type="hidden" name="sofa-name" value="<?php echo $sofa_price; ?>">
                  <input class="p-constructor-sofa-type-field"  type="hidden" name="sofa-name" value="<?php echo $sofa_category_name; ?>">
               </div>
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
               <i class="p-constructor-lock__icon p-constructor-lock__icon-check fa fa-check-square-o" aria-hidden="true"></i>
            </div>
            <a href="<?php echo get_home_url(); ?>/constructor/">
            <div class="p-constructor-control p-constructor-control-model p-constructor-control_active">
               <span class="p-constructor-control__text">выбор модели</span>
               <div class="p-constructor-control__image p-constructor-control__image-model"></div>
            </div>
            </a>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-unlock p-constructor-lock__parameter-unlock fa fa-unlock" aria-hidden="true"></i>
               <i class="p-constructor-lock__icon p-constructor-lock__icon_hide p-constructor-lock__icon-check  p-constructor-lock__parameter-check fa fa-check-square-o" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control p-constructor-control_active p-constructor-control-parameter">
               <span class="p-constructor-control__text">выбор параметров</span>
               <div class="p-constructor-control__image p-constructor-control__image-parameter"></div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-lock p-constructor-lock__casing-lock fa fa-lock" aria-hidden="true"></i>
               <i class="p-constructor-lock__icon p-constructor-lock__icon_hide p-constructor-lock__icon-unlock p-constructor-lock__casing-unlock fa fa-unlock" aria-hidden="true"></i>
               <i class="p-constructor-lock__icon p-constructor-lock__icon_hide p-constructor-lock__icon-check  p-constructor-lock__casing-check fa fa-check-square-o" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control p-constructor-control-casing">
               <span class="p-constructor-control__text">выбор обивки</span>
               <div class="p-constructor-control__image p-constructor-control__image-upholstery"></div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="p-constructor-lock">
               <i class="p-constructor-lock__icon p-constructor-lock__icon-lock p-constructor-lock__ordering-lock fa fa-lock" aria-hidden="true"></i>
               <i class="p-constructor-lock__icon p-constructor-lock__icon_hide p-constructor-lock__icon-unlock p-constructor-lock__ordering-unlock fa fa-unlock" aria-hidden="true"></i>
            </div>
            <div class="p-constructor-control p-constructor-control-ordering">
               <span class="p-constructor-control__text">оформление заказа</span>
               <div class="p-constructor-control__image p-constructor-control__image-order"></div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php get_footer(); ?>
