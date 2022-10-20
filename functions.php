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
    wp_enqueue_style( 'imperfect-style', get_stylesheet_directory_uri() . '/css/imperfect.css' );
    wp_enqueue_style( 'museolab-style', get_stylesheet_directory_uri() . '/museolab.css' );
    wp_enqueue_style( 'museolab-imperfect', get_stylesheet_directory_uri() . '/css/museolab-imperfect.css' );
    wp_enqueue_style( 'museolab-layout', get_stylesheet_directory_uri() . '/css/layout-test.css' );

    wp_enqueue_style( 'museolab-footer', get_stylesheet_directory_uri() . '/css/footer.css' );

    wp_enqueue_style( 'museolab-header', get_stylesheet_directory_uri() . '/css/header.css' );

    wp_enqueue_style( 'museolab-single', get_stylesheet_directory_uri() . '/css/content-single.css' );

    wp_enqueue_style( 'museolab-global', get_stylesheet_directory_uri() . '/css/global-content.css' );

    
   // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
    
    //wp_enqueue_style( 'front-cover-style', get_template_directory_uri() . '/css/font-cover.css' );

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
        'supports' => ['title', 'thumbnail','author','page-attributes'],
        'taxonomies' => ['post_tag'],
        'hierarchical' => true,
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'museolab_register_projets_posts');

