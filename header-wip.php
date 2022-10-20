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
            wp_enqueue_style( 'test-page-css', get_stylesheet_directory_uri() . '/css/test-page.css' );

        }; 


switch ($args['page']) {
        
    case 'landing':
 
        break;
    default:
        break;        
}






?>




<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_simple.png" />

    <?php wp_head(); ?>
</head>

    
    
<body <?php body_class(); ?>>


    <?php wp_body_open(); ?>

    <div id="page" class="site">



        <!--Vérifie si un argument spécial est passé à header.php-->


        

<?php if ( is_admin_bar_showing() ) { ?>
<style>
    .header-imperfect {
        position: sticky;
        top: 32px;
    }

    @media screen and (max-width: 782px) {
        .header-imperfect {
            top: 46px;
            /* if it already has a top value, add 46px to it */
        }
    }

</style>
<?php } ?>


<!-- Header -->
<header id="header-imperfect" class="header-imperfect">
    <h1 style='margin :0'><a href="<?php echo get_home_url(); ?>">
            <div class="site-logo" ><?php the_custom_logo(); ?></div>
        </a></h1>
    <nav class="links">
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
    </nav>





    <nav id="site-navigation" class="primary-navigation main" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'twentytwentyone' ); ?>">




        <ul>
            <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" class="search-form" target="_top" method="get" action="<?php echo get_site_url(); ?>">
                    <input type="search" id="search-form-1" class="search-field" value="" name="s"  placeholder="Search" >
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu-imperfect">Menu</a>
            </li>
        </ul>

    </nav><!-- #site-navigation -->

</header>

<!--
FIN museolab-header.php
-->


        <?php
		// Output the menu modal.
        // get_template_part( 'template-parts/header/modal-menu' );


        
        ?>

<!--        <div id="content" class="site-content">
            <div id="primary" class="content-area"> -->
                <main id="main" class="site-main" role="main">

                    <!-- FIN header.php -->
