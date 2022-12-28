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


    
<?php 
    
    $post_ID = $args[0];
    $content_post = get_post($post_ID);

    $title = $content_post->post_title;
    $post_thumbnail = get_the_post_thumbnail_url($post_ID, 'thumbnail') ;
    $permalink = get_permalink($post_ID) ;
    /*  $description = the_field( 'description' , $post_ID  ); 

  echo($post_thumbnail)  */


    
?>



<!--DEBUT : bloc-content-thumbnails.php-->






<div class="m-thumb-container" style="background: url('<?php echo($post_thumbnail) ?>'); background-size: cover;">
    <a class="overlay" href=" <?php echo($permalink) ?>">
        <div class="items"></div>
        <div class="items head">
            <p><?php  echo($title); ?></p>
            <hr>
        </div>
        <div class="items price">

            <p class="new"><?php the_field( 'description' , $post_ID  ); ?></p>
        </div>
        <div class="items cart">
            <i class="fa fa-plus-square"></i>
            <span>Voir plus</span>
        </div>
    </a>
</div>

<!--FIN : bloc-content-thumbnails.php-->

