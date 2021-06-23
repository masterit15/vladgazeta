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

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="https://vladgazeta.gq/wp-content/uploads/2017/03/logo.png" />
	<link rel="canonical" href="https://vladgazeta.online/"/>
	<?php if (is_single() || (is_page())) {
if (have_posts()) : while (have_posts()) : the_post();
$strDescr = wp_trim_words(get_the_content(), 30, '');
$strDescr = preg_split("/[?!] /", $strDescr);
echo '<meta name="description" content="'.$strDescr[0].$strDescr[1].$strDescr[2].$strDescr[3].'" >';
endwhile; endif; }
else {
echo '<meta name="description" content="Официальный сайт газеты Владикавказ" >';
}
?>
<meta name="keywords" content="<?php 
if ( is_single()) { 
foreach(get_the_tags($page->ID) as $metki) :
echo ''. $metki->name .', ';
endforeach;
} else { 
echo 'новости, газета, владикавказ, сайт';
} ?>" >

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	<?php
	// wp_deregister_script('jquery');
	// wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"), false, '1.7.2');
	// wp_enqueue_script('jquery');
	?>
	<?php wp_head(); ?>
</head>

<body>
	<div class="top-bar">
		<div class="container">
			<?php dynamic_sidebar( 'top-bar' ); ?>
			<div class="col-sm-6"><div id="0b139c17985a3c34abff3c64c90d5f60" class="ww-informers-box-854753" style="-webkit-transform:rotateY(90deg);transform:rotateY(90deg);"><p><a href="https://world-weather.ru/pogoda/russia/vladikavkaz/7days/">world-weather.ru/pogoda/russia/vladikavkaz/7days/</a><br><a href="https://world-weather.ru/pogoda/russia/nizhny_novgorod/">https://world-weather.ru/pogoda/russia/nizhny_novgorod/</a></p></div><script type="text/javascript" charset="utf-8" src="https://world-weather.ru/wwinformer.php?userid=0b139c17985a3c34abff3c64c90d5f60"></script></div>
			<?php dynamic_sidebar( 'language' ); ?>	
			<?php dynamic_sidebar( 'spec-v' ); ?>	
		</div>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="logo">
						<?php echo the_custom_logo(); ?>
						<?php
						if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div>
			</div>

			<!-- begin searsh -->
			<div class="col-md-8 col-sm-12">
				<?php dynamic_sidebar( 'header' ); ?>
			</div>
			<!-- end search -->
		</div>
	</div>
</header><!-- #masthead -->

<!-- begin naviration -->
	<navigation>
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-12">
					<div class="nav-wrapper">
						<nav class="navbar navbar-default main-nav" role="navigation">
								<div class="navbar-header">
									<a href="#my-menu" class="toggle-mnu hamburger hamburger--emphatic">
										<span class="hamburger-box">
											<span class="hamburger-inner"></span>
										</span>
									</a>
								</div>			
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<button><div class="hamburger"></div></button>
									<?php wp_nav_menu( array(
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
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul class="sf-menu nav navbar-nav">%3$s</ul>',
										'depth'           => 0,
										'walker'          => '',
										) ); ?>
										<ul class='hidden-links hidden'></ul>
									</div> 
									<?php get_search_form(); ?>  
							</nav>
						</div>
				</div>
			</div>
		</div>
	</navigation>
	<!-- end navigation -->
	<!-- begin content -->
	<section>
		<div class="container">
			<div class="row">
				<!--Блок Главных Новостей и статей-->
