<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

get_header(); ?>
<div class="col-md-9">
<main id="main gazet" class="pjax-container" role="main">

		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'archiv' );
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		
		<div class="col-md-12 gazet">
			<div style="text-align:center;">
					<?php the_posts_pagination(); ?>
			</div>
		</div>
	</div>
</main><!-- #main -->
</div>
<?php
get_sidebar();
get_footer();
