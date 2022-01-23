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
<main id="main" class="pjax-container1" role="main">
<section class="section-slider">
<div class="container">
		<div class="col-md-9 col-sm-12">
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
</div>             
<div class="col-md-3 col-sm-12">
	<div class="lenta"> 
		<div class="news-lent">
			<?php
		$id=10; // ID заданной рубрики
		$n=15;   // количество выводимых записей
		$recent = new WP_Query("cat=$id&showposts=$n"); 
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
</div>
</div>
</section>
<div class="col-md-9">

<?php get_template_part( 'template-parts/content', 'home' ); ?>
			
</div>
</main>
<?php
get_sidebar(); ?>
<?php
get_footer();
