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
				<div class="col-md-4 article-item">
					<div class="row">
						<div class="short_photo">
							<div class="wrap">
								<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
								<a href="<?php the_permalink(); ?>"><div class='news-img' style='background-image: url(<?php echo $image_url[0]; ?>)'></div><div class="arrow"></div></a>
							</div>
						</div>
						<div class="rubrika-article"><?php echo single_cat_title();?></div>
					</div>
					<div class="article-text">
						<span class="article-date"><?php the_time('j.m.Y в H:i') ?></span>
						<a href="<?php the_permalink(); ?>"><h4 class="news-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4></a>
						<div class="short_an"><?php the_content(); ?></div>
					</div>
				</div>
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
