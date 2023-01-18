<!--DEBUT DE SINGLE-PROJETS PHP-->
<?php
/**
 * The template for displaying all single projects
 *
 */

//the website header
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
    
    get_template_part('template-parts/content/content-resume');

            



if ( have_rows( 'contents' ) ): 
	 while ( have_rows( 'contents' ) ) : the_row(); 


            ?>
    <div class="content-single-container
                <?php echo is_int($contenu_pair/2) ? 'content-single-primary' : 'content-single-secondary' ;
                ++$contenu_pair;  ?> ">
        <?php

		 if ( get_row_layout() == 'texte' ) : 
				get_template_part( 'template-parts/content-module/texte' );

		 elseif ( get_row_layout() == 'galerie' ) : 
				get_template_part( 'template-parts/content-module/galerie' );

		 elseif ( get_row_layout() == 'picture' ) : 
				get_template_part( 'template-parts/content-module/image' );
        else :
            echo("bloc non créé");


    
	 endif;
        
          echo ' </div>' ;
endwhile;
 else: 

endif; 
        
        get_template_part( 'template-parts/content/related-elements'); 
        
        
        get_template_part( 'template-parts/content/render-related-galerie'); 


?>
</article>


<?php


endwhile; // End of the loop.

get_footer();


/*
<!--FIN DE SINGLE PHP-->
*/
