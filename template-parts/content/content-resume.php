
<!--DEBUT DE content excerpt PHP-->

<!-- When the content number is pair the color will change -->


<?php if (!isset($args['mainBgColor'])){
    $mainBgColor = true;
}else{
    $mainBgColor = $args['mainBgColor'];
}
?>

<div class="projet-desctiption content-single-container 
<?php echo ($mainBgColor) ? 'primary-bg-color' : 'secondary-bg-color' ; ?>
            ">
    <h3 class="emphase"> <?php the_field('post_excerpt'); ?> </h3>
</div>

<!--FIN DE content excerpt PHP-->
