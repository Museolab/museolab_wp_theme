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




<article class="container" style="background: url('<?php the_post_thumbnail_url() ?>'); background-size: cover;">
    <a class="overlay" href=" <?php the_permalink() ?>" >
        <div class="items"></div>
        <div class="items head">
            <p><?php the_title(); ?></p>
            <hr>
        </div>
        <div class="items price">
<!--            <p class="old">$699</p>-->
            <p class="new"><?php the_field( 'description' ); ?></p>
        </div>
        <div class="items cart">
            <i class="fa fa-plus-square"></i>
            <span>Voir plus</span>
        </div>
    </a>
</article>



