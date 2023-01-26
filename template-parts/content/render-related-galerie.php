<!--DEBUT DE render-related-galerie PHP-->


<?php 


if (!isset($args['mainBgColor'])){
    $mainBgColor = true;
}else{
    $mainBgColor = $args['mainBgColor'];
}
            

if ( have_rows( 'images_associes' ) ):


?>



<div class="content-single-container related-images <?php echo ($mainBgColor) ? 'primary-bg-color' : 'secondary-bg-color' ; ?>  ">
        
        
    <h3> Images Associées </h3>
    
    

    <div class="related-element-container  gallerie">
        

        <?php
        
	while ( have_rows( 'images_associes' ) ) : the_row(); 

        $image_Id = get_sub_field('media_image_ID');
        
        $image_to_display = wp_get_attachment_image($image_Id,'thumbnail');

        $image_url = get_permalink($image_Id);
        
        
        ?>
        
        
            <a href='<?php echo($image_url) ?>'>        
                
                <?php


   
                
    echo($image_to_display);
               
    echo('</a>');

    endwhile;

               echo('</div></div>');

else: 

endif;

