<!-- DEBUT single-equipments.php -->

<?php

    $mainColor = false;

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
    
    get_template_part('template-parts/content/content-resume', '', array('mainBgColor'=>$mainColor)); 
    
    $mainColor = !$mainColor;
        
 ?>

    </header>

    <div class="entry-content">
        <?php        
        
      //  the_field('description'); //Renvoi le contenu du bloc description
        
        
        
        get_template_part( 'template-parts/equipements/render-financeur', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;
        
        
        
       


        get_template_part( 'template-parts/content/render-related-galerie', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;
        
        get_template_part( 'template-parts/content/related-elements', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;

        
        

        
		?>
    </div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->





<?php





endwhile; // End of the loop.

get_footer();

/*
<!-- FIN single-equipments.php -->
*/

