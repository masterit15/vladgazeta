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

get_header(); 
function catPostCount($id){
	$category = get_category($id);
	$count = $category->category_count;
	return $count > 0 ? true : false;
}
?>
<aside class="aside_left">
	<?if(catPostCount(10)){?>
		<div class="lenta widget"> 
			<div class="news-lent">
			<?php
			$recent = new WP_Query("cat=10&posts_per_page=5"); 
			while($recent->have_posts()) : $recent->the_post();
			?>
			<div class="news-feed">
				<div class="news-time"><?php the_time('j.m.Y') ?></div>
				<div class="news-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
			</div>
			<?php endwhile; ?> 
			</div>
			<div style="text-align:center;"><a class="btn btn-default" href="<?php echo get_category_link(10); ?>">Все <?=get_cat_name(10) ?></a></div>
		</div>
		<?}?>
		<?if(catPostCount(63)){?>
		<div class="lenta widget"> 
			<div class="news-lent">
			<?php
			$recent = new WP_Query("cat=63&posts_per_page=5"); 
			while($recent->have_posts()) : $recent->the_post();
			?>
			<div class="news-feed">
				<div class="news-time"><?php the_time('j.m.Y') ?></div>
				<div class="news-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
			</div>
			<?php endwhile; ?> 
			</div>
			<div style="text-align:center;"><a class="btn btn-default" href="<?php echo get_category_link(63); ?>">Все <?=get_cat_name(63) ?></a></div>
		</div>
		<?}?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside>
<div class="container">
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
