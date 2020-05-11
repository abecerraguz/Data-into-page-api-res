<?php

global $wp_query;
define("THEME_DIR", get_template_directory_uri());
define("ADMIN_DIR", get_admin_url());
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link_wp', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'rel_canonical');

// Habilito los Featured Images
add_theme_support( 'post-thumbnails' ); 

// Escode mensajes de Actualización
function escondeMensajesUpdates()
{
    remove_submenu_page('index.php', 'update-core.php');
    remove_action('admin_notices', 'update_nag', 3);
}
add_action('admin_menu', 'escondeMensajesUpdates');

// Personalizo Footer - TRYO
function personalizarFooterAdmin()
{
    echo 'WordPress personalizado por <a href="http://www.tryo.cl" target="_blank">TRYO - Estrategias y Experiencias Digitales</a>';
}
add_filter('admin_footer_text', 'personalizarFooterAdmin');


// Para activar campos del formulario de contacto "date" y "number"
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

/* REGISTRO DEL SIDEBAR PRIMARIO Y SECUNDARIO, para Widgets de Header y Footer */
function registro_contacto_general() {
  register_sidebar(
                    array(
                          'id'            => 'widget-contacto-general',
                          'name'          => __( 'Datos Formulario contacto General' ),
                          'description'   => __( 'Esta es la zona donde va el formulario de contacto General' ),
                          'before_widget' => '',
                          'after_widget'  => '',
                          'before_title'  => '',
                          'after_title'   => ''
                    )
  );
}
add_action('widgets_init', 'registro_contacto_general');


function my_get_posts( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'page', 'album', 'movie', 'quote' ) );
    return $query;
}

/* Desarrollo de Menús principales */
function register_my_menu() {
  register_nav_menu('header-menu',__('Header Menu'));
  register_nav_menu('footer-menu',__('Footer Menu'));
}
add_action('init', 'register_my_menu');


/* CARGO SCRIPTS ESENCIALES SOLO EN AMBIENTE FRONT-END */
function scripts_iniciales() {
    if (!is_admin()) {
        
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        
        // Saco la version por defecto deJquery y luego cargo de HTTPS desde servidor de Google
        wp_deregister_script('jquery');
        // wp_register_script('jquery', 'https://code.jquery.com/jquery-2.1.3.min.js', false, '2.1.3', false); 
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', false); 
        wp_enqueue_script('jquery');        
        
        // Saco Masonry
        wp_deregister_script('jquery-masonry');
        wp_deregister_script('masonry');
        // Saco Jquery UI
        wp_deregister_script('jquery-ui-core');
        wp_deregister_script('jquery-ui-widget');
        wp_deregister_script('jquery-ui-button');
        wp_deregister_script('jquery-ui-datepicker');
        
        // FUNCIONES GENERALES DE JS
        // wp_enqueue_script( 'funciones', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', false );
    }
}
add_action('init', 'scripts_iniciales');


function cargar_scripts() {
        wp_register_script('myjs', get_bloginfo('template_directory') . '/js/main-2.0.js', null, null, true);
        wp_enqueue_script('myjs');  

}

add_action( 'wp_enqueue_scripts', 'cargar_scripts' );



function codex_store() {
    $labels = array(
        'name'               => _x( 'Store', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Product Store', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Product Store', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Product Store', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Product Store', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Product Store', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Product Store', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Product Store', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Product Store', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Products Store', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Product Store', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Product Store:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Product Store found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Product Store found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products-store' ),
        'capability_type'    => 'page',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-aside',
        'supports'           => array('title','custom-fields','thumbnail','page-attributes'),
        'taxonomies'         => array( 'category' ),
    );

    register_post_type( 'products-store', $args );
}
add_action( 'init', 'codex_store' );



// Activamos las imagenes destacadas
add_theme_support('post-thumbnails');

//Funcion que desactiva el editor Gutemberg
add_filter('use_block_editor_for_post_type', '__return_false', 100);

function dl_image_sizes( $sizes ) {
    $add_sizes = array(
        'squere'              => __('Imagenes del Tab'),
        'squere-tab'          => __('Imagenes del Tab')
    );
    return array_merge( $sizes, $add_sizes );
}

if ( function_exists( 'add_theme_support' ) ) {
    add_image_size( 'squere', 362, 327, true );
    add_image_size( 'squere-single-tab', 320, 340, true );
    add_filter( 'image_size_names_choose', 'dl_image_sizes' );
}

?>