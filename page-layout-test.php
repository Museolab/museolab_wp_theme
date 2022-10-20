<!-- DEBUT page-layout-test.php -->

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
            wp_enqueue_style( 'layout-test-css', get_stylesheet_directory_uri() . '/css/layout-test.css' );

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
                position: sticky;
                top: 32px;
            }

            @media screen and (max-width: 782px) {
                .page-header {
                    top: 46px;
                    /* if it already has a top value, add 46px to it */
                }
            }

        </style>
        <?php } ?>


        <!-- Header -->
        <header class="page-header">

            <nav>
                <h2 class="logo" style='margin :0'><a href="<?php echo get_home_url(); ?>">
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    </a></h2>
                <ul>
                    <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
                </ul>

                <button class="cta-contact">
                    get in touch
                </button>
            </nav>





        </header>


        <!--
FIN museolab-header.php
-->




        <main id="main" class=" page-main" role="main">

            <!-- FIN header.php -->
            <div class="page-main-content">
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

                ?>

            </div>
        </main><!-- #main -->



        <footer id="colophon" class="page-footer" role="contentinfo">


            <div class="new-paysage-footer">


                <svg version="1.1" class="paysage-svg2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  style="height:50px,bottom:0" viewBox="0 0 500.6 60.6" xml:space="preserve">

                      <defs>
        <linearGradient id="MyGradient" x1="0%" y1="0%" x2="0%" y2="100%">
            <stop offset="15%"  style="stop-color:var(--main-purple-color);stop-opacity:0.6" />
            <stop offset="100%" style="stop-color:var(--main-footer-color);stop-opacity:1" />
        </linearGradient>
    </defs>
                    
                    <g>
                        <path fill="url(#MyGradient)" d="M500.6,60.6c-1,0-2-0.2-3-0.6l-60.9-23.6v-26l-25.2,0.4l-0.1,18.1c0,0-50.1-18.2-66-26.7
		c-8.8-4.7-14.1-1-24.3,3.4c-24,10.3-65.3,33.6-76.4,40.6c-2.8,1.8-7.8,4.9-11.6,5.3c0,0-28.4,0.1-39.1,1c-6.6,0.5-9.1,0.7-16.2-2.3
		c-17.6-7.5-50.2-20.2-71.6-30.7c-11.6-5.7-13.8-7.5-26.6,1C68.2,28.1,19.2,50.8,4.4,58.9c-1.3,0.7-2.8,1.8-4.4,1.8H500.6z" />
                    </g>
                </svg>

        
            </div>
            
   
            
            
            
            <small>Un site développé par nous pour nous.</small>
            
            
            <ul>
            


                    <li>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    </li>

                    <li>
                            <a href="https://louvrelensvallee.com/" target="_blank" title="Louvre Lens Vallée">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/LogoLLV.png" class="custom-logo" alt="" width="auto" height="50" style="filter: grayscale(100%);"></a>
                    </li>
                    <li> <a href="http://www.univ-artois.fr/" target="_blank" title="Université d'Artois">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Artois_Logo.png" class="custom-logo" alt="" width="auto" height="50" style="filter: grayscale(100%);"></a>

                    </li>
                         
          </ul>
            
            
        </footer><!-- #colophon -->

    </div><!-- #page -->

    <!--TotoToto-->

    <?php wp_footer(); ?>

</body>

</html>
