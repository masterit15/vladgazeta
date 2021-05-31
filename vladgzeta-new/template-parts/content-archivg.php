<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

?>

<div class="articles-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $args=array(
        'post_type' => 'gazet',
        'posts_per_page' => 12,
        'paged' => get_query_var('paged'),
    );

    $acsessuar = get_posts($args);
    foreach ($acsessuar as $post) :
        setup_postdata($post);
        query_posts($args);
        if ( have_posts() ) : 
        ?>

        <?php echo "<div class='col-md-4'>" ?>
            <div class="pdf-item">
                <a href="<?php pdf_file_url(); ?>" target="_blank">
                 №&nbsp<?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>
                 
                 <?php the_post_thumbnail(); ?>
             </a>
         </div>  
         <?php echo "</div>" ?>
             
     <?php endif; endforeach; ?>    

     <div class="col-md-12 gazet">
        <div style="text-align:center;">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</div><!-- #post-## -->
