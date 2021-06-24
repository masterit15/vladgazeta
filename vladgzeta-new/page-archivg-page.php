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
<div class="col-md-9">
	<main id="main gazet" role="main">
		<div class="row">
			<?php get_template_part('template-parts/content', 'archivg'); ?>
		</div>
	</main>
</div>
<?php
get_sidebar();
get_footer();
