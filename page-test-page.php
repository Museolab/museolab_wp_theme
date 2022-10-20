<!-- DEBUT page-test-page.php -->

<?php
/**
 * La page d'acceuil

 */

/*
       add_action( 'wp_enqueue_scripts', 'my_stylesheet_custom' );
        function my_stylesheet_custom() {
            wp_enqueue_style( 'test-page-css', get_stylesheet_directory_uri() . '/css/test-page.css' );

        }; 
*/



get_header('', array('page'=>'test'));

?>

<div class="page-blocs-container">

    <div class="bloc-splash">




        <div class="background-image-landing">
        </div>

        <div class="bloc">
            <img class="main-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/LogoBlanc.svg" />
            Un atelier laboratoire de l'université d'Artois
        </div>


        <div id="bottom" class="infoTxt"><a target="_blank" href="mailto:museolab@univ-artois.fr">Nous contacter</a> | Random background image : <a target="_blank" href="https://unsplash.com">Unsplash</a>
        </div>

        <div class="bot-container">
            <a class="" href="http://www.univ-artois.fr/" target="_blank" title="Université d'Artois"><img class="small-logo artois-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/Artois_Logo.svg"></a>

            <a class="" href="https://louvrelensvallee.com/" target="_blank" title="Louvre Lens Vallée"><img class="small-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/LogoLLVCarreBleu.png"></a>
        </div>






    </div>

    <div class="bloc-contenu">

        <?php

        
        get_template_part( 'template-parts/content/projets-recents', '', array('number'=>3));

        get_template_part( 'template-parts/content/articles-recents', '', array('number'=>6));
        
              

                                    



    
  echo(  "</div> </div>");
    
get_footer();
