<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

get_header(); ?>
<main id="main gazet" class="pjax-container1" role="main">
	<div class="col-md-9">
		<div class="row">
			
		

		<?php get_template_part( 'template-parts/content', 'archivg' ); ?>
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
</main>
<?php
get_sidebar();
get_footer();
