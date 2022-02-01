<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dfsdfdf
 */

get_header(); ?>
<div class="detail_news ">
	<div class="articles-container wite-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="inner-article-wrapper">
			<?php
			while (have_posts()) : the_post();
			?>
				<header class="entry-header">
					<div class="rubrika"><?php
																$cat = get_the_category();
																echo $cat[0]->name;
																?></div>
					<?php
					if (is_single()) :
						the_title('<h1 class="entry-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;

					if ('post' === get_post_type()) : ?>

						<div class="entry-meta">
							<div class="inner-date"><?php the_time('j m Y  H:i') ?></div>
						</div>
						<?php setPostViews(get_the_ID()); ?>
					<?php
					endif; ?>
					<div class="thumbnail-image">
						<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]?>
						<img src="<?=$img?>" alt="">
				</div>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
					the_content(sprintf(
						/* translators: %s: Name of current post. */
						wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'vladgzeta'), array('span' => array('class' => array()))),
						the_title('<span class="screen-reader-text">"', '"</span>', false)
					));

					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'vladgzeta'),
						'after'  => '</div>',
					));
					?>
					<!-- <p class="autor"><? //php the_author(); 
																?></p> -->
				</div><!-- .entry-content -->
				<? show_thumbnails_list(); ?>
				<hr>
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
	</div>

	<?php
	$categories = get_the_category($post->ID);
	if ($categories) {
		$category_ids = array();
		foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args = array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'showposts' => 6,
			'orderby' => 'rand',
			'caller_get_posts' => 1
		);
		$my_query = new wp_query($args);
		if ($my_query->have_posts()) {
			echo '<h3>Похожие записи:</h3>';
			echo '<div class="articles-container">';
			while ($my_query->have_posts()) {
				$my_query->the_post();
	?>
				<a class="article-item" href="<?php the_permalink(); ?>">
					<? if (wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) { ?>
						<div class="article-item-photo" style='background-image: url(<?= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>)'></div>
					<? } ?>
					<div class="article-item-content">
						<div class="article-item-head">
							<span class="article-item-cat"><?php $cat = get_the_category();
																							echo $cat[0]->name; ?></span>
							<span class="article-item-date"><?php the_time('j.m.Y в H:i') ?></span>
						</div>
						<h4 class="article-item-title"><? //php title_limit(30, '...'); 
																						?><?php the_title(); ?></h4>
						<div class="article-item-text">
							<p class="short_an"><? the_excerpt(); ?></p>
						</div>
					</div>
				</a>
	<?php
			}
			echo '</div>';
		}
		wp_reset_query();
	}
	?>
	<p>Все новости из категории: <?php the_category($post_id); ?></p>
</div>
<?php
get_sidebar();
get_footer();
