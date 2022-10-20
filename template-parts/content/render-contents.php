<!--DEBUT DE render content PHP-->


<?php 

if ( have_rows( 'contents' ) ): 
	 while ( have_rows( 'contents' ) ) : the_row(); 




		 if ( get_row_layout() == 'texte' ) : 
				get_template_part( 'template-parts/content-module/texte' );

		 elseif ( get_row_layout() == 'galerie' ) : 
				get_template_part( 'template-parts/content-module/galerie' );

		 elseif ( get_row_layout() == 'picture' ) : 
				get_template_part( 'template-parts/content-module/image' );

	 endif;
endwhile;
 else: 

endif; ?>
