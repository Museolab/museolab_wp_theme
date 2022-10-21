<!--DEBUT DE SINGLE-PROJETS PHP-->
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();


/* Start the Loop */
while ( have_posts() ) :


	the_post();


    $contenu_pair = 0;

?>

<!-- Ligne 28 commentée pour tester le git pull -->
<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->





    <div class='article-header'>
      <span class="titre-article"> Projet : <?php the_title( '', '' ); ?> </span>

    </div>

    
    
    

    <div class="content-single-container  <?php echo is_int($contenu_pair) ? 'content-single-primary' : 'content-single-secondary' ?> ">
        <?php ++$contenu_pair ?>

        <div class="contents-bloc">
            
        <?php
    
        get_template_part( 'template-parts/content/render-contents'); 
         
        ?>

            
        </div>




    </div>




        <?php
        
        get_template_part( 'template-parts/content/related-elements'); 


		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
        
		?>




    <footer class="entry-footer default-max-width">


    </footer><!-- .entry-footer -->

    <?php if ( ! is_singular( 'attachment' ) ) : ?>
    <?php get_template_part( 'template-parts/post/author-bio' ); ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->


<?php

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
/*
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
*/


endwhile; // End of the loop.

get_footer();


/*
<!--FIN DE SINGLE PHP-->
*/
