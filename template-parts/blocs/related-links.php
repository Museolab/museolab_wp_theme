<!-- DEBUT related-links.php -- -->
<?php
/**
 * Template part pour les listes de liens
 *
 *
 * Structure ACF :
 * Titre (nom_du_bloc)
 * Texte introductif ( introduction_des_liens)
 *    Répéteur
        - URL (liens)  - titre (url_title) - Texte (Descriptif)
 */




/**
* Ajouter le tag 'links' à l'article
* A CORRIGER : Créer une action qui se fait uniquement lors de la publication ou l'édition du post

wp_set_post_terms(  $post_id, $tags = 'Liens', $taxonomy = 'post_tag', $append = true );
*/





    

// Create id attribute allowing for custom "anchor" value.
$id = 'related-links-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-related-links';
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
    <h3><?php the_field( 'nom_du_bloc' ); ?></h3>
    <p><?php the_field( 'introduction_des_liens' ); ?></p>
    <br>
    <?php if ( have_rows( 'liens' ) ) : ?>
    <ul>
        <?php while ( have_rows( 'liens' ) ) : the_row(); ?>
        <li>
            <?php
            $url = get_sub_field( 'lien' );
            $displayed_text = get_sub_field( 'url_title' );
            $descriptif_url = get_sub_field( 'descriptif' ); 
            
           
            //Si on a pas mis de texte à afficher, on affiche l'url
            if (empty($displayed_text)){
                $displayed_text = $url;
            }
            
            //Si un descriptif est présent, on ajoute des points devant avant de l'insérer
            if (!empty($descriptif_url)){
                $descriptif_url = " : ".$descriptif_url;
            }
            
            //on formate en html nos variables
            $url_html = '<a href="'.$url.'">'.$displayed_text.'</a>';
            
            //on formate en html notre paragraphe
            $toprint_html = '<span>'.$url_html.$descriptif_url.'</span>';
            
            //on injecte le html
            echo ($toprint_html);
            
            ?>
            
            
            <?php $image_apercu = get_sub_field( 'image_apercu' ); 
			if ( $image_apercu ) { ?>
				<img src="<?php echo $image_apercu['url']; ?>" width="300" alt="<?php echo $image_apercu['alt']; ?>" />
			<?php } ?>
            <br>
            
        </li>

        <?php endwhile; ?>
    </ul>
    <?php else : ?>
    <?php // no rows found ?>
    <?php endif; ?>
</div>
<!-- FIN related-links.php -- -->