<?php 


function cargar_estilos() {

        wp_register_style('bootstrap', get_theme_file_uri() . '/css/bootstrap.css', null, null, null);
        wp_register_style('font-awesome', get_theme_file_uri() . '/css/all.min.css', null, null, null);
        wp_register_style('myStyle', get_theme_file_uri() . '/css/main.css', null, null, null);

        wp_enqueue_style('bootstrap');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('myStyle');

}

add_action( 'wp_enqueue_scripts', 'cargar_estilos' );

function cargar_scripts() {

        wp_register_script('jQuery3_3_1', get_bloginfo('template_directory') . '/js/jquery-3.3.1.js', null, null, true);
        wp_register_script('popper', get_bloginfo('template_directory') . '/js/popper.min.js', null, null, true);
        wp_register_script('bootstrapJs', get_bloginfo('template_directory') . '/js/bootstrap.js', null, null, true);
        wp_register_script('myjs', get_bloginfo('template_directory') . '/js/main.js', null, null, true);
        
        wp_enqueue_script('jQuery3_3_1');
        wp_enqueue_script('popper');
        wp_enqueue_script('bootstrapJs');
        wp_enqueue_script('myjs');
       
}

add_action( 'wp_enqueue_scripts', 'cargar_scripts' );


// Registro Post_type
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
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-aside',
        'supports'           => array(
            'title',
            // 'editor',
            // 'excerpt',
            // 'trackbacks',
            'custom-fields',
            // 'comments',
            // 'revisions',
            'thumbnail',
            // 'author',
            'page-attributes',
        ),
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
        'squere'          => __('Imagenes del Home')
    );
    return array_merge( $sizes, $add_sizes );
}

if ( function_exists( 'add_theme_support' ) ) {
    add_image_size( 'squere', 362, 327, true );
    add_filter( 'image_size_names_choose', 'dl_image_sizes' );
}




 ?>