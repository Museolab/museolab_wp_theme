<!-- DEBUT related-equipments.php -->

<?php

$post   = get_post();

$myposttype = $post->post_type ;

$slug = get_post_field( 'post_name', $post );


if ($myposttype == 'equipements'){

    echo('ceci est un équipement<br>');

    echo($slug);
    echo('<br>');

        
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


    if( $relatedBlogPosts->have_posts() ){       // echo($relatedBlogPosts[0]);
        
        echo('OUIIIII - Nous avons trouvé des ressources liées <br>');
        
          // Start looping over the query results.
        while ( $relatedBlogPosts->have_posts() ) {
 
            $relatedBlogPosts->the_post();
            
            ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'left' ); ?>>
    coucou
    <?php get_template_part( 'template-parts/content/miniature-projet'  ); ?>


</article>

<?php
     
        // Contents of the queried post results go here.
 
    }
 
        
    } else {
        echo('Non :( <br>');
    }


} elseif ($myposttype == 'ressource' || $myposttype == 'projets' ||  $myposttype == 'post' ){ // Les deux mots sont collés

        echo('ceci est un --++ ');
            echo($myposttype);
    
        //Vérifie si il existe des liens machine
    $has_machine_link = get_field( 'machines_linked') ;        
    if ( $has_machine_link ){      
        
        echo('<h2>Machines liées</h2>');

        if( have_rows('les_machines') ){
            // pour chaque machine enregistrée
            while( have_rows('les_machines') ) : the_row();

                // chage l'id puis le slug de la machine
                $machine_id = get_sub_field('machine_liee');
                    
                $args = array( $machine_id );
                get_template_part( 'template-parts/blocs/bloc-content-thumbnails', 'bloc', $args  ); 
            
            endwhile;
        }
    } else {
        
        echo('Il n y a pas de machines liées <br>');
    }
}else {


};
?>
<!-- FIN related-equipments.php -->
