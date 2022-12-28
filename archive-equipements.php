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

?>
<h1>équipements du muséolab</h1>


<!-- <button onclick="window.location.href='./?view=all'">Voir tout</button>

<button onclick="window.location.href='./'">Mis en avant</button> -->


<button onclick="window.location.href='./?view=all'">Voir tout</button>

<button onclick="window.location.href='./'">Mis en avant</button>


<?php if ( have_posts() ) : ?>


<div class="archive-container">



    <?php
    
    
     /****************************************************
   Tell Wordpress to fetch a different 
   template if our URL ends in ?view=blog
 ****************************************************/

if ( isset($_GET["view"]) ) {
    $view = $_GET["view"];
}else{
    $view = "default";
}

    
    
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    

    $argss = array(
        'post_type'=>'equipements',
        'post_status'=>'publish',
        'posts_per_page'=>9,
        'paged' => $paged,
        'tax_query' => array(
            'taxonomy' => 'visibility',
            'field'    => 'slug',
            'terms'    => 'mis-en-avant')
        );
    
    
    
//Version switch case
    //Ceci permettra bientôt de filter les différents types d'équipements selon leurs type.
    
switch ($view) {
    case "blog":
        
        //Test
        echo("new template");
        break;
        
    case "all":
    
        //Modifier ici les arguments selon ce qu'on veux
        $new_args = array(
            'post_status' => array('publish', 'private') );
    
        $argss = array_replace($argss, $new_args);
            break;
        
    default:
    
        //La query par defaut est au dessu

    }
    
    
    $query = new WP_Query( $argss );
    
    if ( $query->have_posts() ) :
    

 ?>
    <!-- pagination here -->

    <!-- the loop -->
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    
    

    <?php get_template_part( 'template-parts/content/content-thumbnails', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); 
    
    get_field('equipements')
    
    ?>




    <?php endwhile; 
    
    

    ?>
    <!-- end of the loop -->

    
    
    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>



</div>

<div class="pagination bloc-recents">
    <?php get_template_part( 'template-parts/content/page-pagination'); ?>
</div>

<?php else : ?>
<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>

<!-- FIN archive-equipments.php -->

