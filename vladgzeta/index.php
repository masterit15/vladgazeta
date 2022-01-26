<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

get_header(); ?>
<div class="col-md-9">
	<div class="articles-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if (have_posts()) :

			if (is_home() && !is_front_page()) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

		<?php
			endif;

			/* Start the Loop */
			while (have_posts()) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_format());

			endwhile;

		// the_posts_navigation();

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
</div>

<?php
get_sidebar();
get_footer();