///Pages de ressources
function museolab_register_ressource_posts() {
    
    $labels = array(
        'name'                  => _x( 'Ressource', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Ressource', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Ressources', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Ressource', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Créer une ressource', 'textdomain' ),
        'add_new_item'          => __( 'Ajouter une Ressource', 'textdomain' ),
        'new_item'              => __( 'Nouvelle ressource', 'textdomain' ),
        'edit_item'             => __( 'Editer ressource', 'textdomain' ),
        'view_item'             => __( 'Voir ressource', 'textdomain' ),
        'all_items'             => __( 'Toutes les ressources', 'textdomain' ),
        'search_items'          => __( 'Rechercher une ressource', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent ressource:', 'textdomain' ),
        'not_found'             => __( 'Aucune ressource trouvée.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No ressource found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Ressource Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Ressource archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into ressource', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this ressource', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter ressource list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Ressources list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Ressource list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
    
    
    
    register_post_type('ressource', [
        'label' => 'ressource',
        'labels' => $labels,
        'public' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => ['thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'museolab_register_ressource_posts');

//Factures, Visible uniquement par les administrateurs
function museolab_register_achats_post() {
    
    $labels = array(
        'add_new' => __( 'Enregistrer un achat/facture', 'textdomain' ),
        'add_new_item' => __( 'Ajouter un achat/facture', 'textdomain' ),
        'new_item' => __( 'Nouvel achat/facture', 'textdomain' ),
    );

    register_post_type('achat', [
        'label' => 'Achats et factures',
        'labels' => $labels,
        'public' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-vault',
        'supports' => ['title', 'editor',],
        'taxonomies' => ['post_tag'],
        'show_ui' => true,
        'show_in_rest' => false,
        'show_in_menu' => true,
        'show_in_nav_menus' =>false,
        'has_archive' => true,
        'publicly_queryable' => false,
        'capabilities' => array(
            'edit_post'          => 'update_core',
            'read_post'          => 'update_core',
            'delete_post'        => 'update_core',
            'edit_posts'         => 'update_core',
            'edit_others_posts'  => 'update_core',
            'delete_posts'       => 'update_core',
            'publish_posts'      => 'update_core',
            'read_private_posts' => 'update_core'
        ),
    ]);
    
}
add_action('init', 'museolab_register_achats_post');



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

    
}



//333333333333333333333333333333333333333333333333333333333333333333333333333333333333333
//=======================================================================================
//============================= 3 - TAXONOMIES ==========================================
//=======================================================================================


///Une taxonomie est l'équivalent d'une catégorie
///Penser à associer la catégorie aux types de pages correspondantes

///Les types de machines avec une hierarchie [CNC => Imprimante 3D => FDM]

function museolab_register_machine_taxo() {
    register_taxonomy('machinetype',['post','equipements','projets','ressource'], [
        'labels' => [
            'name' => 'Type de machines',
            'singular_name'     => 'Type de machine',
            'plural_name'       => 'Machines',
            'search_items'      => 'Rechercher un équipement',
            'all_items'         => 'Touts les équipements',
            'edit_item'         => 'Editer la machine',
            'update_item'       => 'Mettre à jour la machine',
            'add_new_item'      => 'Ajouter un nouvel équipement',
            'new_item_name'     => 'Nouvelle machine',
            'menu_name'         => 'Type d\'équipement',
        ],
        'show_in_rest' => false,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'museolab_register_machine_taxo');

function museolab_register_facture_taxo() {
    register_taxonomy('factures',['equipements','projets'], [
        'labels' => [
            'name' => 'Factures',
            'singular_name'     => 'Facture associée',
            'plural_name'       => 'Factures associées',
            'search_items'      => 'Rechercher un facture',
            'all_items'         => 'Touts les facture',
            'edit_item'         => 'Editer la facture',
            'update_item'       => 'Mettre à jour la facture',
            'add_new_item'      => 'Ajouter un nouvel facture',
            'new_item_name'     => 'Nouvelle facture',
            'menu_name'         => 'Factures',
        ],
        'show_in_rest' => false,
        'hierarchical' => false,
        'public' => false, // Set it to false, which will remove View link from backend and redirect user to homepage on clicking taxonomy link.
        'show_admin_column' => true,
        // Nécéssite https://wordpress.org/plugins/lh-user-taxonomies/
        'capabilities'  => array(
            'manage_terms'              =>'update_core',
            'read_terms'                =>'update_core',
            'edit_terms'                =>'update_core',
            'delete_terms'              =>'update_core',
            'assign_terms'              =>'update_core',
        ),
        
        
        
        
    ]);
}
add_action('init', 'museolab_register_facture_taxo');


function museolab_register_localisation_taxo() {
    register_taxonomy('emplacement',['equipements'], [
        'labels' => [
            'name' => 'Emplacement',
            'search_items'      => 'Rechercher un emplacement',
            'all_items'         => 'Tous les emplacement',
            'edit_item'         => 'Editer le lieu',
            'update_item'       => 'Mettre à jour l\'emplacement',
            'add_new_item'      => 'Ajouter un nouvel emplacement',
            'new_item_name'     => 'Nouvel emplacement',
            'menu_name'         => 'Emplacement',
        ],
        'show_in_rest' => false,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'museolab_register_localisation_taxo');


function museolab_register_marque_taxo() {
    register_taxonomy('marque',['equipements'], [
        'labels' => [
            'name' => 'Marque',
            'search_items'      => 'Rechercher une marque',
            'all_items'         => 'Tous les marques',
            'edit_item'         => 'Editer les marques',
            'update_item'       => 'Mettre à jour la marque',
            'add_new_item'      => 'Ajouter une nouvelle marque',
            'new_item_name'     => 'Nouvelle marque',
            'menu_name'         => 'Marques / Fabricants',
        ],
        'show_in_rest' => false,
        'hierarchical' => false,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'museolab_register_marque_taxo');


function museolab_register_visibility_taxo() {
    register_taxonomy('visibility',['equipements', 'projets', 'post', 'ressource'], [
        'labels' => [
            'name' => 'Visibilitée',
            'search_items'      => 'Visibilitée',
            'all_items'         => 'Tous les Elements',
            'edit_item'         => 'Editer les Visibilitée',
            'update_item'       => 'Mettre à jour',
            'add_new_item'      => 'Ajouter une Visibilitée',
            'new_item_name'     => 'Nouvelle Visibilitée',
            'menu_name'         => 'Visibilitée',
        ],
        'show_in_rest' => false,
        'hierarchical' => true,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'museolab_register_visibility_taxo');


function museolab_register_ressource_taxo() {
    register_taxonomy('ressource_type',['ressource'], [
        'labels' => [
            'name' => 'Type de ressource',
            'search_items'      => 'Rechercher',
            'all_items'         => 'Voir tout',
            'edit_item'         => 'Editer',
            'update_item'       => 'Mettre à jour',
            'add_new_item'      => 'Ajouter un type de ressource',
            'new_item_name'     => 'Nouvelle ressource',
            'menu_name'         => 'Type de ressource',
        ],
        'show_in_rest' => false,
        'hierarchical' => false,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'museolab_register_ressource_taxo');


function museolab_register_related_machine_taxo() {
    register_taxonomy('related_machine',['projets', 'post', 'ressource', 'equipements' ], [
        'labels' => [
            'name' => 'Machines asociée',
            'search_items'      => 'Rechercher',
            'all_items'         => 'Voir tout',
            'edit_item'         => 'Editer',
            'update_item'       => 'Mettre à jour',
            'add_new_item'      => 'Ajouter ',
            'new_item_name'     => 'Nouveau',
            'menu_name'         => 'Machines asociées',
        ],
        'show_in_rest' => false,
        'hierarchical' => false,
        'show_admin_column' => true,
    ]);
}
add_action('init', 'museolab_register_related_machine_taxo');

//444444444444444444444444444444444444444444444444444444444444444444444444444444444444444
//=======================================================================================
//============================= 3 - TAXONOMIES ==========================================
//=======================================================================================






/////WIDGET   https://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/



//   https://capitainewp.io/formations/wordpress-creer-blocs-gutenberg/desactiver-blocs-gutenberg/

function my_theme_deny_list_blocks() {
    wp_enqueue_script(
        'deny-list-blocks',
        get_template_directory_uri() . '/js/deny-list-blocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
    );
}
add_action( 'enqueue_block_editor_assets', 'my_theme_deny_list_blocks' );




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









//Pour ajourer un bloc dans les widgets
add_filter('block_categories', function ($categories){
    $categories[]=[
        'slug' => 'theme',
        'title' => 'Theme',
        'icon' => null
    ];
    return $categories;
});

//Ajouter des blocks custom
function register_acf_block_types() {

        acf_register_block_type([
            'name' => 'machine_widget',
            'title'=> 'Fiche Machine',
            'icon' => 'welcome-widgets-menus',
            'render_template' => 'template-parts/blocs/related-machine.php',
            'category' => 'theme'
        ]);
        acf_register_block_type([
            'name' => 'machine_parameters',
            'title'=> 'parametres Machine',
            'icon' => 'welcome-widgets-menus',
            'render_callback' =>function(){
                echo 'bonjour tout le monde';
            },
            'category' => 'theme'
        ]);
    
        acf_register_block_type([
        'name' => 'related-links',
        'title'=> 'Liens associés',
        'icon' => 'admin-links',
        'render_template' => 'template-parts/blocs/related-links.php',
        'category' => 'theme',
        'keywords' => array('liens', 'lien', 'link', 'url'),
        'mode' => 'edit'
        ]);
    
            acf_register_block_type([
        'name' => 'pour-contre',
        'title'=> 'Pour ou contre',
        'icon' => 'editor-quote',
        'render_template' => 'template-parts/blocs/pour-ou-contre.php',
        'category' => 'theme'
        ]);
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
  }


/*
function acf_load_color_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();
    
    
    // get the textarea value from options page without any formatting
    $choices = get_field('my_select_values', 'option', false);

    
    // explode the value so that each line is a new array piece
    $choices = explode("\n", $choices);

    
    // remove any unwanted white space
    $choices = array_map('trim', $choices);

    
    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            
            $field['choices'][ $choice ] = $choice;
            
        }
        
    }
    

    // return the field
    return $field;
    
}

add_filter('acf/load_field/name=color', 'acf_load_color_field_choices');
*/







/*


function xx__update_custom_roles() {
    if ( get_option( 'custom_roles_version' ) == 1 ) {
        remove_role('custom_role');
        update_option( 'custom_roles_version', 0 );
    }
}
add_action( 'init', 'xx__update_custom_roles' );



*/


//Ajouter extention de fichier
//MIME courants : https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
// autorise les mimes contenu dans la fonction mon_nouveau_mime()
add_filter('upload_mimes', 'mon_nouveau_mime');

// $existing_mimes récupère la liste des mimes existant
function mon_nouveau_mime ( $existing_mimes = array() ) {
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}




// On met dans un fichier diffé

include 'relations.php';




add_action('save_post', 'edit_tags');

 // Vérifie les machines liées au moment de la sauvegarde et adapte les tags

function edit_tags($post_id){
    
    //Enlève les liens machines existant
    wp_set_post_terms(  $post_id, $tags = '', $taxonomy = 'related_machine', $append = false );
    
    
    //Vérifie si il existe des liens machine
    $has_machine_link = get_field( 'machines_linked' , $post_id) ;
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

 
