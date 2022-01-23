<?php

/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

get_header(); ?>
	<main id="main" class="pjax-container" role="main">
		<div class="articles-container">
			<?php
			if (have_posts()) : ?>

				<header class="page-header">
					<?php
					the_archive_title('<h1 class="page-title">', '</h1>');
					the_archive_description('<div class="archive-description">', '</div>');
					?>
				</header><!-- .page-header -->

			<?php
				/* Start the Loop */
				while (have_posts()) : the_post();
					get_template_part('template-parts/content', get_post_format());

				endwhile;

			else :

				get_template_part('template-parts/content', 'none');

			endif; ?>
			<?php if ($wp_query->max_num_pages > 1) : ?>
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
		</div>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
