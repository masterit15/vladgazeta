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
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body>
<div class="container">
		<div class="top-bar">
			<ul class="socials">
				<li><a href="<?= get_theme_mod('soc_fac') ?>"><i class="fa fa-facebook"></i></a></li>
				<li><a href="<?= get_theme_mod('soc_inst') ?>"><i class="fa fa-instagram"></i></a></li>
				<li><a href="<?= get_theme_mod('soc_vk') ?>"><i class="fa fa-vk"></i></a></li>
				<li><a href="<?= get_theme_mod('soc_ok') ?>"><i class="fa fa-odnoklassniki"></i></a></li>
			</ul>
			<?php dynamic_sidebar('spec-v'); ?>
		</div>
	<header class="header" role="banner">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/dist/logo.png" alt="">
		</a>
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
						<? wp_nav_menu(array(
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
	</header><!-- #masthead -->
	</div>
	<!-- begin content -->
	<div class="wrapper">