<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

get_header(); ?>

<main id="main gazet" class="pjax-container" role="main">
<div class="col-md-9">
<div class="articles-container">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'archiv' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</div><!-- #primary -->
	    <div class="col-md-12 gazet">
        <div style="text-align:center;">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</div>
<div class="col-sm-3 np">
<div class="archiv-select">
		<select onchange="document.location.href=this.options[this.selectedIndex].value;">
			<option value="">Выберите год...</option> 
			<?php wp_get_archives( array( 
				'post_type' 			=>'gazet', 
				'type' 						=> 'yearly', 
				'format' 					=> 'option', 
				'before'					=>'<span class="first-span">архив за</span>',
				'after'						=>'<span class="last-span">год</span>',
				'show_post_count' => 0
			) 
			); ?>
		</select>
	</div>	
	</div>
		</main><!-- #main -->
<?php
get_sidebar();
get_footer();
