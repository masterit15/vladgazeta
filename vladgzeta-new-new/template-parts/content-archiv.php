<?php

/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

?>
<div class="pdf-item">
    <a href="<?php pdf_file_url(); ?>" target="_blank">
        <div class="pdf-item-title">
            №&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>
        </div>
        <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>" alt="№&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>">
    </a>
</div>