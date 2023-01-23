<!-- DEBUT page-test-page.php -->

<?php

get_header('', array('page'=>'test'));


        $image_to_display;
        
            $args = array(
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'orderby' => 'rand',
                'order' => 'desc',
                'posts_per_page' => 1,
                'post_status'    => 'inherit',
                'perm'        => 'readable',
                'meta_query' => array(
                        array(
                            'key'     => 'tags_media',
                            'value'   => '"front_galery"',
                            'compare' => 'LIKE'
                        )
                    )
                );
        
        $images = new WP_Query( $args );


        if ( $images->have_posts() ) : $images->the_post();

        $image_to_display = wp_get_attachment_image_url(get_the_ID());

        endif;
           

?>

<div class="page-blocs-container">

    <div class="bloc-splash">




        <div class="background-image-landing" style="background-image: url(<?php echo( $image_to_display) ?>)">
        </div>

        <div class="bloc">
            <img class="main-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/LogoBlanc.svg" />
            Un atelier laboratoire de l'université d'Artois
        </div>

        
    </div>
    
    <div class="logo-institution">
        <a class="" href="http://www.univ-artois.fr/" target="_blank" title="Université d'Artois"><img class="small-logo artois-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/Artois_Logo.svg"></a>
        
        <a class="" href="https://louvrelensvallee.com/" target="_blank" title="Louvre Lens Vallée"><img class="small-logo" src="<?php echo( get_stylesheet_directory_uri()) ?>/images/LogoLLVCarreBleu.png"></a>
    </div>
    <div id="bottom" class="infoTxt"><a target="_blank" href="mailto:museolab@univ-artois.fr">Nous contacter</a> | Random background image : <a target="_blank" href="https://unsplash.com">Unsplash</a>



    </div>

    <div class="bloc-contenu">

        <?php

        
        get_template_part( 'template-parts/content/projets-recents', '', array('number'=>3));

        get_template_part( 'template-parts/content/articles-recents', '', array('number'=>6));
        
//args : number(int) - order ( 'date' 'random')
        get_template_part( 'template-parts/content/galleries-recents', '', array('number'=>6,'order'=>'rand'));
                 
        ?>
        
    <?php
get_footer();
?>