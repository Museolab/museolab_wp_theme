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

        
        
        

        $myposttype = $post->post_type ;

        $slug = get_post_field( 'post_name' );


        ///ICI on fait une requete des post liés (à faire uniquement lors de l'édition?)
        
        $relatedBlogPostArgs = array(
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'related_machine',
                'field' => 'slug',
                'terms' => $slug,
                )
            )
        );
        $relatedBlogPosts = new WP_Query($relatedBlogPostArgs);
        ?>

        
            <?php
            if( $relatedBlogPosts->have_posts() ){

                echo('<h2>Ressources liées et fiches techniques</h2><br>');

                // Start looping over the query results.
                while ( $relatedBlogPosts->have_posts() ) {

                    $relatedBlogPosts->the_post();

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'reference_article' ); ?>>
                <?php get_template_part( 'template-parts/content/miniature-projet'  ); ?>


            </article>
        </div>
        <?php

        }


        } else {
            echo('Aucuns post liées <br>');
        }
        
        

       echo ('single-equipments page here');


        
		?> -->
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
        
<!--Leave a comment?
-->
        
    </footer><!-- .entry-footer -->

    <?php if ( ! is_singular( 'attachment' ) ) : ?>
    <?php get_template_part( 'template-parts/post/author-bio' ); ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->





<?php





endwhile; // End of the loop.

get_footer();

/*
<!-- FIN single-equipments.php -->
*/

