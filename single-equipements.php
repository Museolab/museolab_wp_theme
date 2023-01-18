<!-- DEBUT single-equipments.php -->

<?php

/**
 * The template for displaying all single equipment page
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header alignwide">

        <?php
        
        get_template_part('template-parts/content/single-header');
    
        get_template_part('template-parts/content/content-resume');
        
 ?>

    </header>

    <div class="entry-content">
        <?php        
        
        the_field('description'); //Renvoi le contenu du bloc description
        
        echo('<br>');
        
        $financeur = get_field('financeur');

        
        if ( $financeur == "mauve" ){
            echo('Le financeur de ce projet est MAUVE');
            
        }else if( $financeur == "non-defini" || $financeur == NULL){
            
            echo('Financeur non spécifié');
            echo('<br>');

        } else {

            echo($financeur);
            echo('<br>');
        }


        
        get_template_part( 'template-parts/content/related-elements'); 

        get_template_part( 'template-parts/content/render-related-galerie'); 

        
        

        
		?>
    </div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->





<?php





endwhile; // End of the loop.

get_footer();

/*
<!-- FIN single-equipments.php -->
*/

