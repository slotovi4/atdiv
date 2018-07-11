<!DOCTYPE html>
<html>
	<head>
		<title>atdiv</title>
		<link rel="icon" href="<?php echo get_template_directory_uri() . '/favicon.ico'; ?>" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>

<body>

<div class="container">
	<div class="row">
		<!-- header -->
		<header class="header">
			<!-- header__logo -->
			<div class="header__logo col-md-6  col-sm-12 col-xs-12">
				<a href="<?php echo get_home_url(); ?>">
					<div class="header__logo-name"></div>
				</a>
				<div class="header__logo-brief">Ателье диванов в Симферополе</div>
			</div>

			<!-- menu -->
			<menu class="header__menu col-md-6  col-sm-12 col-xs-12">
				<?php
				$menu_args =  array(
					'theme_location'  => 'primary',
					'menu'            => 'Главное меню',
					'menu_class'      => 'header__menu',
					'items_wrap'      => '<ul class="header__menu-ul">%3$s</ul>',
				);
				wp_nav_menu( $menu_args );
				?>
			</menu>

			<!-- mobile menu -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="header-mobile-nav">
					<span class="header-mobile-nav__title">Выбрать страницу <i class="fa fa-bars" aria-hidden="true"></i></span>

					<?php
					$menu_args =  array(
						'theme_location'  => 'primary',
						'menu'            => 'Главное меню',
						'menu_class'      => 'header-mobile-nav__menu',
						'items_wrap'      => '<ul class="header-mobile-nav__ul">%3$s</ul>',
					);
					wp_nav_menu( $menu_args );
					?>
				</div>
			</div>


			<!-- header__login -->
			<!-- <div class="header__login col-md-1">
				<i class="fa fa-sign-in header__login-icon" aria-hidden="true"></i>
			</div> -->
		</header>
	</div>
</div>
