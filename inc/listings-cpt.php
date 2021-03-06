<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function tierra_listings_custom_post_type(){

        $labels = array(
            'name' => 'Listings',
            'singular_name' => 'Listing',
            'add_new' => 'Add Listing',
            'all_items' => 'All Listings',
            'add_new_item' => 'Add Listing',
            'edit_item' => 'Edit Listing',
            'new_item' => 'New Listing',
            'view_item' => 'View Listing',
            'search_item' => 'Search Listing',
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
                'editor',
                //'excerpt',
                'thumbnail',
                'revisions',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-list-view',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('listings', $args);

    }

    add_action('init', 'tierra_listings_custom_post_type');

    function tierra_listings_custom_taxonomies(){

        //add new taxonomi heirarchical
        $labels = array(
            'name' => 'Property Type', //Puede ser casas, depas, terrenos
            'singular_name' => 'Property Type',
            'search_items' => 'Search Properties',
            'all_items' => 'All Properties',
            'parent_item' => 'Parent Property', 
            'parent_item_colon' => 'Parent Property:',
            'edit_item' => 'Edit Property',
            'update_item' => 'Update Property',
            'add_new_item' => 'Add New Property', 
            'new_item_name' => 'New Property Name',
            'menu_name' => 'Property Type'
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'property-type') //Este parametro saldra en la URL
        );

        register_taxonomy('property_type', array('listings'), $args );

        //add new taxonomi NOT heirarchical

         register_taxonomy('regiones', array('listings','developments'), array(
            'label' => 'Areas',
            'show_ui' => true,
            'show_in_menu' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'area'), //Este parametro saldra en la URL
            'hierarchical' => true,
        ));


 
    }

    add_action('init', 'tierra_listings_custom_taxonomies');

      /*CONTACT META BOXES si quiero recolectar m??s campos del form solo tengo que a??adirlos aqu?? */

          
add_filter( 'rwmb_meta_boxes', 'listings_register_meta_boxes' );

function listings_register_meta_boxes( $meta_boxes ) {
    
    $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'listings',

        'fields' => [
            [
                'name'  => 'Precio',
                'required'=> true,
                'desc'  => 'Solo numeros, sin signos ni puntos',
                'id'    => 'price',
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
                    'name'       => 'Tipo propiedad',
                    'id'         => 'taxonomy',
                    'type'       => 'taxonomy',
                    'required'   => true,

                    // Taxonomy slug.
                    'taxonomy'   => 'property_type',

                    // How to show taxonomy.
                    'field_type' => 'radio_list',
            ],
            [
                'name'            => 'Disponibilidad',
                'id'              => 'avaliable',
                'type'            => 'select',
                'required'        => true,
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Disponible'  => 'Disponible',
                    'Apartado'    => 'Apartado',
                    'Vendido'     => 'Vendido',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Elige una opci??n',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                    'name'       => 'Ubicaci??n',
                    'id'         => 'location',
                    'type'       => 'taxonomy',

                    // Taxonomy slug.
                    'taxonomy'   => 'regiones',

                    // How to show taxonomy.
                    'field_type' => 'select_tree',
            ],
             [
                'name'  => 'Rec??maras',
                'required'=> true,
                'desc'  => 'Solo numeros, Si se trata de un terreno ingrese un 0',
                'id'    => 'bedrooms',
                'type'  => 'number',
            ],
            [
                'name'  => 'Ba??os',
                'required'=> false,
                'desc'  => 'Solo n??meros',
                'id'    => 'bathrooms',
                'type'  => 'number',
            ],
            [
                'name'  => 'Medios Ba??os',
                'desc'  => 'Solo n??meros',
                'id'    => 'half_baths',
                'type'  => 'number',
            ],
            [
                'name'            => 'Muebles',
                'id'              => 'furniture',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Amueblado'       => 'Amueblado',
                    'Sin amueblar'       => 'Sin amueblar',
                    'Semi-amueblado' => 'Semi-amueblado'
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Eliga una opci??n',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name'  => 'Construcci??n',
                'desc'  => 'Solo n??meros (m2), Si se trata de un terreno ingrese un 0',
                'id'    => 'construction',
                'type'  => 'text',
                'placeholder'=>'Solo n??meros',
                'required'=> true
            ],
            [
                'name'  => 'Lote',
                'desc'  => 'Solo n??meros (m2)',
                'id'    => 'lot_area',
                'type'  => 'text',
            ],
            [
                'name'            => 'Vista',
                'id'              => 'view',
                'type'            => 'select',
                'desc'            =>'Eliga la vista principal desde la propiedad',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Mar'       => 'Mar',
                    'Playa'     => 'Playa',
                    'Monta??as'  => 'Monta??as',
                    'Ciudad'    => 'Ciudad',
                    'R??o'       => 'R??o',
                    'Lago'      => 'Lago',
                    'Canal'     => 'Canal',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Seccione uno',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name'  => 'Estacionamiento',
                'desc'  => 'Especificar tipo de estacionamiento',
                'id'    => 'parking_type',
                'type'  => 'text',
            ],
            [
                'name'  => 'Cantidad de estacionamientos',
                'desc'  => 'Especificar cuantos estacionamiento hay',
                'id'    => 'parking_stalls',
                'type'  => 'number',
            ],
            [
                'id'          => 'list_brochure',
                'name'        => 'Brochure',
                'type'        => 'file',
                'desc'        =>  'Suba el PDF del brochure',
        
                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,
            
                // Maximum file uploads.
                'max_file_uploads' => 1,
            ],
            [
                'name' => 'Mostrar en homepage',
                'id'   => 'featured_listing',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            
            
            // More fields.
        ],
    ];

    // Add more field groups if you want
    $meta_boxes[] = [
        
        'title' => 'Gallery',
        'post_types' => 'listings',

        'fields' => [
            [
                'id'               => 'listing_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 40,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Tour virtual y video del lugar',
        'post_types' => 'listings',

        'fields' => [
             [
                'id'               => 'listing_video',
                'name'             => 'Video de Youtube',
                'desc'             => 'Por favor pegue el enlace ',
                'type'             => 'oembed',
             ],
            [
                'id'               => 'listing_tour',
                'name'             => 'Link del Tour virtual',
                'desc'             => 'Por favor pegue el enlace del Tour virtual" ',
                'type'             => 'text',
            ],
        ]
    ];

     $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'listings',

        'fields' => [
            
            // Map field.
            [
                'id'            => 'listings_map',
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
    // More fields..

    return $meta_boxes;
}