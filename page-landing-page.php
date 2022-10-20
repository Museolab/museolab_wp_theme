<!-- DEBUT page-landing-page.php -->

<?php
/**
 * La page d'acceuil

 */

       add_action( 'wp_enqueue_scripts', 'my_stylesheet_custom' );
        function my_stylesheet_custom() {
            wp_enqueue_style( 'admin-bar-offset', get_stylesheet_directory_uri() . '/css/admin-bar-offset.css' );
            wp_enqueue_style( 'landing-page-template', get_stylesheet_directory_uri() . '/css/museolab-landing.css' );    
        }; 



get_header('', array('page'=>'landing'));

?>



<div id="splash-container">
    <div class="background-image-landing">
    </div>
    <div id="intro" class="infoTxt">Le museolab est un projet de l'<a target="_blank" href="https://www.univ-artois.fr">Université d'Artois</a> en partenariat avec <a target="_blank" href="https://louvrelensvallee.com/">Louvre Lens Vallée</a></div>

    <div class="bloc">
        <img class="main-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>
/images/LogoBlanc.svg" />
        Site en cours de construction
    </div>


    <div id="bottom" class="infoTxt"><a target="_blank" href="mailto:museolab@univ-artois.fr">Nous contacter</a> | Random background image : <a target="_blank" href="https://unsplash.com">Unsplash</a>
    </div>

    <div class="bot-container">
        <a class="" href="http://www.univ-artois.fr/" target="_blank" title="Université d'Artois"><img class="small-logo artois-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/Artois_Logo.svg"></a>

        <a class="" href="https://louvrelensvallee.com/" target="_blank" title="Louvre Lens Vallée"><img class="small-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/LogoLLVCarreBleu.png"></a>
    </div>
</div>

<!--TOTO-->
<?php


/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );



	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
