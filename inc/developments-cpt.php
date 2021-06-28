<?php

    /*
		==========================================
			CUSTOM PROPERTIES POST TYPE
		==========================================

    */
    
    function tierra_developments_cpt(){

        $labels = array(
            'name' => 'Developments',
            'singular_name' => 'Development',
            'add_new' => 'Add Development',
            'all_items' => 'All Developments',
            'add_new_items' => 'Add Development',
            'edit_item' => 'Edit Development',
            'new_item' => 'New Development',
            'view_item' => 'View Development',
            'search_item' => 'Search Development',
            'not_found' => 'No items found',
            'parent_item_colon' => 'Parent item'

        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' =>  true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'supports' => array(
                'title',
                'editor',
                //'excerpt', 
                'thumbnail',
                'revisions',
                'page-attributes',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-columns',
            'menu_positions' => 5,
            'exclude_from_search' => false

        );

        register_post_type('developments', $args);

    }

    add_action('init', 'tierra_development_cpt');


    function tierra_development_inventory_cpt(){

        $labels = array(
            'name' => 'Invetory',
            'singular_name' => 'Inventory',
            'add_new' => 'Add unit',
            'all_items' => 'All units',
            'add_new_items' => 'Add unit',
            'edit_item' => 'Edit unit',
            'new_item' => 'New unit',
            'view_item' => 'View unit',
            'search_item' => 'Search unit',
            'not_found' => 'No items found',
            'parent_item_colon' => 'Parent item'

        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' =>  true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                //'editor',
                //'excerpt', 
                'thumbnail',
                'revisions',
                'page-attributes',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-columns',
            'menu_positions' => 6,
            'exclude_from_search' => false

        );

        register_post_type('inventory', $args);

    }

    add_action('init', 'tierra_development_inventory_cpt');

 /*     function tierra_developments_custom_taxonomies(){

        //add new taxonomi heirarchical
      $labels = array(
            'name' => 'Properties Type', //Puede ser casas, depas, terrenos
            'singular_name' => 'Property Type',
            'search_items' => 'Search Properties',
            'all_items' => 'All Propertys',
            'parent_item' => 'Parent Property', 
            'parent_item_colon' => 'Parent Property:',
            'edit_item' => 'Edit Property',
            'update_item' => 'Update Property',
            'add_new_item' => 'Add New Property', 
            'new_item_name' => 'New Property Name',
            'manu_name' => 'Property Type'
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'property') //Este parametro saldra en la URL
        );

        register_taxonomy('property', array('propiedades-en-renta'), $args );

        //add new taxonomi NOT heirarchical

        register_taxonomy('location', 'propiedades-en-renta', array(
            'label' => 'Location',
            'rewrite' => array('slug' => 'location'), //Este parametro saldra en la URL
            'hierarchical' => false
        ));

    }

    // add_action('init', 'tierra_developments_custom_taxonomies');

      /*CONTACT META BOXES si quiero recolectar más campos del form solo tengo que añadirlos aquí */

    // function v4you_for_rent_add_meta_box(){
    //     add_meta_box( 'for_rent_title_en', 'Title Property', 'v4you_for_rent_callback', 'propiedades-en-renta', 'normal', 'high' );
        //add_meta_box( 'for_rent_price', 'Price', 'v4you_for_rent_callback', 'propiedades-en-renta', 'normal', 'high' );
    // }

    // function v4you_for_rent_callback( $post ){

        //wp_nonce_field( 'v4you_save_contact_email_data', 'v4you_contact_email_meta_box_nonce' );
        
//         $value = get_post_meta( $post->ID, '_for_rent_title_en_value_key', tue);
//         $value2 = get_post_meta( $post->ID, '_for_rent_price_value_key', tue);

//         echo '<label for="v4you_for_rent_title_en_field">Property Type</label>';
//         echo '<input type="text" id="v4you_for_rent_title_en_field" name="v4you_for_rent_title_en_field" value="'. esc_attr( $value ) .'" size="25" />';

//         echo '<label for="v4you_for_rent_price_field">Price</label>';
//         echo '<input type="text" id="v4you_for_rent_price_field" name="v4you_for_rent_price_field" value="'. esc_attr( $value2 ) .'" size="25" />';
//     };

//     add_action('add_meta_boxes', 'v4you_for_rent_add_meta_box');

    
add_filter( 'rwmb_meta_boxes', 'developments_register_meta_boxes' );

function developments_register_meta_boxes( $meta_boxes ) {
    
     $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'developments',

        'fields' => [
            [
                'name'  => 'Precios desde',
                'desc'  => 'Solo números, sin signos ni puntos',
                'id'    => 'starting_at',
                'type'  => 'text',
            ],
            [
                'name'            => 'Moneda',
                'id'              => 'currency',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'USD'       => 'USD',
                    'MXN'       => 'MXN',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Seccione la moneda',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                    'name'       => 'Ubicación',
                    'id'         => 'location',
                    'type'       => 'taxonomy',

                    // Taxonomy slug.
                    'taxonomy'   => 'regiones',

                    // How to show taxonomy.
                    'field_type' => 'select_tree',
            ],
            
            // More fields.
        ],
    ];

    $meta_boxes[] = [
        
        'title' => 'Galeria de Amenidades',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'amenities_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 30,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'developments',

        'fields' => [
            // [
            //     'id'   => 'address',
            //     'name' => 'Address',
            //     'type' => 'text',
            // ],
            // Map field.
            [
                'id'            => 'development_map',
                'name'          => 'Location',
                'type'          => 'map',

                // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
                'std'           => '20.6985662,-105.3090504,14',

                // Address field ID
                'address_field' => 'address',

                // Google API key
                'api_key'       => 'AIzaSyDlDmMESUjBK1gwNJm5x4hyoS90qacpJmY',
            ]
        ],
    ];


    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'development_inventory_register_meta_boxes' );

function development_inventory_register_meta_boxes( $meta_boxes ) {
    
     $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'inventory',

        'fields' => [
            [
                'name'  => 'Precios',
                'desc'  => 'Solo números, sin signos ni puntos',
                'id'    => 'starting_at',
                'type'  => 'text',
            ],
            [
                'name'            => 'Moneda',
                'id'              => 'currency',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'USD'       => 'USD',
                    'MXN'       => 'MXN',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Seccione la moneda',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name'  => 'Recámaras',
                'desc'  => 'Solo numeros',
                'id'    => 'bedrooms',
                'type'  => 'number',
            ],
            [
                'name'  => 'Baños',
                'desc'  => 'Solo números',
                'id'    => 'bathrooms',
                'type'  => 'number',
            ],
            [
                'name'  => 'Medios Baños',
                'desc'  => 'Solo números',
                'id'    => 'half_baths',
                'type'  => 'number',
            ],
            [
                'name'  => 'Construcción',
                'desc'  => 'Solo números (m2)',
                'id'    => 'construction',
                'type'  => 'text',
            ],

           
            
            // More fields.
        ],
    ];

    return $meta_boxes;
}


