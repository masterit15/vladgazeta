<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */
$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ? wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] : get_template_directory_uri().'/images/dist/no-photo.png';
?>
<a class="article-item sdsdfsdf" href="<?php the_permalink(); ?>">
	<div class="article-item-photo" style='background-image: url(<?= $img ?>)'></div>
	<span class="article-item-cat"><?php $cat = get_the_category(); echo $cat[0]->name; ?></span>
	<div class="article-item-content">
		<div class="article-item-head">
			<span class="article-item-date"><?php the_time('j.m.Y в H:i') ?></span>
		</div>
		<h4 class="article-item-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4>
		<div class="article-item-text">
			<p class="short_an"><? the_excerpt(); ?></p>
		</div>
	</div>
</a>
