<?php
/**
 * Template part for displaying post thumbnails and search results
 */


?>


<!--DEBUUT : content-thumbnails.php-->

                    

<article class="m-thumb-container" style="background: url('<?php echo(get_one_vignette_url(get_the_ID(),'large')); ?>'); background-size: cover;">
    <a class="overlay" href=" <?php the_permalink() ?>">
        <br>
        <div class="items head">
                        <p><?php echo get_the_title(); ?></p>

<!--
            <p><?php /*echo wp_trim_words( get_the_title(), 5 );*/ ?></p>
-->
            
            
            <hr>
        </div>
        <div class="items price">

           <?php echo get_field('post_excerpt', get_the_ID()); ?>  
            
            
        </div>
        <!--<div class="items cart">
            <i class="far fa-plus-square"></i>
            <span>Voir le projet</span>
        </div>-->
    </a>
</article>

<!--FIN : content-thumbnails.php-->
