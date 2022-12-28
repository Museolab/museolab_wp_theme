<!--
DEBUT museolab-header.php
-->

<!-- Display the header on every page -->

        <!-- Header -->
        <header class="page-header">

            <nav>
                <h2 class="logo" style='margin :0'><a href="<?php echo get_home_url(); ?>">
                        <div class="site-logo">
                    <span class="custom-logo-link"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/museolab_logo_small.png" class="custom-logo" alt="" decoding="async" width="163" height="50"></span>
                    </div>
                    </a></h2>
<!--
                <ul>
-->
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
              <!--  </ul>-->

                <!-- <button class="user-register">
                    S'inscrire
                </button> -->
                <!-- <button class="user-login">
                    Se connecter
                </button> -->

            </nav>





        </header>


        <!--
FIN museolab-header.php
-->
