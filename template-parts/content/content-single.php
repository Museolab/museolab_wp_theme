<!--
DEBUT content-single.php page here
DISPLAY ARTICLE CONTENT
-->


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php 
    
    get_template_part('template-parts/content/single-header');
     

    get_template_part('template-parts/content/content-excerpt2');
    
?>



    <div class="content-single-container">


        <div class="contents-bloc">
            <?php
        
        get_template_part( 'template-parts/content/render-contents'); 
        ?>

        </div>



    </div>

<!-- 
================= AFICHER LE CONTENU CLASSIQUE ( PLUS UTILISEE) ===================
<div class="content-single-container content-old">
                ancien contenu à dupliquer sur la nouvelle forme
                <?php /*the_content();*/ ?>
    </div>
-->

    

    <?php
        
        get_template_part( 'template-parts/content/related-elements');         
        
        
		?>
    
    
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer default-max-width">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>


    <footer class="entry-footer default-max-width">


    </footer><!-- .entry-footer -->

    <?php if ( ! is_singular( 'attachment' ) ) : ?>
    <?php get_template_part( 'template-parts/post/author-bio' ); ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->


<!--
FIN content-single.php page here
-->