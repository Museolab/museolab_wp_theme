<!--DEBUT DE single header PHP-->

<!-- Load the h1 for single articles & projects & equipments -->

<div class="project-header">



    <div class="titre-splash-article">

        <h1>
            <?php 
            
            $titre ='';
            $post_type = get_post_type();

    
    
    if ( $post_type == 'projets' ){
                    $titre = '[Projet] ';
    } else if ($post_type == 'post'){
                    $titre = '[Article] ';
    }else if ($post_type == 'equipements'){
                    $titre= '[Equipement] ';
    }
            $titre .= get_the_title();
            echo($titre); ?>
        </h1>
    </div>


    <div class="background-image-project" style="background-image:url('<?php echo(the_post_thumbnail_url()); ?>')">



    </div>

</div>

<!--FIN DE single header PHP-->
