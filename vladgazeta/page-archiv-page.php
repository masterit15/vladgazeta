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
  <main id="main gazet" class="pjax-container" role="main">
      <?php get_template_part('template-parts/content', 'archiv'); ?>
  </main>
<?php
get_sidebar();
get_footer();
