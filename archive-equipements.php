<!-- DEBUT archive-equipments.php -->

<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

//$description = get_the_archive_description();
?>
<h1>équipements du muséolab</h1>


<button onclick="window.location.href='./?view=all'">Voir tout</button>

<button onclick="window.location.href='./'">Mis en avant</button>


<?php if ( have_posts() ) : ?>


<div class="archive-container">



    <?php
    
    
     /****************************************************
   Tell Wordpress to fetch a different 
   template if our URL ends in ?view=blog
 ****************************************************/

$view = $_GET["view"]; 

if ( $view == "blog" ) {
    
    echo("totototo");
    
} else if ($view == "all"){
    
    $args = array(
        'orderby' => 'rand',
        'post_type' => 'equipements',
    
);
    
} else {
    
        
    $args = array(
    'orderby' => 'rand',
    'post_type' => 'equipements',
    'tax_query' => array(
        array(
            'taxonomy' => 'visibility',
            'field'    => 'slug',
            'terms'    => 'mis-en-avant',
        ),
    ),
);
    
}
    
    

$query = new WP_Query( $args );
    
    ?>



    <?php 
// the query
$the_query = new WP_Query( $args ); ?>

    <?php if ( $the_query->have_posts() ) : ?>

    <!-- pagination here -->

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php get_template_part( 'template-parts/content/content-thumbnails', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>




    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>



</div>


<?php else : ?>
<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>

<!-- FIN archive-equipments.php -->

