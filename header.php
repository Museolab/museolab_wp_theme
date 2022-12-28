<!-- DEBUT header.php -->
<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */


//// Plusieurs version de header selon le contexte
//// default : (pas d'arguments)
////
//// landing : Pour la landing page / index
////
//// Selon le contexte, ajout de css ou de scripts sur la page
//// et chargements d'éléments de templates différents





add_action( 'wp_enqueue_scripts', 'my_stylesheet_custom' );
        function my_stylesheet_custom() {
            wp_enqueue_style( 'test-page-css', get_stylesheet_directory_uri() . '/css/home-page.css' );

        }; 


?>




<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_simple.png" />

    <?php wp_head(); ?>
</head>



<body id="website-body" <?php body_class(); ?>>


    <?php wp_body_open(); ?>

    <div id="page" class="site wrapper">

        <!--
Si la barre d'admin est visible, on décale tout vers le bas
-->

        <?php if ( is_admin_bar_showing() ) { ?>
        <style>
            .page-header {
                /* position: sticky;
                top: 32px; */
            }

            @media screen and (max-width: 782px) {
                .page-header {
                    /* top: 46px;
                    if it already has a top value, add 46px to it */
                }
            }
        </style>
        <?php } ?>



        <!--Vérifie si un argument spécial est passé à header.php-->
        
<?php 
        
//check if argument exist
if (isset($args['page'])){
    
    //check if it's correct // plusieurs header selon le contexte ? // Faire un switch case ?
    
        if ($args['page'] == 'landing'){
            
            //PAS UTILISé ???
            
            get_template_part( 'template-parts/header/museolab-landing-header' ); 

        } else {

            get_template_part( 'template-parts/header/museolab-header' );
        };
    
    } else {
        get_template_part( 'template-parts/header/museolab-header' );
    };
        
        


		// Output the menu modal.
        // get_template_part( 'template-parts/header/modal-menu' );


        
        ?>
        
     <main id="main" class=" page-main" role="main">


            <!-- FIN header.php -->