<?php

$image = get_sub_field('picture');

$style = get_sub_field('picture_style');  // image_medium // image_miniature // image_banner 

$options = get_sub_field('options');



if( $image ):

    // Image variables.
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    $caption = $image['caption'];

?>

<div class="content-single-image <?php echo($style)?>">

    
    
    <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
        <img src="<?php echo  esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" />
    </a>
    
</div>

<?php endif; ?>



    <?php 
                //vérifier les options présentes

			 if ( in_array( 'linked' ,$options ) ) { 
                 //ajouter l'image à la galerie
			} else { 
                 //ne rien faire
             }

?>
