<?php

    $galerie_images = get_sub_field( 'galerie' ); 

    if ( $galerie_images ) :  

        ?> <div class='<?php echo the_sub_field( 'galery_style' ); ?>'> <?php

        
        foreach ( $galerie_images as $galerie_image ): ?>

            <a href="<?php echo $galerie_image['url']; ?>">
                <img src="<?php echo $galerie_image['sizes']['thumbnail']; ?>" alt="<?php echo $galerie_image['alt']; ?>" />
            </a>


<p><?php echo $galerie_image['caption']; ?></p>

<?php 
    endforeach; 
    echo('</div>');
			 endif; 
			 if ( get_sub_field( 'linked' ) == 1 ) { 
			 // echo 'true'; 
			} else { 
			 // echo 'false'; 
			}

?>