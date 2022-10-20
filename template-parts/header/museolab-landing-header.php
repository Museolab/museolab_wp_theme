<!--
DEBUT museolab-header.php
---
Ajoute un style si la barre d'admin est affichée 
-->



<?php
add_action( 'wp_enqueue_scripts', 'my_stylesheet' );
function my_stylesheet() {
    wp_enqueue_style( 'admin-bar-offset', get_stylesheet_directory_uri() . '/css/admin-bar-offset.css', false, '1.0', 'all' );
}


?>


<!-- Header -->
<header id="landing-header" class="landing-header">
    <h1><a href="index.html">
            <div class="site-logo"><?php the_custom_logo(); ?></div>
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
