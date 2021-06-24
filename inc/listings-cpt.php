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
            'add_new_items' => 'Add Listing',
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
                'excerpt',
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
            'manu_name' => 'Property Type'
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'listings') //Este parametro saldra en la URL
        );

        register_taxonomy('listing', array('listings'), $args );

        //add new taxonomi NOT heirarchical

        // register_taxonomy('status', 'listings', array(
        //     'label' => 'Status',
        //     'rewrite' => array('slug' => 'listing-status'), //Este parametro saldra en la URL
        //     'hierarchical' => false
        // ));

 
    }

    add_action('init', 'tierra_listings_custom_taxonomies');

      /*CONTACT META BOXES si quiero recolectar más campos del form solo tengo que añadirlos aquí */

          
add_filter( 'rwmb_meta_boxes', 'prefix_listings_meta_boxes' );

function prefix_listings_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'listings',

        'fields' => [
            [
                'name'            => 'Select',
                'id'              => $prefix . 'selectList',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'java'       => 'Java',
                    'javascript' => 'JavaScript',
                    'php'        => 'PHP',
                    'csharp'     => 'C#',
                    'objectivec' => 'Objective-C',
                    'kotlin'     => 'Kotlin',
                    'swift'      => 'Swift',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Select an Item',
                // Display "Select All / None" button?
                'select_all_none' => true,
            ],
            
            [
                'name'  => 'Last name',
                'desc'  => 'Format: {First Name} {Last Name}',
                'id'    => 'prefix_sname',
                'type'  => 'text',
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
                'id'               => 'image',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 20,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];
    // More fields..

    return $meta_boxes;
}