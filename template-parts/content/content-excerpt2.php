
<!--DEBUT DE content excerpt PHP-->

<!-- When the content number is pair the color will change -->


<div class="projet-desctiption content-single-container 
                <?php 
                $contenu_pair = 0;
                echo is_int($contenu_pair/2) ? 'content-single-primary' : 'content-single-secondary' ;
                ++$contenu_pair;  ?> ">
    <h3 class="emphase"> <?php the_field('post_excerpt'); ?> </h3>
</div>

<!--FIN DE content excerpt PHP-->
