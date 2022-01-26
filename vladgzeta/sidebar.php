<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vladgzeta
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>
<aside class="aside_right">
<?Weather()?>

<?
PR(get_current_theme());
if(strpos($_SERVER['REQUEST_URI'], 'archivg-page')){?>
    <div class="archiv-select">
        <select onchange="document.location.href=this.options[this.selectedIndex].value;">
            <option value="">Выберите год...</option>
            <?php wp_get_archives(array(
                'post_type'             => 'gazet',
                'type'                         => 'yearly',
                'format'                     => 'option',
                'before'                    => '<span class="first-span">архив газет за</span>',
                'after'                        => '<span class="last-span">год</span>',
                'show_post_count' => 0
            )); ?>
        </select>
    </div>
<?}?>
    <div class="widget">
        <?php
        $args = array(
            'post_type' => 'gazet',
            'showposts' => 1
        );

        $acsessuar = get_posts($args);
        foreach ($acsessuar as $post) :
            setup_postdata($post);
        ?>
            <div class="widget-title">
                <h3><span>Свежий выпуск</span></h3>
            </div>
            <div class="pdf-item">
                <a href="<?php pdf_file_url(); ?>" target="_blank">
                    <div class="pdf-item-title">
                        №&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>
                    </div>
                    <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>" alt="№&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>">
                </a>
            </div>
            <div class="all-news">
                <a class="btn btn-default" href="/archivg-page/" target="_blank">Архив</a>
            </div>

            <div id="flipbooks1"></div>
        <?php endforeach; ?>
    </div>
    <div class="widget">
        <div class="widget-title">
            <h3><span><?php echo get_cat_name(15) ?></span></h3>
        </div>
        <ul class="tabs">
            <?php
            if (have_posts()) : // если имеются записи в блоге.
                query_posts('cat=15', 'showposts=2');   // указываем ID рубрик, которые необходимо вывести.
                while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
            ?>

            <?php echo '<li class="active">' ?><?php the_title(); ?><?php echo '</li>' ?>

            <?php endwhile;
            endif;
            wp_reset_query();
            ?>
        </ul>
        <ul class="tab__content">
            <?php
            if (have_posts()) : // если имеются записи в блоге.
                query_posts('cat=15', 'showposts=2');   // указываем ID рубрик, которые необходимо вывести.
                while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
            ?>
                    <li class="active">
                        <div class="content__wrapper">
                            <?php the_content(); ?>
                        </div>
                    </li>
            <?php endwhile;
            endif;
            wp_reset_query();
            ?>
        </ul>
    </div>
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>