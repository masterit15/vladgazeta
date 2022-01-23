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
<div class="col-md-4 article-item">
	<div class="row">
	<div class="short_photo">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
	<div class="rubrika-article"><?php $cat = get_the_category(); echo $cat[0]->name; ?></div>
	</div>
	<div class="article-text">
		<span class="article-date"><?php the_time('j m Y') ?></span>
		<a href="<?php the_permalink(); ?>"><h4 class="news-title"><?php the_title(); ?></h4></a>
		<p class="short_an"><? the_excerpt(); ?></p>
	</div>
</div>
        
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
