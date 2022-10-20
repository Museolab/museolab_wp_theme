<?php


function related_elements($post_id){
        
    //Vérifie si des éléments sont liés (une des trois cases cochées)
    $related_elements = get_field('elements_linked', $post_id);
    
    //récupère la taxonomie du post en cours, et enregistre l'endroit où il devrait être référencé
    $post_type = get_post_type($post_id);

    $base_post_field;

    switch($post_type){
        case 'projets':
            $base_post_field = 'les_projets';
            break;
        case 'post':
            $base_post_field = 'les_articles';
            break;
        case 'equipements':
            $base_post_field= 'les_machines';
            break;
    }


  if ($related_elements){
      
      
      if (in_array('machines_linked',$related_elements)){
            $machine_related = get_field('les_machines', $post_id);
            foreach( $machine_related as $machines ): 
                add_to_related($machines, $post_id, $base_post_field);
            endforeach;                    
      }else{
                      update_field('les_machines', array());
      }
      
      if (in_array('projets_linked',$related_elements)){
            $project_related = get_field('les_projets', $post_id);
            foreach( $project_related as $project ): 
                add_to_related($project, $post_id, $base_post_field);
            endforeach;
      }else{
                      update_field('les_projets', array());
      }
      
      if (in_array('articles_linked',$related_elements)){
          $project_related = get_field('les_articles', $post_id);
          foreach( $project_related as $project ): 
            add_to_related($project, $post_id, $base_post_field);
          endforeach;
      }else{
                      update_field('les_articles', array());
      }
      
      
/*          
        foreach ($related_elements as $element_type ){
            
            switch ($element_type) {
                    
                    
                case "machines_linked":
                    $machine_related = get_field('les_machines', $post_id);
                    foreach( $machine_related as $machines ): 
                        add_to_related($machines, $post_id, $base_post_field);
                    endforeach;                    
                    break;
                    
                case "projets_linked":
                    
                    $project_related = get_field('les_projets', $post_id);
                    foreach( $project_related as $project ): 
                        add_to_related($project, $post_id, $base_post_field);
                    endforeach;
                    break;
                    
                case "articles_linked":
                    
                    $post_related = get_field('les_articles', $post_id);
                    
                    foreach( $post_related as $article_target ): 
                        add_to_related($article_target, $post_id, $base_post_field);
                    endforeach;
                    break;
            }   
        }*/
      
    } else {
            //si rien n'est coché, on nettoie les tableaux
            update_field('les_articles', array());
            update_field('les_projets', array());
            update_field('les_machines', array());
    }
    
/*
    //on vérifie avec les tableaux de comparaisons si des éléments ont étés enlevés des liens pour les mettres à jour    
        $previous_machine_related = get_field('les_machines_copie', $post_id);
        $machine_related = get_field('les_machines', $post_id);
    //Si pas tableau / valeur null, remplace par un tableau vide
        $machine_related = !(is_array($machine_related)) ? array() : $machine_related;
        $previous_machine_related = !(is_array($previous_machine_related)) ? array() : $previous_machine_related;
    //On enlevèle les éléments actuels aux éléments précédents
    //si il y a un reste, c'est que des éléments onté étés enlevés
        $to_update_machines = array_diff($previous_machine_related,$machine_related);
            

        foreach( $to_update_machines as $machine ): 
                $to_update_array = get_field('les_machines', $machine);   
                $new_array = array_diff($to_update_array,[$post_id]); 
                update_field('les_machines',$new_array,$machine);
        endforeach;
    
    */
    
    /////////////////////////
    

        
 //   check_removed_related('les_machines', $post_id);
    
 //   check_removed_related('les_projets', $post_id);
    
    check_removed_related('les_articles', $post_id);

    
    ////////////////////////////////
    /*
        $project_related = get_field('les_projets', $post_id);
        $previous_project_related = get_field('les_projets_copie', $post_id);
    //Si pas tableau / valeur null, remplace par un tableau vide
        $project_related = !(is_array($project_related)) ? array() : $project_related;
        $previous_project_related = !(is_array($previous_project_related)) ? array() : $previous_project_related;
    //On enlevèle les éléments actuels aux éléments précédents
    //si il y a un reste, c'est que des éléments onté étés enlevés
        $to_update_project = array_diff($previous_project_related,$project_related);
    
        foreach( $to_update_project as $projets ): 
                $to_update_array = get_field('les_projets', $projets);   
                $new_array = array_diff($to_update_array,[$post_id]); 
                update_field('les_projets',$new_array,$projets);
        endforeach;    
    
    
    */
    
        //on met à jour les tableau de comparaison à la fin avec les nouvelles valeures    
        update_field('les_articles_copie', get_field('les_articles'));
        update_field('les_projets_copie', get_field('les_projets'));
        update_field('les_machines_copie', get_field('les_machines'));
        

}




function check_removed_related($base_field, $post_id){
        
        $base_field_copie = "$base_field"."_copie";
        $related_elements = get_field('elements_linked');
        
        $target_array_linked;
    
        switch ($base_field){
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
        $previous_post_related = get_field($base_field_copie, $post_id);
    
        update_field('test02',$previous_post_related, $post_id );

        //Si il y a bien des éléments passés
        if (is_array($previous_post_related)){

            ///Si la case est décochée
            if ( !in_array($target_array_linked, $related_elements ) ){

                    update_field('boolea',"$base_field on vire tout !", $post_id );

                    //on enlève la référence à tous les éléments passés
                    foreach( $previous_post_related as $to_remove_post ): 
                
                            $to_update_array = get_field($base_field, $to_remove_post); 
                
                                    //update_field('test02',$to_update_array, [$post_id] );

                
                            $new_array = array_diff($to_update_array,[$post_id]); 
                            update_field($base_field, $new_array, $to_remove_post);
                            update_field($base_field_copie, $new_array, $to_remove_post);


                            ///Si le tableau qu'on injecte est vide, on enlève la case cochée correspondante
                            if (empty($new_array)){
                                $linked_target = get_field('elements_linked', $to_remove_post);
                                $new_linked = array_diff($to_update_array,[$target_array_linked]); 
                                update_field('elements_linked', $new_linked, $to_remove_post);
                            }
                    endforeach;
            }else{
                $to_update_posts = array_diff($previous_post_related,[$post_related]);
                
                update_field('boolea',"$base_field on vire une selection", $post_id );
                //update_field('test02',$to_update_posts, [$post_id] );
                

                foreach( $to_update_posts as $target_post ): 
                            $to_update_array = get_field($base_field, $target_post);   
                            $new_array = array_diff($to_update_array,[$post_id]); 
                            update_field($base_field, $new_array, $target_post);

                            ///Si le tableau qu'on injecte est vide, on enlève la case cochée correspondante
                            if (empty($new_array)){
                                $linked_target = get_field('elements_linked', $target_post);
                                $new_linked = array_diff($to_update_array,[$target_array_linked]); 
                                update_field('elements_linked', $new_linked, $target_post);
                            }

                    endforeach; 

            }
        }else{
            update_field('boolea',"$base_field on vire rien", $post_id );
            
        }
    
        
    
    
    
}



function add_to_related($target_id, $post_to_add, $base_post_field){

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
