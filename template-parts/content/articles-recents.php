<!--DEBUUT : last-project.php

Arguments pris en compte:

number : Nombre de projets à afficher

DISPLAY NEWEST ARTICLES ON THE HOME PAGE
-->




<?php
    // Défini le nombre de vignette à afficher
        $nombreDArticles = 6;
        if (is_numeric ($args['number'])){
            
            $nombreDArticles = $args['number'];

        }else{

        }

        ///ICI on fait une requete des derniers articles (avec un filtre pour enlever ceux sans images)
        
        $last_articles = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => strval($nombreDArticles),
        'order' => 'DESC',

        );
        $last_articles = new WP_Query($last_articles);


        if( $last_articles->have_posts() ){
            
            
            ?>


<div class="bloc-recents bloc-article-recent">
    <h2 class='titre-recent'>
        Articles récents
        </h2>

    <div class="conteneur-recent">

        <div class="contenu-recent">
            <?php
              // Start looping over the query results.
            while ( $last_articles->have_posts() ) {

                $last_articles->the_post();

               get_template_part( 'template-parts/content/miniature-article'  );


        }
            
            
            ?>

        </div>
        <button class="contenu-button" onclick="window.location.href ='<?php echo get_post_type_archive_link( 'post' ); ?>'"> <i class="fa fa-plus plus-content-icon"></i>
        </button>

        
        
  




    </div>


</div>



<?php
            


        } else {
            echo('Aucun article à afficher <br>');
            
            

        }
        
        wp_reset_postdata()

?>





<!--FIN : last-project.php-->
