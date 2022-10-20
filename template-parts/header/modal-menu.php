<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<!--MODAL-MENU.PHP-->
<section id="menu-imperfect" visibility='hidden'>

    <section>
        <form class="search" method="get" action="#">
            <input type="text" name="query" placeholder="Search" />
        </form>
    </section>




    <section>

    <?php
		wp_nav_menu(
			array(
                'menu'            => 'sidemenu',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'nodal-menu-container',
				'items_wrap'      => '<ul id="nodal-menu-list" class="links">%3$s</ul>',
				'fallback_cb'     => false,

			)
		);
		?>



</section>


</section>
