<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dfsdfdf
 */

get_header(); ?>

<div class="col-md-9">
	<div class="articles-container wite-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="inner-article-wrapper">
			<?php
			while ( have_posts() ) : the_post();
			?>
			<header class="entry-header">
				<div class="rubrika"><?php 
					$cat = get_the_category();
					echo $cat[0]->name;
					?></div>
					<?php
					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) : ?>

					<div class="entry-meta">
						<div class="inner-date"><?php the_time('j m Y  H:i') ?></div>
					</div>
					<?php setPostViews(get_the_ID()); ?>
					<?php
					endif; ?>
					<div class="thumbnail-image"><?php the_post_thumbnail(); ?></div>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'vladgzeta' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vladgzeta' ),
						'after'  => '</div>',
						) );
						?>
						<!-- <p class="autor"><?//php the_author(); ?></p> -->
					</div><!-- .entry-content -->
					<div class="row"><?php show_thumbnails_list(); ?></div>
					<hr>
					<div class="b-share-small-wrap">
						<a onclick="Share.vkontakte('<?php the_permalink(); ?>','<?php the_title(); ?>','http://vladgazeta.gq/wp-content/uploads/2017/03/logo.png','')"><i class="fa fa-vk"></i></a>
						<a onclick="Share.facebook('<?php the_permalink(); ?>','<?php the_title(); ?>','http://vladgazeta.gq/wp-content/uploads/2017/03/logo.png','')"><i class="fa fa-facebook"></i></a>
						<a onclick="Share.odnoklassniki('<?php the_permalink(); ?>','')"><i class="fa fa-odnoklassniki"></i></a>
						<a onclick="Share.twitter('<?php the_permalink(); ?>','<?php the_title(); ?>')"><i class="fa fa-twitter"></i></a>
					</div>
					<?php the_post_navigation( array(
						'screen_reader_text' 	=> ' ',
						'next_text' 					=> '<div class="text-next"><span class="post-title">%title</span>' . '<i class="fa fa-chevron-right"></i></div>',
						'prev_text' 					=> '<div class="text-prev"><i class="fa fa-chevron-left"></i>' . '<span class="post-title">%title</span></div>',
						) ); ?>
					<?php endwhile; ?>
				</div>
			</div>
			<?php
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
				$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>6,
					'orderby'=>rand,
					'caller_get_posts'=>1);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) {
					echo '<h3>Похожие записи:</h3>';
					echo '<div class="articles-container1">';
					while ($my_query->have_posts()) {
						$my_query->the_post();
						?>
						<div class="col-md-4 article-item">
							<div class="row">
								<div class="short_photo">
									<div class="wrap">
										<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
										<a href="<?php the_permalink(); ?>"><div class='news-img' style='background-image: url(<?php echo $image_url[0]; ?>)'></div><div class="arrow"></div></a>
									</div>
								</div>
								<div class="rubrika-article"><?php $cat = get_the_category(); echo $cat[0]->name; ?></div>
							</div>
							<div class="article-text">
								<span class="article-date"><?php the_time('j.m.Y в H:i') ?></span>
								<a href="<?php the_permalink(); ?>"><h4 class="news-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4></a>
								<p class="short_an"><? the_excerpt(); ?></p>
							</div>
						</div>
						<?php
					}
					echo '</div>';
				}
				wp_reset_query();
			}
			?>
			<div class="col-sm-12"><p>Все новости из категории:<?php the_category($post_id ); ?></p></div>
		</div>
		<?php
		get_sidebar();
		get_footer();
