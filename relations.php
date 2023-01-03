<?php







function related_elements($post_id){
        
    //Vérifie si des éléments sont liés (une des trois cases cochées)
    $related_elements = get_field('elements_linked', $post_id);
    
    //récupère la taxonomie du post en cours, et enregistre l'endroit où il devrait être référencé
    $post_type = get_post_type($post_id);

    //Initiatlise une variable vide pour après
    $base_post_field ='';
    
    
    if ( $post_type == 'projets' ){
                    $base_post_field = 'les_projets';
    } else if ($post_type == 'post'){
                    $base_post_field = 'les_articles';
    }else if ($post_type == 'equipements'){
                    $base_post_field= 'les_machines';
    }
    
    
    
    //Si un case est cochée
    if ($related_elements){
            

        $images_related = array();
        
        // Check si des images sont associées.
        if( have_rows('images_associes') ){
        
            // Loop through rows.
            while( have_rows('images_associes') ) : the_row();
        
                
                $media_tags = get_sub_field('media_tags');
        
                // Load sub field value.
                $image_array = get_sub_field('galerie_image');
                // Do something...
        
                if($media_tags && (in_array('media_no_link',$media_tags) or in_array('media_none',$media_tags)      ) ) {
                    
                        error_log('not to be associated');

                    } else{
                    
                    error_log('associons nous :) ');
                    
                    $image_array = get_sub_field('galerie_image');
                    
                    array_push($images_related, $image_array);
                        

                }
                    

                
                



            // End loop.
            endwhile;

        } else {
            
        }
        

        
      
      //Si la case machine, on récupère la valeure => si plusieurs valeures : tableau, sinon on crée le tableau
      if (in_array('machines_linked',$related_elements)){
            $machine_related = get_field('les_machines', $post_id);
          
            if (!is_array($machine_related)){
                $machine_related = array($machine_related) ;
            }
          
          //Pour chaque id du tableau on va aller ajouter notre valeure à la sienne
            foreach( $machine_related as $machines ): 
          
                add_to_related($machines, $post_id, $base_post_field, $images_related);
          
            endforeach;       
          
      }else{
          update_field('les_machines', array());
      }
      
      
      
      
      if (in_array('projets_linked',$related_elements)){
            $project_related = get_field('les_projets', $post_id);
            
            if (!is_array($project_related)){
                $project_related = array($project_related) ;
            }
          
            foreach( $project_related as $project ): 
                add_to_related($project, $post_id, $base_post_field, $images_related);
            endforeach;
      }else{
          update_field('les_projets', array());
      }
      
      
      
      
      
      if (in_array('articles_linked',$related_elements)){
          $post_related = get_field('les_articles', $post_id);
       
            if (!is_array($post_related)){
                $post_related = array($post_related) ;
            }
          
          foreach( $post_related as $my_post ): 
            add_to_related($my_post, $post_id, $base_post_field, $images_related);
          endforeach;
      }else{
          update_field('les_articles', array());
      }
      
      
      
    } else {
            //si rien n'est coché, on nettoie les tableaux
            update_field('les_articles', array());
            update_field('les_projets', array());
            update_field('les_machines', array());
    }
    
        
    check_removed_related('les_machines', $post_id, $base_post_field);
    
    check_removed_related('les_projets', $post_id, $base_post_field);
    
    check_removed_related('les_articles', $post_id, $base_post_field);

    
    
    //on met à jour les tableau de comparaison à la fin avec les nouvelles valeures    
    update_field('les_articles_copie', get_field('les_articles'));
    update_field('les_projets_copie', get_field('les_projets'));
    update_field('les_machines_copie', get_field('les_machines'));
        

}




