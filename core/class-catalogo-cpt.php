<?php
class Catalogo_CPT {

	public static function init() {
		self::register_product_cpt();
	}

	public static function register_product_cpt() {
	    $labels = array(
	        'name'                  => _x( 'Productos', 'Post Type General Name', CATALOGO_PLUGIN_DOMAIN ),
	        'singular_name'         => _x( 'Producto', 'Post Type Singular Name', CATALOGO_PLUGIN_DOMAIN ),
	        'menu_name'             => __( 'Productos', CATALOGO_PLUGIN_DOMAIN ),
	        'name_admin_bar'        => __( 'Productos', CATALOGO_PLUGIN_DOMAIN ),
	        'archives'              => __( 'Listado productos', CATALOGO_PLUGIN_DOMAIN ),
	        'attributes'            => __( 'Atributos', CATALOGO_PLUGIN_DOMAIN ),
	        'parent_item_colon'     => __( 'Producto padre:', CATALOGO_PLUGIN_DOMAIN ),
	        'all_items'             => __( 'Todos los productos', CATALOGO_PLUGIN_DOMAIN ),
	        'add_new_item'          => __( 'Añadir nuevo producto', CATALOGO_PLUGIN_DOMAIN ),
	        'add_new'               => __( 'Añadir nuevo', CATALOGO_PLUGIN_DOMAIN ),
	        'new_item'              => __( 'Nuevo producto', CATALOGO_PLUGIN_DOMAIN ),
	        'edit_item'             => __( 'Editar producto', CATALOGO_PLUGIN_DOMAIN ),
	        'update_item'           => __( 'Actualizar producto', CATALOGO_PLUGIN_DOMAIN ),
	        'view_item'             => __( 'Ver producto', CATALOGO_PLUGIN_DOMAIN ),
	        'view_items'            => __( 'Ver productos', CATALOGO_PLUGIN_DOMAIN ),
	        'search_items'          => __( 'Buscar producto', CATALOGO_PLUGIN_DOMAIN ),
	        'not_found'             => __( 'No encontrado', CATALOGO_PLUGIN_DOMAIN ),
	        'not_found_in_trash'    => __( 'No encontrado en la papelera', CATALOGO_PLUGIN_DOMAIN ),
	        'featured_image'        => __( 'Imagen destacada', CATALOGO_PLUGIN_DOMAIN ),
	        'set_featured_image'    => __( 'Establecer imagen destacada', CATALOGO_PLUGIN_DOMAIN ),
	        'remove_featured_image' => __( 'Borrar imagen destacada', CATALOGO_PLUGIN_DOMAIN ),
	        'use_featured_image'    => __( 'Usar como imagen destacada', CATALOGO_PLUGIN_DOMAIN ),
	        'insert_into_item'      => __( 'Insertar en productos', CATALOGO_PLUGIN_DOMAIN ),
	        'uploaded_to_this_item' => __( 'Subir a productos', CATALOGO_PLUGIN_DOMAIN ),
	        'items_list'            => __( 'Listado productos', CATALOGO_PLUGIN_DOMAIN ),
	        'items_list_navigation' => __( 'Listado productos', CATALOGO_PLUGIN_DOMAIN ),
	        'filter_items_list'     => __( 'Filtrado productos', CATALOGO_PLUGIN_DOMAIN ),
	    );
	    
	    $rewrite = array(
	        'slug'                  => 'producto',
	        'with_front'            => true,
	        'pages'                 => true,
	        'feeds'                 => true,
	    );
	    
	    $args = array(
	        'label'                 => __( 'Producto', CATALOGO_PLUGIN_DOMAIN ),
	        'description'           => __( 'Producto', CATALOGO_PLUGIN_DOMAIN ),
	        'labels'                => $labels,
	        'supports'              => array( 'title', 'editor', 'thumbnail' ),
	        'taxonomies'            => array(),
	        'hierarchical'          => false,
	        'public'                => true,
	        'show_ui'               => true,
	        'show_in_menu'          => true,
	        'menu_position'         => 5,
	        'menu_icon'             => 'dashicons-product',
	        'show_in_admin_bar'     => true,
	        'show_in_nav_menus'     => true,
	        'can_export'            => true,
	        'has_archive'           => true,
	        'exclude_from_search'   => false,
	        'publicly_queryable'    => true,
	        'rewrite'               => $rewrite,
	        'capability_type'       => 'page',
	        'show_in_rest'          => true,
	    );

	    register_post_type( 'producto', $args );

	}
}
Catalogo_CPT::init();
