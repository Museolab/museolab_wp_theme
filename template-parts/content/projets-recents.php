<!--DEBUUT : projets-recents.php

Arguments pris en compte:

number : Nombre de projets à afficher

DISPLAY NEWEST PROJECTS ON THE HOME PAGE
-->




<?php
        // Défini le nombre de vignette à afficher
        $nombreDeProjets = 3;
        if (is_numeric ($args['number'])){
            
            $nombreDeProjets = $args['number'];

        }else{

        }

        ///ICI on fait une requete des derniers projets (avec un filtre pour enlever ceux sans images)
        
        $last_projects = array(
        'post_status' => 'publish',
        'post_type' => 'projets',
        'posts_per_page' => strval($nombreDeProjets),
        'order' => 'DESC',
        'meta_query' => array(array('key' => '_thumbnail_id')),

        );
        $last_projects = new WP_Query($last_projects);


        if( $last_projects->have_posts() ){
            
            
            ?>


<div class="bloc-recents">
    <h2 class='titre-recent'>
        Projets récents
        </h2>
    
    <div class="conteneur-recent">

        <div class="contenu-recent">
    <?php
              // Start looping over the query results.
            while ( $last_projects->have_posts() ) {

                $last_projects->the_post();

               get_template_part( 'template-parts/content/content-excerpt'  );


        }
            
            
            ?>
     
        </div>
        <button class="contenu-button" onclick="window.location.href =' <?php echo get_post_type_archive_link( 'projets' ); ?>'"> <i class="fa fa-plus plus-content-icon"></i>
        </button>


    </div>
</div>

<?php
            


        } else {
            echo('Aucun projet à afficher <br>');
        }
        
        wp_reset_postdata()

?>





<!--FIN : last-project.php-->