function check_removed_related($base_field, $post_id, $base_post_field){
    
        //            error_log('J edite : '.$base_post_field);

    
    
        
        $base_field_copie = "$base_field"."_copie";
        $related_elements = get_field('elements_linked');
        
        $target_array_linked;
    
        switch ($base_post_field){
            case 'les_articles':
                $target_array_linked = 'articles_linked';
            break;
            case 'les_machines':
                $target_array_linked = 'machines_linked';
                break;
            case 'les_projets': 
                $target_array_linked = 'projets_linked';
                break;
        };
    
    

        $post_related = get_field($base_field, $post_id);
    
        if (!empty($post_related)){
            if (!is_array($post_related)){
                $post_related = array($post_related) ;
            }
        } else { $post_related=array(); }
    
    
        
        $previous_post_related = get_field($base_field_copie, $post_id);

        //Si il y a bien des éléments passés
        if (!empty($previous_post_related)){
                            
            if (!is_array($previous_post_related)){
                $previous_post_related = array($previous_post_related) ;
            }

                
/*                
                error_log('previous_post_related');
                error_log( print_r($previous_post_related, TRUE) );
                
                error_log('post_related');
                error_log( print_r($post_related, TRUE) );
                
         */
                
                // On compare nos posts précédents et nos posts actuels
                $to_update_posts = array_diff($previous_post_related,$post_related);
                
       //         error_log('$to_update_posts');
        //        error_log( print_r($to_update_posts, TRUE) );
                

                //pour chaque post qui a disparu
                foreach( $to_update_posts as $target_post ): 
                
                            $to_update_array = get_field($base_post_field, $target_post);
                            if (!is_array($to_update_array)){
                                $to_update_array = array($to_update_array) ;
                            }
                
                
                            $new_array = array_diff($to_update_array,array($post_id)); 
                            update_field($base_post_field, $new_array, $target_post);

                            ///Si le tableau qu'on injecte est vide, on enlève la case cochée correspondante
                            if (empty($new_array)){
                                $linked_target = get_field('elements_linked', $target_post);
                                
                                $new_linked = array_diff($to_update_array,[$target_array_linked]); 
                                
                                update_field('elements_linked', $new_linked, $target_post);
                            }

                    endforeach; 

   /*         }*/
        }else{
            
            //update_field('boolea',"$base_field on vire rien", $post_id );
            
        }
    
        
    
    
    
}



function add_to_related($target_id, $post_to_add, $base_post_field, $images_related){
    
    //error_log('add to related');


    //On crée un tableau avec la valeur à ajouter
    $to_push_array= [$post_to_add];

    //récupère/copie les contenus liés du projet cible    
    $previous_array = get_field($base_post_field, $target_id);
        
    //Si le tableau existe bien, on le fusionne avec le notre, autrement on ne fait rien
    if (is_array($previous_array)){
            $to_push_array = array_merge($to_push_array,$previous_array);
    }
    
    //on supprime d'éventuels doublons
    $to_push_array = array_unique($to_push_array , SORT_NUMERIC );
    
    //met à jour le projet cible avec le tableau édité
    update_field($base_post_field, $to_push_array, $target_id);
    
    
    
    if (!empty($images_related)){
    

        $images_related_target = get_field('images_associes', $target_id);

        
        $images_related_target_ids = array();
        
        if( $images_related_target ) {
            foreach( $images_related_target as $image_related_target ) {
                array_push($images_related_target_ids, $image_related_target['galerie_image']);
            }
        } else {
            $images_related_target = array();
        }
        
        foreach($images_related as $image_related){
            
            if (in_array($image_related , $images_related_target_ids )){
                
                
                
            } else{
                
                $my_image_to_push= array('galerie_image'=>$image_related,'media_tags' => array()) ;
                
                array_push( $images_related_target , $my_image_to_push );
                
            }
            
        }
        
        /*
        error_log('toto l 317');
        error_log( print_r($images_related_target, TRUE) );
        */
        
        //met à jour le champs des images
        update_field('images_associes',$images_related_target, $target_id);

    }
    
    
    //on s'occupe des cases cochées
    //Recupère les cases cochées et vérifie que la donnée existe bien
    $checked_box = get_field('elements_linked', $target_id);
    $checked_box = (is_array($checked_box))?$checked_box:array();
    
    //Selon le type d'élément qu'on ajoute vérifie la donnée et l'ajoute si absente
    switch ($base_post_field){
        case 'les_projets':
            if (!in_array('projets_linked',$checked_box)){
                array_push($checked_box,'projets_linked');
                update_field('elements_linked', $checked_box, $target_id);
            }
            break;

        case'les_machines':
            if (!in_array('machines_linked',$checked_box)){
                array_push($checked_box,'machines_linked');
                update_field('elements_linked', $checked_box, $target_id);
            }
            break;
            
        case 'les_articles':
            if (!in_array('articles_linked',$checked_box)){
                array_push($checked_box,'articles_linked');
                update_field('elements_linked', $checked_box, $target_id);
            }  
            break;
    }
    
    //debug
    //update_field('boolea',$to_push_array, $post_id );


    
}


function post_media_my_theme ( $attachment_id ){
    
                 //   error_log($attachment_id);

    debug_to_console($attachment_id);
}