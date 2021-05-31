<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vladgzeta
 */

?>

        <?php echo "<div class='col-md-4'>" ?>
            <div class="pdf-item">
                <a href="<?php pdf_file_url(); ?>" target="_blank">
                 <?php the_title(); ?>&nbspот&nbsp<?php the_time('j. m. Y') ?>
                 
                 <?php the_post_thumbnail(); ?>
             </a>
         </div>  
         <?php echo "</div>" ?> 
