<?php
/**
 * Block template file: 
 *
 * Machine Widget Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'machine-widget-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-machine-widget';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
    <?php echo '#'. $id;

    ?> {
        /* Add styles that use ACF values here */
    }

</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <h3> <?php the_field( 'titre' ); ?> </h3>
    <p> <?php if ( have_rows( 'machines_equipements_liees' ) ) : ?> </p>
    <?php while ( have_rows( 'machines_equipements_liees' ) ) : the_row(); ?>

    <?php 
    
     

    $title = $content_post->post_title;
    
    wp_set_post_terms(  $post_id, $tags = $title, $taxonomy = 'post_tag', $append = true ); ?>


    <?php $machine_postid = get_sub_field( 'machines' );  
    
        $args = array( $machine_postid );
        get_template_part( 'template-parts/blocs/bloc-content-thumbnails', 'bloc', $args  ); 
    
    
        $title = get_post($machine_postid)->post_title;
        wp_set_post_terms(  $post_id, $tags = $title, $taxonomy = 'post_tag', $append = true ); ?>
    




    <?php endwhile; ?>
    <?php else : ?>
    <?php // no rows found ?>
    <?php endif; ?>
</div>
