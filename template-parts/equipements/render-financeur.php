<?php

if (!isset($args['mainBgColor'])){
    $mainBgColor = true;
}else{
    $mainBgColor = $args['mainBgColor'];
}
?>

<div class="content-single-container financeur-div <?php echo ($mainBgColor) ? 'primary-bg-color' : 'secondary-bg-color' ; ?> ">


<?php 
        $financeur = get_field('financeur');

        
        if ( $financeur == "mauve" ){
            echo('Le financeur de ce projet est MAUVE');
            
        }else if( $financeur == "non-defini" || $financeur == NULL){
            
            echo('Financeur non spécifié');
            echo('<br>');

        } else {

            echo($financeur);
            echo('<br>');
        }

?>
    
</div>