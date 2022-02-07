<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vladgzeta
 */

// if (!is_active_sidebar('sidebar-1')) {
//     return;
// }
?>
<aside class="aside_right">
    <? Weather() ?>
    <?
    if (strpos($_SERVER['REQUEST_URI'], 'archivg-page')) { ?>
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
    <? } ?>
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
            <h3><span>подписка на газету</span></h3>

        </div>
        <div class="subscrube">
            <div class="subscrube_media" style="background-image: url('<?= get_theme_mod('subscrube_img') ?>');"></div>
            <a href="#footer" class="subscrube_btn">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 444 444" style="enable-background:new 0 0 444 444;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #444444;
                        }

                        .st1 {
                            fill: #FFFFFF;
                        }

                        .st2 {
                            fill: #565656;
                        }
                    </style>
                    <path class="st0" d="M406.3,318.3H41.5v-47.8l372.8-0.5v40.7C414.3,315.3,411.3,318.3,406.3,318.3z" />
                    <path id="box" class="st0" d="M310.7,77.6l-116.9,0l0,0l-60.4,0c-57.2,0-103.7,46.5-103.7,103.7v129.5c0,4.1,3.4,7.5,7.5,7.5h140.7
	v118.1c0,4.1,3.4,7.5,7.5,7.5h36.4c4.1,0,7.5-3.4,7.5-7.5V318.3h177.5c4.1,0,7.5-3.4,7.5-7.5V181.3
	C414.3,124.2,367.8,77.6,310.7,77.6z M44.6,181.3c0-48.9,39.8-88.7,88.7-88.7h10.1c0,0,11.7,0.2,25.5,0.2s24.8-0.2,24.8-0.2H257
	c-30,18.2-50,51.1-50,88.7V270H44.6V181.3z M214.3,429h-21.4V318.3h21.4V429z M399.3,303.3H44.6V285l354.7,0V303.3z M399.3,270
	h-32.5c-4.1,0.6-8.3,0.1-12.5,0c-4.7-0.1-9.6,0.2-14.4,0H222v-41.5l0.2,0.2c-0.2-4.5-0.2-9,0-13.5c0.1-2.1,0.1-4.2,0.2-6.3
	c-0.1-0.3-0.1-0.6-0.1-0.9c0-0.2,0-0.4,0-0.5l-0.3-0.3v-25.9h0c0-8.5,1.2-16.7,3.5-24.5c0-2.4,0.9-4.8,1.8-7.1
	c1-2.5,2.1-5.1,3.7-7.4c0.2-0.7,0.6-1.3,1-1.8c14.8-28.4,44.5-47.8,78.7-47.8c48.9,0,88.7,39.8,88.7,88.7V270z" />
                    <g id="newspeper">
                        <path class="st1" d="M174.3,263.7c-4.7,0.1-15.1-4-18.7-7.3c-0.2-0.2-0.3-0.3-0.5-0.5l-3.9-3.7c-4.3-4.2-5.3-6.6-5.7-12.5
		c0-0.1-0.3-7-0.1-8.8l1.1-5.1c0.4-2.4,1.7-4.7,2.7-6.9l26.5-52.2l159.9,0.3l6.3,10.4l-26.3,64.9L303,258.4L174.3,263.7z" />
                        <polygon class="st1" points="311.9,173.9 173.1,168.8 182,151.6 322.3,151.6 	" />
                        <g>
                            <path d="M335.7,166.9c-2.9,0.2-5.6,2.1-7.2,5.4L298,232.9c-0.9,1.7-0.2,3.7,1.5,4.5c1.7,0.8,3.7,0.1,4.6-1.6l30.6-60.6
			c0.6-1.3,1.2-1.6,1.4-1.6c0.1,0,0.7,0.2,1.5,1.4c2,3.2,2.2,9.1,0.5,12.5l-29.6,58.7c-1.6,3.1-3.6,5-5.6,5.1c-2,0.1-4.2-1.5-6-4.4
			c-4.6-7.4-5.1-20.4-1.1-28.3l33.7-66.9c0.5-1,0.5-2.3-0.1-3.3c-0.6-1-1.7-1.6-2.9-1.6l-143.9,0.2c-1.3,0-2.5,0.8-3.1,1.9
			l-34.1,67.7c-4.9,9.6-4.3,24.2,1.3,33.2l0.9,1.5c5.6,9,18.3,16.1,29.1,16l112.7-0.1c1.9,0,3.4-1.5,3.5-3.4c0-1.9-1.5-3.4-3.3-3.4
			l-112.7,0.1c-8.4,0-19.1-5.9-23.4-12.9l-0.9-1.5c-4.3-7-4.8-19.2-1-26.7l33.2-65.8l136.3-0.2l-31.3,62
			c-5.1,10.1-4.5,25.4,1.3,34.8c3.2,5.1,7.5,7.8,12.1,7.6c1.9-0.1,3.6-0.7,5.3-1.7c2.4-1.5,4.6-4,6.2-7.2l29.6-58.7
			c2.8-5.5,2.5-13.9-0.7-19C341.4,168.4,338.6,166.8,335.7,166.9z" />
                            <path d="M291.4,175.9c1-0.6,1.6-1.7,1.7-2.9c0-1.9-1.5-3.4-3.3-3.4l-93.4,0.1c-1.9,0-3.4,1.5-3.5,3.4c0,1.9,1.5,3.4,3.3,3.4
			l93.4-0.1C290.2,176.4,290.8,176.2,291.4,175.9z" />
                            <path d="M284.3,190.7c1-0.6,1.6-1.7,1.7-2.9c0-1.9-1.5-3.4-3.4-3.4l-39.4,0.1c-1.9,0-3.4,1.5-3.5,3.4c0,1.9,1.5,3.4,3.4,3.4
			l39.4-0.1C283.2,191.2,283.8,191,284.3,190.7z" />
                            <path d="M236,199.4c-1.9,0-3.4,1.5-3.5,3.4s1.5,3.4,3.4,3.4l39.6-0.2c0.7,0,1.3-0.2,1.8-0.5c1-0.6,1.6-1.7,1.7-2.9
			c0-1.9-1.5-3.4-3.4-3.4L236,199.4z" />
                            <path d="M185.7,186.6l-15.1,30c-0.5,1.1-0.5,2.3,0.1,3.3c0.6,1,1.7,1.6,2.9,1.6l39.9-0.3c0.7,0,1.3-0.2,1.8-0.5
			c0.6-0.3,1-0.8,1.3-1.4l4-8.1c0.8-1.7,0.1-3.7-1.6-4.5c-1.7-0.8-3.7,0-4.6,1.6l-3,6.1l-32.3,0.2l11.7-23.2l31.9-0.1l-1.6,3.4
			c-0.8,1.7-0.1,3.7,1.6,4.5c1.7,0.8,3.7,0,4.6-1.6l4-8.2c0.5-1,0.5-2.3-0.2-3.2c-0.6-1-1.7-1.6-2.9-1.6l-39.4,0.1
			C187.5,184.7,186.2,185.5,185.7,186.6z" />
                            <path d="M271.9,217.4c0-1.9-1.5-3.4-3.4-3.4l-39.9,0.3c-1.9,0-3.4,1.5-3.5,3.4c0,1.9,1.5,3.4,3.4,3.4l39.9-0.3
			c0.7,0,1.3-0.2,1.8-0.5C271.3,219.7,271.9,218.6,271.9,217.4z" />
                            <path d="M164.8,233c0,1.9,1.5,3.4,3.4,3.4l98.5-0.7c0.7,0,1.3-0.2,1.8-0.5c1-0.6,1.6-1.7,1.7-2.9c0-1.9-1.5-3.4-3.4-3.4l-98.5,0.7
			C166.4,229.6,164.8,231.1,164.8,233z" />
                        </g>
                    </g>
                    <g id="wol">
                        <path class="st1" d="M207,270.3H44.6c0,0-0.4-72,0.6-99.3c0.1-3.3,2.1-13,2.1-13c1.6-6.6,6.9-16.1,8.2-18.5
		c7.6-14.5,19.1-26.5,33.1-34.8c3.3-2,9-5,12.7-6l12.8-4.2c0.1,0,13.7-1.8,13.8-1.8c34.7-0.1,129,0,129,0s-20.3,11.4-35,35
		c-17.1,27.5-15,53.6-15,53.6V270.3z" />
                        <ellipse transform="matrix(8.654567e-03 -1 1 8.654567e-03 -16.514 364.8561)" cx="175.8" cy="190.8" rx="25.6" ry="23" />

                        <ellipse transform="matrix(8.654567e-03 -1 1 8.654567e-03 -16.8216 365.1299)" class="st2" cx="175.7" cy="191" rx="22.2" ry="20" />
                    </g>
                    <g id="flag">
                        <path class="st0" d="M133.3,51.7h-14.9c-7.9,0-14.3-5.2-14.3-11.5s6.4-11.5,14.3-11.5h57.3c6.7,0,12.2,4.4,12.2,9.8v153.7
		c0,5.4-5.5,9.8-12.2,9.8c-6.7,0-12.2-4.4-12.2-9.8V76.1C163.6,62.6,150,51.7,133.3,51.7z" />
                    </g>
                    <path class="st0" d="M222,270.4h-15V179c0-0.8,0.1-1.6,0.2-2.4l0.6-8c0.1-0.8,1.8-10.8,2.1-11.6l9.9-25.5l13.1,7.4l-6,12
	c-0.4,1-2.6,10.9-3.3,14c-0.1,0.7-0.3,2.1-0.6,3.8c0,0.3-0.1,0.5-0.1,0.8l-0.9,12.6V270.4z" />
                </svg>
                <span>Подписаться</span></a>
        </div>
    </div>
    <!-- <div class="widget">
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
    </div> -->
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>