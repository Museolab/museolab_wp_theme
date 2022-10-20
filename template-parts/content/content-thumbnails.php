<?php
/**
 * Template part for displaying post thumbnails and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>


<!--DEBUUT : content-thumbnails.php-->


<article class="m-thumb-container" style="background: url('<?php the_post_thumbnail_url() ?>'); background-size: cover;">
    <a class="overlay" href=" <?php the_permalink() ?>">
        <br>
        <div class="items head">
            <p><?php the_title(); ?></p>
            <hr>
        </div>
        <div class="items price">

           <?php echo get_field('post_excerpt', get_the_ID()); ?>  
            
            
        </div>
        <div class="items plus-square">
            <i class="far fa-plus-square"></i>
            <span>Voir plus</span>
        </div>
    </a>
</article>

<!--FIN : content-thumbnails.php-->
