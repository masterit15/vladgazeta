<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

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
		<a href="<?php the_permalink(); ?>"><h4 class="news-title"><?php title_limit(30, '...'); ?></h4></a>
		<p class="short_an"><? the_excerpt(); ?></p>
	</div>
</div>
