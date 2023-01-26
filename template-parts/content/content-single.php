<!--
DEBUT content-single.php page here
DISPLAY ARTICLE CONTENT
-->
<?php 
    $mainColor = false;
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php 
    
    get_template_part('template-parts/content/single-header');
     

    get_template_part('template-parts/content/content-resume', '', array('mainBgColor'=>$mainColor)); 
    
    $mainColor = !$mainColor;

        get_template_part( 'template-parts/content/render-contents'); 
    
    //Si le nombre de contenu est impair on change la couleur
        $count = count(get_field('contents'));
            if (!is_int($count/2)){ $mainColor = !$mainColor; }

      
        get_template_part( 'template-parts/content/render-related-galerie', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;
        
        get_template_part( 'template-parts/content/related-elements', '', array('mainBgColor'=>$mainColor)); 
        
        $mainColor = !$mainColor;

        
        
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