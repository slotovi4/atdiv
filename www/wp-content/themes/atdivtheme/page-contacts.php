<?php
/*
   Template Name: Страница контактов
*/
?>

<?php get_header(); ?>

<div class="container">
   <div class="row">
      <!-- header -->
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="p-contacts-header">
            <div class="p-contacts-header__image"></div>
            <span class="p-contacts-header__title">Контакты</span>
         </div>
      </div>
   </div>

   <div class="row">
      <!-- contacts info -->
      <div class="col-md-6 col-sm-12 col-xs-12">
         <div class="p-contacts-info">
            <span class="p-contacts-info__title">Наши телефоны</span>
            <a href="tel:<?php echo get_theme_mod('number_tf'); ?>" class="p-contacts-info__field p-contacts-info__field_primaty">т.ф.: <?php echo get_theme_mod('number_tf'); ?></a>
            <a href="tel:<?php echo get_theme_mod('number_mob'); ?>" class="p-contacts-info__field p-contacts-info__field_primaty">моб.: <?php echo get_theme_mod('number_mob'); ?></a>

            <span class="p-contacts-info__title">Наша почта</span>
            <a href="mailto:<?php echo get_theme_mod('E-mail'); ?>" class="p-contacts-info__field p-contacts-info__field_primaty">email.: <?php echo get_theme_mod('E-mail'); ?></a>

            <span class="p-contacts-info__title">Наш адрес</span>
            <span class="p-contacts-info__field"><?php echo get_theme_mod('detailed_address'); ?></span>
         </div>
      </div>

      <!-- map -->
      <div class="col-md-6 col-sm-12 col-xs-12">
         <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A784d2e9157142744ce0c14f526b3f4cb26862492f28a27a5decab852212042e5&amp;width=100%25&amp;height=250&amp;lang=ru_RU&amp;scroll=true"></script>
      </div>
   </div>
</div>

<?php get_footer(); ?>
