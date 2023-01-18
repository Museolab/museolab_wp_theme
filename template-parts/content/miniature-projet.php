<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>



<!-- DEBUT content-excerpt.php -->

<!--
get_one_vignette_url()
-->

<?php 
$the_miniature_url = get_one_vignette_url();


?>



<article class="m-thumb-container" style="background: url('<?php echo($the_miniature_url); ?>'); background-size: cover;">
    <a class="overlay" href=" <?php the_permalink() ?>">

        <div class="items head">
            <p><?php the_title(); ?>
            </p>
            <hr>
        </div>
        <div class="items price">
            <!--            <p class="old">$699</p>-->


            <?php

            $excerpt = get_field( 'post_excerpt' );
            
            if (empty($excerpt)){
                $excerpt = wp_trim_excerpt(the_excerpt());
            };
            
            echo ( '<p>'.$excerpt.'</p>' );
            
            ?>

        </div>
        <div class="items cart">
            <i class="fa fa-plus-square"></i>
            <span>Voir le projet</span>
        </div>
    </a>
</article>

<!-- FIN content-excerpt.php -->
