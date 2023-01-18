<!-- DEBUT image.php -->

<?php
/**
 * The template for displaying image attachments
 */

get_header();

// Start the loop.
while ( have_posts() ) {
	the_post();
	?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php 
    
    get_template_part('template-parts/content/single-header');
     

    
?>



    <div class="content-single-container">
        <figure class="wp-block-image">
            <?php

    
				echo wp_get_attachment_image( get_the_ID(), 'full' );
				?>

        </figure><!-- .wp-block-image -->

        <div> <?php 
                
                echo("Description : ");
                // Get the attachment ID
                $attachment_id = get_the_ID();

                // Get the attachment metadata
                $metadata = get_the_content( $attachment_id );
    
        error_log( print_r($metadata, TRUE) );


                // Get the attachment description
            //    $description = $metadata['image_meta']['caption'];
    

                // Print the description
                echo $metadata;


            ?> </div>
    </div><!-- .entry-content -->
    
    

    <?php
        
        get_template_part( 'template-parts/content/related-elements');         
        
        
		?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php
	// If comments are open or there is at least one comment, load up the comment template.
/*	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}*/
} // End the loop.

get_footer();

// <!-- FIN image.php -->
