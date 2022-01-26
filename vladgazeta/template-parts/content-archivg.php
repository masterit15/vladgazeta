<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

?>
<div class="newspaper">
<?php
$args = array(
    'post_type' => 'gazet',
    'posts_per_page' => 12,
    'paged' => get_query_var('paged'),
);

$acsessuar = get_posts($args);
foreach ($acsessuar as $post) :
    setup_postdata($post);
    query_posts($args);
    if (have_posts()) :
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ? wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] : get_template_directory_uri().'/images/dist/newspaper.jpg';
?>
        <div class="pdf-item">
            <a href="<?php pdf_file_url(); ?>" target="_blank">
                <div class="pdf-item-title">
                    №&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>
                </div>
                <img src="<?=$img?>" alt="№&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>">
            </a>
        </div>
<?php endif;
endforeach; ?>
</div>
<div class="gazet">
    <div style="text-align:center;">
        <?php the_posts_pagination(); ?>
    </div>
</div>