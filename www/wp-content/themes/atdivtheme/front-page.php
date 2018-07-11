<?php get_header(); ?>

<?php
// get slide sofas
$sofa_args = array(
   'numberposts' => 5,
   'post_type'   => 'sofa',
);

$sofas = get_posts( $sofa_args );

// get last works
$last_works_args = array(
   'numberposts' => 4,
   'post_type'   => 'last-works',
);

$last_works = get_posts( $last_works_args );
?>

<!-- slider -->
<div class="container">
   <div class="row">
      <!-- arrows -->
      <div class="p-home-slider-control col-md-1"></div>

      <!-- slide -->
      <div class="col-md-11 col-sm-12 col-xs-12">
         <div class="p-home-slider">
            <?php
            foreach($sofas as $sofa) {
               $sofa_excerpt = $sofa->post_excerpt;
            ?>
            <div class="p-home-slider-item">
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <!-- slider__info -->
                  <div class="p-home-slider__info">
                     <span class="p-home-slider__info-text"><?php echo $sofa_excerpt; ?></span>
                     <!-- <input type="button" name="" value="подробнее" class="p-home-slider__info-button b-button"> -->
                  </div>
               </div>

               <div class="col-md-8 col-sm-6 col-xs-12">
                  <!-- slider__image -->
                  <div class="p-home-slider__image" style="background-image:url('<?php echo get_the_post_thumbnail_url( $sofa, 'full' ); ?>')"></div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>

<!-- about us -->
<div class="container">
   <div class="row">
      <div class="p-home-about-us">
         <!-- left block -->
         <div class="col-lg-7 col-md-5 col-sm-6 col-xs-12">
            <div class="p-home-about-us-lb">
               <!-- img -->
               <a href="<?php echo get_template_directory_uri() . '/img/p-home/p-home-info/sofa/image-first.jpg'; ?>" title="Нобу">
                  <img class="p-home-about-us__image p-home-about-us__image-first"></img>
               </a>
               <a href="<?php echo get_template_directory_uri() . '/img/p-home/p-home-info/sofa/image-second.jpg'; ?>" title="Глансе">
                  <img class="p-home-about-us__image p-home-about-us__image-second"></img>
               </a>
               <a href="<?php echo get_template_directory_uri() . '/img/p-home/p-home-info/sofa/image-third.jpg'; ?>" title="Фантом">
                  <img class="p-home-about-us__image p-home-about-us__image-third"></img>
               </a>
            </div>
         </div>

         <!-- right block -->
         <div class="col-lg-5 col-md-7 col-sm-6 col-xs-12">
            <div class="p-home-about-us-rb">
               <!-- title -->
               <h5 class="p-home-about-us-rb__title b-title">О нас</h5>
               <!-- line -->
               <hr class="p-home-about-us-rb__line b-title-line">
               <!-- text -->
               <span class="p-home-about-us-rb__text">
                  At-div это профессиональная компания по сбору и
                  индивидуальному пошиву диванного ателье, мы на рынке
                  уже более 16 лет и имеем тысячи положительных отзывов
                  от наших заказчиков.
               </span>
               <span class="p-home-about-us-rb__text">
                  В нашем арсенале имеется огромное разнообразие
                  компонентов для создания дивана на любой вкус. Мы
                  воплотим любые ваши желания и идеи! Мы оказываем
                  наиболее полный спектр услуг по созданию диванов любой
                  сложности.
               </span>
               <span class="p-home-about-us-rb__text">
                  Мастера усердно работают над каждым заказом,
                  чтобы претворить в жизнь самые неординарные идеи.
                  В нашем ательерождаются уникальные модели которые
                  поразят любого.
               </span>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- dignity -->
<div class="container">
   <div class="row">
      <div class="p-home-dignity">
         <!-- title -->
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="p-home-dignity-head">
               <h5 class="p-home-dignity__title b-title">наши достоинства</h5>
               <hr class="p-home-dignity__line b-title-line">
            </div>
         </div>

         <!-- dignity left -->
         <div class="col-xl-5 col-md-6 col-sm-12 col-xs-12">
            <div class="p-home-dignity-left">
               <!-- info block -->
               <div class="p-home-dignity-info">
                  <h5 class="p-home-dignity-info__title p-home-dignity-info__title_right">выполняем заказ в кротчайшие сроки</h5>
                  <span class="p-home-dignity-info__text p-home-dignity-info__text_right">
                     После оформления заказа наши специалисты с точностью до дня
                     определяют примерный срок выполнения работы
                     Погрешность в графике составляет не более 3х дней
                  </span>
                  <span class="p-home-dignity-info__text p-home-dignity-info__text_right">
                     Минимальный срок выполнения заказа: 1 месяц
                  </span>
                  <div class="p-home-dignity-info__image p-home-dignity-info__image-first"></div>
               </div>

               <!-- achieved block -->
               <div class="p-home-dignity-achieved">
                  <img class="p-home-dignity-achieved__image p-home-dignity-achieved__image-first p-home-dignity-achieved__image_right"></img>
                  <div class="p-home-dignity-achieved__text-block p-home-dignity-achieved__text-block_right">
                     <h5 class="p-home-dignity-achieved__title p-home-dignity-achieved__title_right">4837 готовых проектов</h5>
                     <span class="p-home-dignity-achieved__title p-home-dignity-achieved__title_right p-home-dignity-achieved__title_little">Более 750 заказов от крупнейших компаний</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_right">MGM Grand</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_right">Shinagawa Prince Hotel</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_right">Яндекс</span>
                  </div>
               </div>

               <!-- info block -->
               <div class="p-home-dignity-info">
                  <h5 class="p-home-dignity-info__title p-home-dignity-info__title_right">гарантия качества</h5>
                  <span class="p-home-dignity-info__text p-home-dignity-info__text_right">
                     В своих проектах мы используем материалы ТОЛЬКО
                     лучшего качества от проверенных
                     и известных поставщиков
                  </span>
                  <span class="p-home-dignity-info__text p-home-dignity-info__text_right">
                     Мы сотрудничаем с такими поставщиками материалов как: EXPRESWOOD, Domiart
                  </span>
                  <div class="p-home-dignity-info__image p-home-dignity-info__image-second"></div>
               </div>
            </div>
         </div>

         <!-- dignity mid -->
         <div class="col-md-2">
            <div class="p-home-dignity-mid">
               <div class="p-home-dignity-mid__line"></div>
            </div>
         </div>

         <!-- dignity right -->
         <div class="col-xl-5 col-md-6 col-sm-12 col-xs-12">
            <div class="p-home-dignity-right">
               <!-- achieved block -->
               <div class="p-home-dignity-achieved">
                  <img class="p-home-dignity-achieved__image p-home-dignity-achieved__image-second"></img>
                  <div class="p-home-dignity-achieved__text-block p-home-dignity-achieved__text-block_left">
                     <h5 class="p-home-dignity-achieved__title p-home-dignity-achieved__title_left">4837 готовых проектов</h5>
                     <span class="p-home-dignity-achieved__title p-home-dignity-achieved__title_little p-home-dignity-achieved__title_left">Более 750 заказов от крупнейших компаний</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_left">MGM Grand</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_left">Shinagawa Prince Hotel</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_left">Яндекс</span>
                  </div>
               </div>

               <!-- info block -->
               <div class="p-home-dignity-info">
                  <h5 class="p-home-dignity-info__title p-home-dignity-info__title_left">гарантия качества</h5>
                  <span class="p-home-dignity-info__text p-home-dignity-info__text_left">
                     В своих проектах мы используем материалы ТОЛЬКО
                     лучшего качества от проверенных
                     и известных поставщиков
                  </span>
                  <span class="p-home-dignity-info__text p-home-dignity-info__text_left">
                     Мы сотрудничаем с такими поставщиками материалов как: EXPRESWOOD, Domiart
                  </span>
                  <div class="p-home-dignity-info__image p-home-dignity-info__image-third"></div>
               </div>

               <!-- achieved block -->
               <div class="p-home-dignity-achieved">
                  <img class="p-home-dignity-achieved__image p-home-dignity-achieved__image-third"></img>
                  <div class="p-home-dignity-achieved__text-block p-home-dignity-achieved__text-block_left">
                     <h5 class="p-home-dignity-achieved__title p-home-dignity-achieved__title_left">16 лет на рынке</h5>
                     <span class="p-home-dignity-achieved__title p-home-dignity-achieved__title_little p-home-dignity-achieved__title_left"> Более 790 профессиональных сотрудников</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_left">Проф. дизайнер Toby Johns</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_left">Мастер по работе с кожей Елизавета Фокина</span>
                     <span class="p-home-dignity-achieved__text p-home-dignity-achieved__text_left">Мастер по работе с деревом Robert Shaw</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- last works -->
<div class="container">
   <div class="row">
      <div class="p-home-last-works">
         <!-- title -->
         <div class="col-md-12">
            <div class="p-home-last-works-head">
               <h5 class="p-home-last-works__title b-title">последние работы</h5>
               <hr class="p-home-last-works__line b-title-line">
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

         <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a href="<?php echo $last_work_link; ?>">
            <div class="b-last-work-section p-home-last-work-section" style="background-image:url('<?php echo $last_work_thumbnail_url; ?>'); height: 315px; background-size: cover; background-position: center;">
               <!-- name -->
               <span class="b-last-work__name"><?php echo $last_work_name; ?></span>

               <!-- info -->
               <div class="b-last-work-info">
                  <div class="row">
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
            </div>
            </a>
         </div>

         <?php
         }
         ?>
         <!-- all -->
         <div class="col-md-12 col-sm-12 col-xs-12">
            <a href="<?php echo get_home_url(); ?>/last-works-catalog/" class="p-home-last-works__all b-button">посмотреть все</a>
         </div>
      </div>
   </div>
</div>

<!-- p-home-map -->
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="p-home-map">
            <div class="p-home-map__item">
               <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac06fd79f2fb3f88e6435be80244cb3991c1097cce86ebbb20b5d119027316951&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>
