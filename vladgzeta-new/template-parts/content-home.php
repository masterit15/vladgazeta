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
$wp_query = new WP_Query('cat=-22'); $wp_query->query('showposts=10' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>
<a class="article-item" href="<?php the_permalink(); ?>">
	<div class="article-item-photo" style='background-image: url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0]; ?>)'></div>
	<div class="article-item-content">
		<div class="article-item-head">
			<span class="article-item-cat"><?php $cat = get_the_category(); echo $cat[0]->name; ?></span>
			<span class="article-item-date"><?php the_time('j.m.Y в H:i') ?></span>
		</div>
		<h4 class="article-item-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4>
		<div class="article-item-text">
			<p class="short_an"><? the_excerpt(); ?></p>
		</div>
	</div>
</a>
<?php
endwhile; ?> 
<div class="col-md-12">
	<div class="all-news">
		<a href="http://vladgazeta.online/novostnaya-lenta/" class="btn btn-default pdf-btn">Все новости</a>
	</div>
	
</div>
</div><!-- .entry-content -->