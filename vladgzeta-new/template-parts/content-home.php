<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

?>
<div class="articles-container">
<?php // Display blog posts on any page @ http://m0n.co/l
$temp = $wp_query; $wp_query= null;
$wp_query = new WP_Query('cat=-22'); $wp_query->query('showposts=18' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>
<div class="col-md-4 article-item">
	<div class="row">
		<div class="short_photo">
			<div class="wrap">
				<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
				<a href="<?php the_permalink(); ?>"><div class='news-img' style='background-image: url(<?php echo $image_url[0]; ?>)'></div><div class="arrow"></div></a>
			</div>
		</div>
		<div class="rubrika-article"><?php $cat = get_the_category(); echo $cat[0]->name; ?></div>
	</div>
	<div class="article-text">
		<span class="article-date"><?php the_time('j.m.Y в H:i') ?></span>
		<a href="<?php the_permalink(); ?>"><h4 class="news-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4></a>
		<div class="short_an"><?php the_content(); ?></div>
	</div>
</div>
<?php
endwhile; ?> 
<div class="col-md-12">
	<div class="all-news">
		<a href="http://vladgazeta.online/novostnaya-lenta/" class="btn btn-default pdf-btn">Все новости</a>
	</div>
	
</div>
</div><!-- .entry-content -->