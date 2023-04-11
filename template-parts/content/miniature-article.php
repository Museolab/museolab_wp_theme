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

<!-- DISPLAY MINIATURE ARTICLE -->

<!-- DEBUT miniature-article.php -->

<article class="m-article-container">
    
    <a class="m-article" href=" <?php the_permalink() ?>">
        
        <div class="m-article-head">
            <span class="m-article-title"><?php echo wp_trim_words( get_the_title(), 4 ); ?></span>
            <span class="m-article-date"> - <?php echo get_the_date(); ?> </span>
            
        </div>
        <!-- <div class="items"> -->
        <span class="m-article-resume">  	<?php echo get_field('post_excerpt', get_the_ID()); ?>   </span>
        <!-- </div> -->

    </a>
</article>

<!-- FIN content-excerpt.php -->
