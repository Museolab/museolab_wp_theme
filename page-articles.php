<!--
DEBUT page-articles.php page here
-->

<?php
/**
 * The template for displaying archive pages
 */


get_header();


?>



<div class="bloc-recents bloc-article-recent">
    <span class='titre-recent'>
        Articles
    </span>
    <?php
    
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
$wp_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>12,'paged' => $paged));



if ( have_posts() ) :



?>




    <div class="archive-container">
        <?php
    while ( have_posts() ) : 
        the_post();
        get_template_part( 'template-parts/content/miniature-article'  );
     endwhile; ?>

    </div>

    <?php 
    get_template_part( 'template-parts/content/page-pagination');   

    else : 
        get_template_part( 'template-parts/content/content-none' ); 
    endif; ?>

</div>


<?php get_footer(); ?>

<!--
FIN archive.php page here
-->
