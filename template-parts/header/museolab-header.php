<!--
DEBUT museolab-header.php
-->



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
                    Call to Action button
                </button>
            </nav>





        </header>


        <!--
FIN museolab-header.php
-->
