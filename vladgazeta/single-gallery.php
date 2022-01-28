<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dfsdfdf
 */

get_header(); ?>
	<div class="gallery_detail" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			while (have_posts()) : the_post();
			?>
			<?the_title('<h2>', '</h2>')?>
				<div class="entry-content">
					<?php
								echo '<div class="gallery_list_wrap">';
										single_gallery($post);
								echo '</div>';
					?>
				</div><!-- .entry-content -->
				<div class="b-share-small-wrap">
					<a onclick="Share.vkontakte('<?php the_permalink(); ?>','<?php the_title(); ?>','http://vladgazeta.gq/wp-content/uploads/2017/03/logo.png','')"><i class="fa fa-vk"></i></a>
					<a onclick="Share.facebook('<?php the_permalink(); ?>','<?php the_title(); ?>','http://vladgazeta.gq/wp-content/uploads/2017/03/logo.png','')"><i class="fa fa-facebook"></i></a>
					<a onclick="Share.odnoklassniki('<?php the_permalink(); ?>','')"><i class="fa fa-odnoklassniki"></i></a>
					<a onclick="Share.twitter('<?php the_permalink(); ?>','<?php the_title(); ?>')"><i class="fa fa-twitter"></i></a>
				</div>
				<?php the_post_navigation(array(
					'screen_reader_text' 	=> ' ',
					'next_text' 					=> '<div class="text-next"><span class="post-title">%title</span>' . '<i class="fa fa-chevron-right"></i></div>',
					'prev_text' 					=> '<div class="text-prev"><i class="fa fa-chevron-left"></i>' . '<span class="post-title">%title</span></div>',
				)); ?>
			<?php endwhile; ?>
	</div>
<?php
get_sidebar();
get_footer();
