
<?php

?>

<!--DEBUUT : galleries-recents.php

Arguments pris en compte:

number : Nombre d'images à afficher
random : True / False

DISPLAY NEWEST PICTURES ON THE HOME PAGE
-->

<?php

        // Défini le nombre de vignette à afficher
        $nombreDImages = 3;
        $imagesRandom = 'date';

        if (is_numeric ($args['number'])){
            $nombreDImages = $args['number'];
        }

        if (is_string ($args['order'])){
            
            if ($args['order'] =='random' ){
            $imagesRandom = 'rand';}
            else if ($args['order'] =='date' ){
            $imagesRandom = 'date';
            }else{
            $imagesRandom = 'date';
            }

        } else {
            $imagesRandom = 'date';
        }


?>


        <!-- Display a gallery with newest images -->
    <div class="bloc-recents">
        <h2 class=titre-recent>Dernières Images</h2>
        <div class="bloc-recents gallerie">

            <?php
            
            
            $args = array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'orderby' => $imagesRandom,
                'order' => 'desc',
                'posts_per_page' => $nombreDImages,
                'post_status'    => 'inherit',
                'perm'        => 'readable',
                );
        
            $loop = new WP_Query( $args );
        
        while ( $loop->have_posts() ) : $loop->the_post();
        
        $image = wp_get_attachment_image_src( get_the_ID() ); 
        echo "<img src='" . $image[0] . "'>";
        
        endwhile;

        ?>
        </div>
    </div>

<?php