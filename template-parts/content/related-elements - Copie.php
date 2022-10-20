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


    if ( $machine_link or $post_link or $project_link ): ?>



    <div class="content-single-container">


        <h2> Elements Liés </h2>
    <?php
        
        
        
 /*       echo('my data display -- ');

        echo($myposttype);
        echo (' -- ');
        
        echo($post_link);
        echo (' -- ');

        echo($project_link);
        echo (' -- ');
        
        echo($machine_link);
        echo (' -- ');
        

        echo(get_the_ID());
        echo (' -- ');

        
         $has_related_elements = get_field('elements_linked', get_the_ID());
        echo (!empty($has_related_elements));
                        echo (' -- ');

        echo ($has_related_elements[0]);
                                echo (' -- ');

        
        if (!empty($has_related_elements)){
            foreach ( $has_related_elements as $toto ){
                
                echo ($toto);
                echo(' --- ');
                
            }
            
            
        };


        echo(' -- my data end');
*/

    if( $machine_link ): ?>
        
    <h3>Machines liés</h3>
        <ul>
        <?php foreach( $machine_link as $post ): 

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <br>
                <p> -- <?php echo(get_the_ID()); ?> -- </p>
<!--
                <span>A custom field from this post: <?php the_field( 'field_name' ); ?></span>
-->
            </li>
        <?php endforeach; ?>
        </ul>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; 



    if( $post_link ): ?>
    <h3>Articles liés</h3>

        <ul>
        <?php foreach( $post_link as $post ): 

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               <!-- <span>A custom field from this post: <?php the_field( 'field_name' ); ?></span>-->
            </li>
            
                <?php
            
            
            update_field('les_articles', $this_post_ID, [get_the_ID()]);
            
            
            
            ?>

        <?php endforeach; ?>
        </ul>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; 



    if( $project_link ): ?>
    <h3>Projets liés</h3>
        <ul>
        <?php foreach( $project_link as $post ): 

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<!--
                <span>A custom field from this post: <?php the_field( 'field_name' ); ?></span>
-->
            </li>
        <?php endforeach; ?>
                    </ul>


        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata();
            endif; 
        
        else:?>
        
        
<!--
        <h3> Pas d elements liés </h3>
-->
        <?php

endif; 


?>
</div>




<!-- FIN related-equipments.php -->
