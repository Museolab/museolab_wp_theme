<!--DEBUT DE single header PHP-->

<!-- Load the h1 for single articles & projects & equipments -->

<div class="project-header">

    <?php
    $vignette_url = get_one_vignette_url();
    ?>
    
    <div class="background-image-project" style="background-image:url('<?php echo($vignette_url); ?>')">
        
        
        
        
    </div>

    <span class='surtitre-splash-single'>

        <?php 
        
        $splash_surtitre = '';
        $post_type = get_post_type();

        if ( $post_type == 'projets' ){
            
            $splash_surtitre = 'Projet';
            
        } else if ($post_type == 'post'){
                    
            //récupère l'objet complet pour avoir les labels
            $types_de_contenu = get_field_object('content_category');
            
//            error_log('types de contenus');
//            error_log( print_r($types_de_contenu, TRUE) );

           foreach($types_de_contenu['value'] as $type_de_contenu){
               
               // dans l'objet global, va chercher le label qui correspond à la valeure donnée
                $splash_surtitre .= $types_de_contenu['choices'][$type_de_contenu];
                $splash_surtitre .= ' - ';
            }

            $date_article = $date = get_the_date('j F Y');
            $splash_surtitre .= $date_article;
                        
        }else if ($post_type == 'equipements'){
            $splash_surtitre= 'Équipement';
        }
                    
        echo($splash_surtitre);
        ?>
        
    </span>
    
    <div class="titre-splash-article">
        <h1>
            <?php 
            echo(get_the_title());
            ?>
        </h1> 
    </div>

</div>

<!--FIN DE single header PHP-->
