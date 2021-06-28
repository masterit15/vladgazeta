<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vladgzeta
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="https://vladgazeta.gq/wp-content/uploads/2017/03/logo.png" />
	<link rel="canonical" href="https://vladgazeta.online/" />
	<?php if (is_single() || (is_page())) {
		if (have_posts()) : while (have_posts()) : the_post();
				$strDescr = wp_trim_words(get_the_content(), 30, '');
				$strDescr = preg_split("/[?!] /", $strDescr);
				echo '<meta name="description" content="' . $strDescr[0] . $strDescr[1] . $strDescr[2] . $strDescr[3] . '" >';
			endwhile;
		endif;
	} else {
		echo '<meta name="description" content="Официальный сайт газеты Владикавказ" >';
	}
	?>
	<meta name="keywords" content="<?php
																	if (is_single()) {
																		foreach (get_the_tags($page->ID) as $metki) :
																			echo '' . $metki->name . ', ';
																		endforeach;
																	} else {
																		echo 'новости, газета, владикавказ, сайт';
																	} ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/dist/favicon.ico" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<div class="container-fluid" style="background-color: #fff;">
		<div class="row">
			<div class="col-12 col-xl-10 offset-xl-1">
				<div class="top-bar">
					<?php dynamic_sidebar('top-bar'); ?>
					<div id="0b139c17985a3c34abff3c64c90d5f60" class="ww-informers-box-854753" style="-webkit-transform:rotateY(90deg);transform:rotateY(90deg);">
						<p><a href="https://world-weather.ru/pogoda/russia/vladikavkaz/7days/">world-weather.ru/pogoda/russia/vladikavkaz/7days/</a><br><a href="https://world-weather.ru/pogoda/russia/nizhny_novgorod/">https://world-weather.ru/pogoda/russia/nizhny_novgorod/</a></p>
					</div>
					<script type="text/javascript" charset="utf-8" src="https://world-weather.ru/wwinformer.php?userid=0b139c17985a3c34abff3c64c90d5f60"></script>
					<?php dynamic_sidebar('language'); ?>
					<?php dynamic_sidebar('spec-v'); ?>
				</div>
			</div>
		</div>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-xl-10 offset-xl-1">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
						<img src="<?=wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]?>" alt="<?php bloginfo('name'); ?>">
						<h1><?php bloginfo('name'); ?></h1>
						<img class="gerb" src="<?php echo get_template_directory_uri(); ?>/images/dist/gerb.png" alt="<?php bloginfo('name'); ?>">
					</a>
				</div>
				<div class="col-12 col-xl-10 offset-xl-1">
					<!-- begin naviration -->
					<navigation>
						<div class="nav-wrapper">
							<nav class="navbar navbar-default main-nav" role="navigation">
								<!-- <a href="#my-menu" class="toggle-mnu hamburger hamburger--emphatic">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</a> -->
								<div class="top_menu">
									<?wp_nav_menu(array(
										'theme_location'  => 'menu-top',
										'menu'            => '',
										'container'       => 'ul',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'nav navbar-nav',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '<span>',
										'link_after'      => '</span>',
										'items_wrap'      => '<ul class="menu"><li class="dd_menu"><button class="hamburgers dropdown-toggle"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button><ul class="dropdown-menu"></ul></li>%3$s</ul>',
										'depth'           => 0,
										'walker'          => '',
									)); 
									?>
								</div>
								<?php get_search_form(); ?>
							</nav>
						</div>
					</navigation>
					<!-- end navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<!-- begin content -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-xl-10 offset-xl-1">
					<div class="row">