<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vladgzeta
 */

get_header(); ?>
<div class="col-md-9">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			// the_post_navigation();


		endwhile; // End of the loop.
		?>

	<div class="articles-container">
<!--Индивидуальные стили-->
<!--Код вывода заголовков постов из категории с миниатюрами-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<a class="article-item" href="<?php the_permalink(); ?>">
	<?if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]){?>
			<div class="article-item-photo" style='background-image: url(<?= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>)'></div>
	<?}?>
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
        
<?php endwhile; ?> 
<?php endif; ?>

<!--Конец кода вывода постов из категории-->
<div class="col-md-12">
<!-- <div style="text-align:center;"><div class="pagination">
<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
</div></div> -->
</div>
</div><!-- .entry-content -->
</div>
<?php
get_sidebar();
get_footer();
