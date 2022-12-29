<?php


/**
** THEME MUSEOLAB

NECESSITE LE PLUGIN : ACF PRO


Un thème permettant de faire fonctionner le site du museolab de façon optimale
Ce thème devrait permettre de gérer les différents projets et équipements de façon fluide





1 ===== THEME BASE
Tous les éléments nécéssaire au bon fonctionnement du thème
- Liens des CSS
- Activation de fonctionnalités
- Liens des js


2 ====== POST TYPE
Enregistre les post types uniques du thème
- equipements - projets - ressource - achats

3 ====== TAXONOMIES
Enregistres les différentes taxonomies
- machinetype - factures - emplacement - marque -
- visibility - ressource_type - related_machine


4 ====== WIDGETS





**/



function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}






//111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
//=======================================================================================
//============================= 1 - THEME BASE===========================================
//=======================================================================================




/// Enregistre les feuilles de style globale
function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'museolab-style', get_stylesheet_directory_uri() . '/css/project-min.css' );

    wp_enqueue_style( 'museolab-footer', get_stylesheet_directory_uri() . '/css/footer.css' );

    wp_enqueue_style( 'museolab-header', get_stylesheet_directory_uri() . '/css/header.css' );

    wp_enqueue_style( 'museolab-single', get_stylesheet_directory_uri() . '/css/content-single.css' );
    
    wp_enqueue_style( 'fontawesome-brands', get_stylesheet_directory_uri() . '/css/brands.css');

}




/// Active les fonctions du thème
function theme_support_features() {

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
    

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';


		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

    
	}

/// Enregistre des scripts en bas de page
function load_js() {
    wp_enqueue_script ( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js' );
    wp_enqueue_script ( 'bowser', get_stylesheet_directory_uri() . '/js/browser.min.js' );
    wp_enqueue_script ( 'breakpoints', get_stylesheet_directory_uri() . '/js/breakpoints.min.js' );
    wp_enqueue_script ( 'custom-script', get_stylesheet_directory_uri() . '/js/custom-script.js' );
    wp_enqueue_script ( 'util', get_stylesheet_directory_uri() . '/js/util.js' );
    
    wp_enqueue_script ( 'main-js', get_stylesheet_directory_uri() . '/js/main.js' );
}


 add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

 add_action('init', 'theme_support_features');

add_action( 'wp_footer', 'load_js');

//Enlève le nr de version du code pour limiter certaines attaques
remove_action("wp_head", "wp_generator");



// Ajoute un css spécial pour le côté admin
function admin_css() {
	$admin_handle = 'admin_css';
	$admin_stylesheet = get_template_directory_uri() . '/css/admin.css';

	wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);







add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
function custom_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false; 
    return $redirect_url; 
}



//222222222222222222222222222222222222222222222222222222222222222222222222222222222222222
//=======================================================================================
//============================= 2 - POST TYPE ===========================================
//=======================================================================================

///Un post type correspond à un type de post/page
///Pages pour les machines et équipements
//https://developer.wordpress.org/reference/functions/register_post_type/

