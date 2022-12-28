<!--
DEBUT archive.php page here
-->

<?php
/**
 * The template for displaying archive pages
 */

get_header();



?>

<!-- Display Archives Projects Page -->

<div class="bloc-recents bloc-article-recent">
    <h1 class='titre-recent'>
    <?php post_type_archive_title(); ?>
</h1>

<?php 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$wp_query = new WP_Query(array('post_type'=>'projets', 'post_status'=>'publish', 'posts_per_page'=>9, 'paged' => $paged));
?>


    
    
<?php if ( have_posts() ) : ?>



<div class="archive-container">

    <?php while ( have_posts() ) : ?>
    <?php the_post(); ?>
    <?php get_template_part( 'template-parts/content/content-thumbnails' ); ?>
    <?php endwhile; ?>
    
</div>

<?php get_template_part( 'template-parts/content/page-pagination' ); ?>

<?php else : ?>
<?php  ?>
<?php endif; ?>

<?php get_footer(); ?>

<!--
FIN archive.php page here
-->
