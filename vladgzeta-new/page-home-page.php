<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

get_header(); ?>
	<div class="col-sm-12">
		<ul class="home-banner"  data-action="<?php echo get_template_directory_uri(); ?>/hotnews.php">
			<?
			$reviews = new WP_Query(
			array(
				'post_type' => 'banner',
				'post_status' => 'publish',
				)
			);
			if ($reviews->have_posts()) {while ($reviews->have_posts()) {$reviews->the_post();
			$custom = get_post_custom($post->ID);
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
			?>
			<li class="home-banner-body" style="background-color: <?=$custom['banner_bgcolor'][0]?>">
				<div class="home-banner-media" style="background-image: url(<?=$image?>);"></div>
				<div class="home-banner-content" style="color: <?=$custom['banner_titlecolor'][0]?>;">
					<div class="home-banner-date"><?php the_time('j.m.Y в H:m') ?></div>
					<h2 class="home-banner-title"><?php the_title();?></h2>
					<p class="home-banner-desc"><?php the_excerpt();?></p>
				</div>
				<button type="button" class="next-card" style="color: <?=$custom['banner_titlecolor'][0]?>;"><i class="fa fa-chevron-down"></i></button>
			</li>
			<?}} else {echo 'Ничего не найдено';}wp_reset_postdata();?>
		</ul>
		
	</div>
	<div class="col-md-3">
		<div class="lenta widget"> 
			<div class="news-lent">
			<?php
			$id=10; // ID заданной рубрики
			$n=5;   // количество выводимых записей
			$recent = new WP_Query("cat=$id&posts_per_page=$n"); 
			while($recent->have_posts()) : $recent->the_post();
			?>
			<div class="news-feed">
				<div class="news-time"><?php the_time('j.m.Y') ?></div>
				<div class="news-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
			</div>
			<?php endwhile; ?> 
			</div>
			<div style="text-align:center;"><a class="btn btn-default pdf-btn" href="<?php echo get_category_link(10); ?>">Все новости</a></div>
		</div>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
	<div class="col-md-6">
		<div class="main-news">
			<div class="big-slider owl-carousel"> 
				<?php
				$id=11; // ID заданной рубрики
				$n=4;   // количество выводимых записей
				$recent = new WP_Query("cat=$id&showposts=$n"); 
				while($recent->have_posts()) : $recent->the_post();
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
				?>
				<?php echo "<div class='item'>" ?>
				<a href="<?php the_permalink(); ?>">
				<div class='img' style='background-image: url(<?php echo $image_url[0]; ?>)'></div>
				<div class="rubrika"><?php echo get_cat_name(11);?></div>
				<div class="main-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="date-category"><?php the_time('j.m.Y в H:i') ?></div>
				</a>
				<?php echo "</div>" ?>
				<?php endwhile; ?>     
			</div>
		</div> 
		<?php get_template_part( 'template-parts/content', 'home' ); ?>		
	</div>
		<?php get_sidebar(); ?>
<?php
get_footer();
