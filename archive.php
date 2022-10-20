<!--
DEBUT archive.php page here
-->

<?php
/**
 * The template for displaying archive pages
 */

get_header();



?>



<div class="bloc-recents bloc-article-recent">
    <span class='titre-recent'>
    <?php post_type_archive_title(); ?>
    </span>




    
    
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
