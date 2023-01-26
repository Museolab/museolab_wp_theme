<!--DEBUT DE SINGLE-PROJETS PHP-->
<?php
/**
 * The template for displaying all single projects
 *
 */

//the website header
    $mainColor = false;

get_header();

/* Start the Loop */
while ( have_posts() ) :

	the_post();
    
    //permet d'alterner les styles des différents éléments
    $contenu_pair = 0;
    

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



    <?php
    

    get_template_part('template-parts/content/single-header');
    
    get_template_part('template-parts/content/content-resume', '', array('mainBgColor'=>$mainColor)); 
    
    $mainColor = !$mainColor;

            



    get_template_part( 'template-parts/content/render-contents', '', array('mainBgColor'=>$mainColor)); 
    
    $count = count(get_field('contents'));
    if (!is_int($count/2)){ $mainColor = !$mainColor; }
    
        
        
        
        get_template_part( 'template-parts/content/render-related-galerie', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;
        
        get_template_part( 'template-parts/content/related-elements', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;



?>
</article>


<?php


endwhile; // End of the loop.

get_footer();


/*
<!--FIN DE SINGLE PHP-->
*/
