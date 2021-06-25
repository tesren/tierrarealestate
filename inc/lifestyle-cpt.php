<?php

    /*
		==========================================
			LIFESTYLE CUSTOM POST TYPE
		==========================================

    */   
    function tierra_lifestyle_custom_post_type(){

        $labels = array(
            'name' => 'Lifestyle Zones',
            'singular_name' => 'Lifestyle',
            'add_new' => 'Add Lifestyle',
            'all_items' => 'All Lifestyles',
            'add_new_items' => 'Add Lifestyle',
            'edit_item' => 'Edit Lifestyle',
            'new_item' => 'New Lifestyle',
            'view_item' => 'View Lifestyle',
            'search_item' => 'Search Lifestyle',
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
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-post-status',
            'menu_positions' => 8,
            'exclude_from_search' => false

        );

        register_post_type('lifestyle', $args);

    }

    add_action('init', 'tierra_lifestyle_custom_post_type');


      /*CONTACT META BOXES si quiero recolectar más campos del form solo tengo que añadirlos aquí */

          
add_filter( 'rwmb_meta_boxes', 'prefix_lifestyle_meta_boxes' );

function prefix_lifestyle_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'lifestyle',

        'fields' => [
            
             [
                'name'  => 'Descripción',
                'placeholder'  => 'Describe the place',
                'id'    => 'place_description',
                'type'  => 'textarea',
                'rows'  => '14',
            ],

            // More fields.
        ],
    ];

    // Add more field groups if you want
    $meta_boxes[] = [
        
        'title' => 'Galeria de Restaurantes',
        'post_types' => 'lifestyle',

        'fields' => [
            [
                'id'               => 'restaurant_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 10,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
            
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Galeria de Bares',
        'post_types' => 'lifestyle',

        'fields' => [
            [
                'id'               => 'bars_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 10,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Galeria lifestyle',
        'post_types' => 'lifestyle',

        'fields' => [
            [
                'id'               => 'lifestyle_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 3,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    // More fields..

    $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'lifestyle',

        'fields' => [
            [
                'id'   => 'address',
                'name' => 'Address',
                'type' => 'text',
            ],
            // Map field.
            [
                'id'            => 'map',
                'name'          => 'Location',
                'type'          => 'map',

                // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
                'std'           => '-6.233406,-35.049906,15',

                // Address field ID
                'address_field' => 'address',

                // Google API key
                'api_key'       => 'AIzaSyDlDmMESUjBK1gwNJm5x4hyoS90qacpJmY',
            ]
        ],
    ];
    return $meta_boxes;
}