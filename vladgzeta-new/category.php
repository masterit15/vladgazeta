<!--Выводим шапку-->
<?php get_header(); ?>
<main id="main" class="pjax-container" role="main">
	<div class="col-md-9">
		<!--Заголовок рубрики-->
		<h2><?php single_cat_title(); ?></h2>
		<div class="articles-container">
			<!--Индивидуальные стили-->
			<!--Код вывода заголовков постов из категории с миниатюрами-->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<a class="article-item" href="<?php the_permalink(); ?>">
				<div class="article-item-photo" style='background-image: url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0]; ?>)'></div>
				<div class="article-item-content">
					<div class="article-item-cat"><?php $cat = get_the_category(); echo $cat[0]->name; ?></div>
					<span class="article-item-date"><?php the_time('j.m.Y в H:i') ?></span>
					<h4 class="article-item-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4>
					<div class="article-item-text">
						<p class="short_an"><? the_excerpt(); ?></p>
					</div>
				</div>
			</a>
			<?php endwhile; ?> 
		<?php endif; ?>
		<!--Конец кода вывода постов из категории-->
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<script>
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
			<div id="load_more_gs">
				<div class="load-container">
					<!-- <div class="cssload-whirlpool"></div> -->
					<div id="loadmore_gs">Показать еще</div>
				</div>
			</div>
		<?php endif; ?>
	</div><!-- .entry-content -->
</div>
</main>
<!--Тег вывода сайдбара-->
<?php get_sidebar(); ?>
<!--Конец индивидуальных стилей-->
<!--Тег вывода подвала-->
<?php get_footer(); ?>
