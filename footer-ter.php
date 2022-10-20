<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
<!--	</div>  #primary -->
<!-- </div> #content -->

<?php /*  get_template_part( 'template-parts/footer/footer-widgets' );   */ ?>

<footer id="colophon" class="site-footer" role="contentinfo">


    <div class="paysage-footer">


        <svg version="1.1" class="paysage-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width=33% height=auto viewBox="0 0 500.6 60.6"  xml:space="preserve">
            <style type="text/css">
                .st0 {
                    fill: #FFFFFF;
                }

            </style>
            <g>
                <path class="st0" d="M500.6,60.6c-1,0-2-0.2-3-0.6l-60.9-23.6v-26l-25.2,0.4l-0.1,18.1c0,0-50.1-18.2-66-26.7
		c-8.8-4.7-14.1-1-24.3,3.4c-24,10.3-65.3,33.6-76.4,40.6c-2.8,1.8-7.8,4.9-11.6,5.3c0,0-28.4,0.1-39.1,1c-6.6,0.5-9.1,0.7-16.2-2.3
		c-17.6-7.5-50.2-20.2-71.6-30.7c-11.6-5.7-13.8-7.5-26.6,1C68.2,28.1,19.2,50.8,4.4,58.9c-1.3,0.7-2.8,1.8-4.4,1.8H500.6z" />
            </g>
        </svg>

        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/basDePage.png" alt="un triangle aux trois côtés égaux" height="100%" width="100%" />-->
        
            <?php if ( has_nav_menu( 'footer' ) ) : ?>

  


    <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
        <ul class="footer-navigation-wrapper">
            <?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
        </ul><!-- .footer-navigation-wrapper -->
    </nav><!-- .footer-navigation -->
          </div>
    <?php endif; ?>
    <div class="site-info">
        <div class="site-name">
            <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php else : ?>
            <?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php bloginfo( 'name' ); ?>
            <?php else : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
            <?php endif; ?>
            <?php endif; ?>
        </div><!-- .site-name -->

        <div class="powered-by">
            <a href="https://louvrelensvallee.com/" target="_blank" title="Louvre Lens Vallée">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/LogoLLV.png" class="custom-logo" alt="" width="163" height="50" style="filter: grayscale(100%);"></a>

            <a href="http://www.univ-artois.fr/" target="_blank" title="Université d'Artois">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Artois_Logo.png" class="custom-logo" alt="" width="163" height="50" style="filter: grayscale(100%);"></a>
        </div><!-- .powered-by -->

    </div><!-- .site-info -->
</footer><!-- #colophon -->
<?php
get_template_part('template-parts/footer/warning-bar');
?>

</div><!-- #page -->

<!--TotoToto-->

<?php wp_footer(); ?>

</body>

</html>