function museolab_register_machine_posts() {
    $labels = array(
        'add_new' => __( 'Créer un équipement', 'textdomain' ),
        'add_new_item' => __( 'Ajouter un équipement', 'textdomain' ),
        'new_item' => __( 'Nouvel équipement', 'textdomain' ),
    );
    
    register_post_type('equipements', [
        'label' => 'Machines et équipements',
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-hammer',
        'supports' => ['title', 'thumbnail'],
        'taxonomies' => ['post_tag'],
        'add_new_item' => __( 'Ajouter un équipement', 'textdomain' ),
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'museolab_register_machine_posts');

///Pages de projet
function museolab_register_projets_posts() {
    
    $labels = array(
        'add_new' => __( 'Créer un projet', 'textdomain' ),
        'add_new_item' => __( 'Ajouter un projet', 'textdomain' ),
        'new_item' => __( 'Nouveau projet', 'textdomain' ),
        );

    register_post_type('projets', [
        'label' => 'Projets',
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-vault',
        'supports' => ['title', 'thumbnail','author'],
        'taxonomies' => ['post_tag'],
        'hierarchical' => true,
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'museolab_register_projets_posts');


///Enlever des éléments au post_tpe "post"
///qui correspond aux articles de base
///https://developer.wordpress.org/reference/functions/remove_post_type_support/

add_action('init', 'museolab_remove_post_support');

function museolab_remove_post_support(){
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'post', 'excerpt' );
    remove_post_type_support( 'post', 'trackbacks' );
    remove_post_type_support( 'post', 'post-formats');
    remove_post_type_support( 'post', 'slug');
    
    
 //   equipements
    
    
    

    
}


//444444444444444444444444444444444444444444444444444444444444444444444444444444444444444
//=======================================================================================
//============================= 3 - TAXONOMIES ==========================================
//=======================================================================================



// Creating the widget 
class wpb_widget extends WP_Widget {
  
    function __construct() {
    parent::__construct(
      
    // Base ID of your widget
    'wpb_widget', 
      
    // Widget name will appear in UI
    __('WPBeginner Widget', 'wpb_widget_domain'), 
      
    // Widget description
    array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
    );
    }
      
    // Creating widget front-end
      
    public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
      
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
      
    // This is where you run the code and display the output
    echo __( 'Hello, World!', 'wpb_widget_domain' );
    echo $args['after_widget'];
    }
              
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'New title', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
     
    // Class wpb_widget ends here
    } 
     
     
    // Register and load the widget
    function wpb_load_widget() {
        register_widget( 'wpb_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );






//Ajouter extention de fichier
//MIME courants : https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
// autorise les mimes contenu dans la fonction mon_nouveau_mime()
add_filter('upload_mimes', 'mon_nouveau_mime');

// $existing_mimes récupère la liste des mimes existant
function mon_nouveau_mime ( $existing_mimes = array() ) {
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}




// On met dans un fichier diffent
///////// LES RELATION ENTRE ARTICLES !!!!! ///////

include 'relations.php';




add_action('save_post', 'edit_tags');

 // Vérifie les machines liées au moment de la sauvegarde et adapte les tags

function edit_tags($post_id){
    
    
    /// Les TAGS pour : La visibilité du post, le type de contenu, le type d'équipement, et bien d'autres !
    
    
    //Enlève les liens machines existant
    //wp_set_post_terms(  $post_id, $tags = '', $taxonomy = 'related_machine', $append = false );
    
    //$old_tag = get_the_tags($post_id);
    
    
    
    
    //Crée une chaine de caractère vierge pour les tags
    $new_tags = '';
    
   
    //Récupère le champ "visibilite" et l'ajoute à la chaine
    $the_visibility = get_field( 'visibilite' , $post_id) ;
    $new_tags .=  strval($the_visibility);
    
    
    //Récupère le champ "type_equipement" et les ajoute à la chaine
    $equipement_types = get_field('type_equipement', $post_id);
    
    if( $equipement_types ){
        foreach( $equipement_types as $equipement_type ){
            $new_tags .= ', ';
            $new_tags .= strval($equipement_type);
        }
    }
    
    //Récupère le champ "content_category" et les ajoute à la chaine
    $post_categorys = get_field('content_category', $post_id);
    
    if( $post_categorys ){
        foreach( $post_categorys as $post_category ){
            $new_tags .= ', ';
            $new_tags .= strval($post_category);
        }
    }
    
    
    //Récupère le champ "custom_tags" et les ajoute à la chaine
    $custom_tags = get_field('custom_tags', $post_id);
    
    if( $custom_tags ){
        foreach( $custom_tags as $custom_tag ){
            $new_tags .= ', ';
            $new_tags .= strval($custom_tag);
        }
    }
    
    
    // $value = $the_visibility['value'];
    
    
    // Applique les nouveaux tags 
    wp_set_post_tags($post_id, $tags=$new_tags);
    
    
    
    //Vérifie si il existe des liens machine
 /*   $has_machine_link = get_field( 'machines_linked' , $post_id) ;
    if ( $has_machine_link ) {       
        
        if( have_rows('les_machines') ){
            // pour chaque machine enregistrée
            while( have_rows('les_machines') ) : the_row();
            
            
            
                // chage l'id puis le slug de la machine
                $machine_id = get_sub_field('machine_liee');
                $machine_slug = basename(get_permalink($machine_id));
            
                    // on récupère la liste d'articles liés à la machine
                $all_related_article = get_field('articles_lies', $machine_id);
                    // Si rien de lié, on crée un tableau vide
                if ( $all_related_article == NULL){$all_related_article = array(); }

                
                // on vérifie que notre article n'est pas déjà lié à la machine
                if (in_array($post_id , $all_related_article) ){
                    // si c'est le cas on ne fait rien               
                    
                }else{
                    
                    // On ajoute notre reference a la liste d'articles liés existants
                    array_push($all_related_article, $post_id);
                    
                    // On met à jour la fiche machine
                    update_field('articles_lies', $all_related_article, $machine_id);
                }
            
                    
                // Ajoute le tag correspondant à la machine à notre article
                wp_set_post_terms(  $post_id, $tags = $machine_slug , $taxonomy = 'related_machine', $append = true );

            endwhile;
        }
    };
    
    
    */
    
    
}




add_action('save_post', 'related_elements');


//Va chercher un block spécifique et ajoute ou enlève un tag à la publication si il est présent ou pas 

add_action('save_post', 'check_blocks');

function check_blocks($post_id){
    $has_links_block =  has_block('acf/related-links');
        
    if ($has_links_block){
        wp_set_post_terms(  $post_id, $tags = 'have-related-links', $taxonomy = 'post_tag', $append = true );
    } else {
        wp_remove_object_terms ( $post_id, $tags = 'have-related-links', $taxonomy = 'post_tag', $append = true );
    }
    
    
        if (has_block('core/embed') || has_block('core-embed/youtube')){
        wp_set_post_terms(  $post_id, $tags = 'have-youtube-embed', $taxonomy = 'post_tag', $append = true );
    }
};







#Ajoute une page d'options à l'interface back pour gérer mes liens
add_action('acf/init', 'my_acf_op_init');

function my_acf_op_init() {
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title' 	=> 'Ressources communes',
            'menu_title'	=> 'Ressources communes',
            'menu_slug' 	=> 'ressources-communes',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Banque de liens',
            'menu_title'	=> 'Banque de liens',
            'parent_slug'	=> 'ressources-communes',
            'icon_url'      => 'admin-links',
        ));
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Glossaire',
            'menu_title'	=> 'Glossaire',
            'parent_slug'	=> 'ressources-communes',
            'icon_url'      => 'format-quote',
        ));
    }
}

