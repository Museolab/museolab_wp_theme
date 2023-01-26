<!--DEBUT DE render content PHP-->


<?php 


if (!isset($args['mainBgColor'])){
    $mainBgColor = true;
}else{
    $mainBgColor = $args['mainBgColor'];
}
        



if ( have_rows( 'contents' ) ): 
	 while ( have_rows( 'contents' ) ) : the_row(); 


            ?>
    <div class="content-single-container  <?php echo ($mainBgColor) ? 'primary-bg-color' : 'secondary-bg-color' ; ?> ">
        <?php

		 if ( get_row_layout() == 'texte' ) : 
				get_template_part( 'template-parts/content-module/texte'); 

		 elseif ( get_row_layout() == 'galerie' ) : 
				get_template_part( 'template-parts/content-module/galerie'); 

		 elseif ( get_row_layout() == 'picture' ) : 
				get_template_part( 'template-parts/content-module/image'); 
        else :
            echo("bloc non créé");
	 endif;
        
        
          echo ' </div>' ;
        
        $mainBgColor = !$mainBgColor;
endwhile;
        
 else: 

endif;  ?>
