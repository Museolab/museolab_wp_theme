
<!--DEBUT DE content excerpt PHP-->



<div class="projet-desctiption content-single-container 
                <?php echo is_int($contenu_pair/2) ? 'content-single-primary' : 'content-single-secondary' ;
                ++$contenu_pair;  ?> ">
      <h3> <?php the_field('post_excerpt'); ?> </h3>
  </div>

<!--FIN DE content excerpt PHP-->
