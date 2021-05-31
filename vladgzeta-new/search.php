<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vladgzeta
 */

get_header(); ?>

<div class="col-md-9">
	<div class="articles-container">
		<div class="inner-article-wrapper">
			<?php
			if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Результаты поиска: %s', 'vladgzeta' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php
			while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'search' );

			endwhile;



			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
