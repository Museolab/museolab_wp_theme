<!-- DEBUT related-equipments-bis.php -->


<?php
    $post = get_post();

    $myposttype = $post->post_type ;

    $slug = get_post_field( 'post_name', $post );

    $this_post_ID = get_the_ID();



    //Vérifie si il existe des liens machine

    $machine_link = get_field('les_machines') ;

    $post_link = get_field('les_articles');

    $project_link = get_field('les_projets');


    if ( $machine_link or $post_link or $project_link ): 


        $machine_number=0;
        $post_number=0;
        $project_number=0;


?>

<div class="content-single-container related-elements">

    <h3> Elements Liés </h3>

    <div class="related-element-container">

        <?php


    if( $machine_link ): 

        if (!is_array($machine_link)){
            $machine_link=[$machine_link];
        }
        $machine_list ="<ul>";
        ?>

        <div class="related-element-cat">

            <?php 


            foreach( $machine_link as $post ): 

                $machine_number = $machine_number+1;

                

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);  
            
            $permalink = get_permalink();
            $title = get_the_title();
            
            $machine_list = $machine_list.'<li><a href="'.$permalink.'">'.$title.'</a></li>'            ?>


            <?php endforeach;
            ?>

            <h4>Machines liés (<?php echo $machine_number;?>)</h4>
            <?php
            
            echo $machine_list.'</ul>';
          
            ?>


            <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>

        </div>
        <?php endif; 



    if( $post_link ): 

        if (!is_array($post_link)){
            $post_link=[$post_link];
        };
        
        if( $machine_number>0 ):
                echo("<div class='related-element-cat left-border'>");
        else :
                echo("<div class='related-element-cat'>");
            
        endif;
     

            $post_list ="<ul>";


            foreach( $post_link as $post ): 
        
        
            $post_number = $post_number+1;

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post);

            $permalink = get_permalink();
            $title = get_the_title();

            $post_list = $post_list.'<li><a href="'.$permalink.'">'.$title.'</a></li>'            ?>


        <?php endforeach; ?>

        <h4>Posts liés (<?php echo $post_number;?>)</h4>
        <?php
            
            echo $post_list.'</ul>';
          
            ?>


    </div>
    <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); 
    
    endif; 



    if( $project_link ):

        if (!is_array($project_link)){
            $project_link=[$project_link];
        };
        if( $machine_number+$post_number>0 ):
        echo("<div class='related-element-cat left-border'>");
            else :
            echo("<div class='related-element-cat'>");

                endif;


                $project_list ="<ul>";


                    foreach( $project_link as $post ):

                        //Garde un compte des projets
                        $project_number = $project_number+1;

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post);


                        $permalink = get_permalink();
                        $title = get_the_title();

                        //Fait des "li" pour chaque projets et les ajoutes à la suite.
                        $project_list = $project_list.'<li><a href="'.$permalink.'">'.$title.'</a></li>';
        
                    endforeach;
        
                        $titre = ($project_number>1)?"Projets liés":"Projet lié";
                    
        
                    echo "<h4>".$titre." (".$project_number.")</h4>";
        
                echo $project_list.'</ul>';
            
                ?>







</div>
<?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata();
            endif; 
        
        else:

endif; 


?>

</div>
</div>




<!-- FIN related-equipments.php -->
