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
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-columns',
            'menu_positions' => 5,
            'exclude_from_search' => false

        );

        register_post_type('developments', $args);

    }

    add_action('init', 'tierra_developments_cpt');

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

    
// add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );

// function prefix_register_meta_boxes( $meta_boxes ) {
//     $meta_boxes[] = [
//         'title'      => 'Personal Information',
//         'post_types' => 'testimonial',

//         'fields' => [
//             [
//                 'name'            => 'Select',
//                 'id'              => $prefix . 'select',
//                 'type'            => 'select',
//                 // Array of 'value' => 'Label' pairs
//                 'options'         => array(
//                     'java'       => 'Java',
//                     'javascript' => 'JavaScript',
//                     'php'        => 'PHP',
//                     'csharp'     => 'C#',
//                     'objectivec' => 'Objective-C',
//                     'kotlin'     => 'Kotlin',
//                     'swift'      => 'Swift',
//                 ),
//                 // Allow to select multiple value?
//                 'multiple'        => false,
//                 // Placeholder text
//                 'placeholder'     => 'Select an Item',
//                 // Display "Select All / None" button?
//                 'select_all_none' => true,
//             ],
            
//             [
//                 'name'  => 'Last name',
//                 'desc'  => 'Format: {First Name} {Last Name}',
//                 'id'    => 'prefix_name',
//                 'type'  => 'text',
//             ],
//             // More fields.
//         ]
//     ];

    // Add more field groups if you want
    // $meta_boxes[] = ...

    //return $meta_boxes;
//}


