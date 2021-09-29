<?php

function v4you_theme_support()
{
    //Add dinamyc title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support( 'custom-header' );
}

add_action('after_setup_theme', 'v4you_theme_support');

//ENABLE MENU FUNCTION

function cb_menus()
{    
    $locations = array(
        'primary' => __( 'Primary Menu', 'TierraRealEsatate' ),
        'pre-header' => __('Pre Header Menu', 'TierraRealEsatate'),
        'footer' => "Footer menu Items",
    );
    
    register_nav_menus( $locations );
}

add_action('init', 'cb_menus');


function cb_register_styles()
{
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('cb-style', get_template_directory_uri() . "/style.css", array('cb-bootstrap'), $version , 'all');
    // wp_enqueue_style('cb-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css", array(), '5.0.0', 'all');
    wp_enqueue_style('cb-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '5.0.0', 'all');
    wp_enqueue_style('tierra-style-primary', get_template_directory_uri() . "/assets/css/tierrareal_styles.css", array(), $version , 'all');
    wp_enqueue_style('cb-fontawesome', get_template_directory_uri() . "/assets/css/all.min.css", array(), '5.15.1' , 'all');
    //Fontawesome cdn
    //wp_enqueue_style('cb-fontawesome', "/style.css", array(), '1.0', 'all');
    if ( is_page( 'progress-construction' ) ) {
        wp_enqueue_style('os-gallery', get_template_directory_uri() . "/assets/css/unite-gallery.css", array(), $version , 'all');
    }
}

add_action('wp_enqueue_scripts', 'cb_register_styles');


function cb_register_scripts()
{
    
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('v4you_jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1', true);
    // wp_enqueue_script('cb_popper', 'https://unpkg.com/@popperjs/core@2/dist/umd/popper.js', array(), '2.0', true);
    // wp_enqueue_script('cb_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', array(), '5.0.0', true);
    wp_enqueue_script('cb_bootstrap', get_template_directory_uri() .  '/assets/js/bootstrap.min.js', array(), '5.0.0', true);
    wp_enqueue_script('os_gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDlDmMESUjBK1gwNJm5x4hyoS90qacpJmY', array(), '', true);
    wp_enqueue_script('cb_fontawesome', get_template_directory_uri() .  '/assets/js/all.min.js', array(), '5.15.1', true);
    wp_enqueue_script('os_reallax', get_template_directory_uri() .  '/assets/js/vendor/rellax.min.js', array(), '1', true);
    wp_enqueue_script('v4you_main', get_template_directory_uri() .  '/assets/js/v4you_main.js', array('v4you_jquery'), $version, true);
    if ( is_page( 'progress-construction' ) ) {
        wp_enqueue_script('os-gallery', get_template_directory_uri() . "/assets/js/vendor/unitegallery.min.js", array(), $version , true);
        wp_enqueue_script('theme-gallery', get_template_directory_uri() . "/assets/themes/tiles/ug-theme-tiles.js", array(), $version , true);
        wp_enqueue_script('custom-js', get_template_directory_uri() . "/assets/js/progress-construction.js", array('theme-gallery'), $version , true);
    }
    
}

add_action('wp_enqueue_scripts', 'cb_register_scripts');


// Async load
function os_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
}

add_filter( 'clean_url', 'os_async_scripts', 11, 1 );


/*
		==========================================
			INCLUDE WALKER FILTER
		==========================================

	*/
    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker(){
        require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );
	//require get_template_directory() . '/inc/walker-header.php';




    require get_template_directory() . '/inc/ajax.php';


    require get_template_directory() . '/inc/listings-cpt.php';

    require get_template_directory() . '/inc/developments-cpt.php';

    require get_template_directory() . '/inc/lifestyle-cpt.php';

    require get_template_directory() . '/inc/sales-team-cpt.php';

    require get_template_directory() . '/inc/messages-cpt.php';


    function check_post_type_and_remove_media_buttons() {
        global $current_screen;
        // Replace following array items with your own custom post types
        $post_types = array('listings','lifestyle', 'developments', 'realtors');
        if (in_array($current_screen->post_type,$post_types)) {
        remove_action('media_buttons', 'media_buttons');
        }
    }
    
    add_action('admin_head','check_post_type_and_remove_media_buttons');


    function tierra_get_list_terms($postID, $taxonomy)
    {
         $terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

        $j =1;
        if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
            foreach ( $terms_list as $term ) {
                echo $term->name;
                if( $j < count($terms_list) ){
                    echo ', ';
                }
                $j++;
            }
        }
    }

    function tierra_get_property_type($postID, $taxonomy){
        
        $terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

        if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
            foreach ( $terms_list as $term ) {
                echo $term->name;
            }
        }
    }

    function tierra_get_sqft( $lang, $val){

        if( !empty($val) )
        {
            if($lang === 'en' ){
                return number_format($val * 10.76 ) . ' ft²'; 
            }
            else
            {
                return number_format( $val ) . 'm²';
            }
        }else{
             return '0';
        }

       
    }

    function feetOrMeters($lang, $priceMeter, $priceFeet ){
        
        if($lang == 'en'){
            return number_format($priceFeet);
        }
        else{
            return number_format($priceMeter);
        }
    }


    function tierra_set_strings_transtaltion(){
        
        $strings = array(
            array(
                'name'     =>'disponible',
                'string'   =>'Disponible',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'apartado',
                'string'   =>'Apartado',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'vendido',
                'string'   =>'Vendido',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'listings_for_sale',
                'string'   =>'Listings a la venta',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'find_your_place',
                'string'   =>'Encuentra tu lugar perfecto',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'property_type',
                'string'   =>'Tipo de Propiedad',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'listing_search',
                'string'   =>'Buscar',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'price',
                'string'   =>'Precio',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name' => 'price_from',
                'string' => 'Precios Desde',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'more_info',
                'string' => 'Más info',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'bedrooms',
                'string' => 'Recámaras',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'price_m2',
                'string' => 'Precio m2 lote',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'price_m2',
                'string' => 'Precio m2 const',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'bathrooms',
                'string' => 'Baños',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'half_bathrooms',
                'string' => 'Medios Baños',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'preview',
                'string' => 'Vista previa',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'furnished_label',
                'string' => 'Amueblado',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'unfurnished_label',
                'string' => 'Sin amueblar',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'partly_furnished_label',
                'string' => 'Semi-amueblado',
                'group' => 'tierra labels',
                'multiline' => false,
             ),
            array(
                'name' => 'close',
                'string' => 'Cerrar',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'affiliate',
                'string' => 'Afiliados',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'privacy_policy',
                'string' => 'Politicas de Privacidad',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'properties',
                'string' => 'Propiedades',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'make_apointment',
                'string' => 'Agenda tu cita',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'amenities',
                'string' => 'Amenidades',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'more_photos',
                'string' => 'Más fotos',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'map_title',
                'string' => 'Título Mapas',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'listings_in_title',
                'string' => 'Listings en',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'desarrollos_in_title',
                'string' => 'Desarrollos en',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'virtual_tour',
                'string' => 'Tour Vitual',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
            array(
                'name' => 'download_brochure',
                'string' => 'Descargar brochure',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'lote_label',
                'string' => 'Lote',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'location_label',
                'string' => 'Ubicación',
                'group' => 'tierra labels',
                'multiline' => false,
            ),
             array(
                'name' => 'contact_page_title',
                'string' => 'Conócenos mejor',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
             array(
                'name' => 'contact_page_tagline',
                'string' => 'Nuestro equipo',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
             array(
                'name' => 'contact_page_qr_cta',
                'string' => 'Agregame a tus contactos',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_page_valores',
                'string' => 'Valores',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_page_respeto',
                'string' => 'Respeto',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_page_pro',
                'string' => 'Profesionalismo',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_page_team',
                'string' => 'Trabajo en Equipo',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_page_resolu',
                'string' => 'Resolucion',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_page_desc',
                'string' => 'Descripcion',
                'group' => 'tierra contact page',
                'multiline' => false,
            ),
             array(
                'name' => 'project_desc_title',
                'string' => 'Acerca del proyecto',
                'group' => 'tierra developments',
                'multiline' => false,
            ),
             array(
                'name' => 'master_plan',
                'string' => 'Master plan',
                'group' => 'tierra developments',
                'multiline' => false,
            ),
            array(
                'name' => 'restaurant_section_title',
                'string' => 'Restaurantes recomendados',
                'group' => 'tierra lifestyle',
                'multiline' => false,
            ),
             array(
                'name' => 'properties_section_title',
                'string' => 'Propiedades en',
                'group' => 'tierra lifestyle',
                'multiline' => false,
            ),
            array(
                'name' => 'properties_types_section',
                'string' => 'Propiedades',
                'group' => 'tierra developments',
                'multiline' => false,
            ),
             array(
                'name' => 'bars_section_title',
                'string' => 'Bares recomendados',
                'group' => 'tierra lifestyle',
                'multiline' => false,
            ),
             array(
                'name' => 'gallery_lifestyle_title',
                'string' => 'Vive en',
                'group' => 'tierra lifestyle',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_form_title',
                'string' => 'Título Formulario Contacto',
                'group' => 'tierra contact form',
                'multiline' => false,
            ),
            array(
                'name' => 'contact_form_desc',
                'string' => 'Descripción Formulario Contacto',
                'group' => 'tierra contact form',
                'multiline' => true,
            ),
             array(
                'name' => 'input_tel_form',
                'string' => 'Campo Teléfono',
                'group' => 'tierra contact form',
                'multiline' => false,
            ),
             array(
                'name' => 'input_name_form',
                'string' => 'Campo Nombre',
                'group' => 'tierra contact form',
                'multiline' => false,
            ),
            array(
                'name' => 'input_email_form',
                'string' => 'Campo Email',
                'group' => 'tierra contact form',
                'multiline' => false,
            ),
             array(      
                'name' => 'input_msg_form',
                'string' => 'Campo Mensaje',
                'group' => 'tierra contact form',
                'multiline' => false,
            ),
             array(
                'name' => 'btn_send_form',
                'string' => 'Botón Enviar',
                'group' => 'tierra contact form',
                'multiline' => false,
            ),
        );


        foreach ($strings as $string ) {
            
            pll_register_string( $string['name'], $string['string'], $string['group'], $string['multiline'] );
        };

    }

    add_action('init', 'tierra_set_strings_transtaltion');


      /**
     * Create Custom Query Vars
     * https://codex.wordpress.org/Function_Reference/get_query_var#Custom_Query_Vars
     */
    function add_query_vars_filter( $vars ) {
        // add custom query vars that will be public
        // https://codex.wordpress.org/WordPress_Query_Vars
        $vars[] .= 'min_price';
        $vars[] .= 'max_price';
        $vars[] .= 'min_beds';
        $vars[] .= 'max_beds';
        $vars[] .= 'property_type_cat_ids';
        $vars[] .= 'regiones_cat_ids';
        return $vars;
    }
    add_filter( 'query_vars', 'add_query_vars_filter' );


    /**
     * Override Movie Archive Query
     * https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
     */
    function listings_archive( $query ) {
        // only run this query if we're on the movie archive page and not on the admin side
        if ( $query->is_archive('listings') && $query->is_main_query() && !is_admin() ) {

            // get query vars from url.
            // https://codex.wordpress.org/Function_Reference/get_query_var#Examples

            // example.com/movie/?rating=4
            $min_price = get_query_var( 'min_price', FALSE );

            $max_price = get_query_var( 'max_price', FALSE );

            $min_beds = get_query_var( 'min_beds', FALSE );

            $max_beds = get_query_var( 'max_beds', FALSE );
            // example.com/movie/?director_id=14
            //$property_type_id = get_query_var( 'property_type_id', FALSE );
            // example.com/movie/?movie_category_ids[]=6
            $propertyType = get_query_var( 'property_type_cat_ids', FALSE );

            $location = get_query_var( 'regiones_cat_ids', FALSE );

            //$category = get_query_var( 'movie_category_ids', FALSE);

            // used to conditionally build the meta_query
            // the meta_query is used for searching against custom fields
            $meta_query_array = array('relation' => 'AND');

            // conditionally add arrays to the meta_query based on values in the URL
            // the `key` is the name of my custom fields
            $price_range = array();
            
            $min_price ? $price_range[] = $min_price : null;

            $max_price ? $price_range[] = $max_price : null;

            $price_range ? array_push($meta_query_array, array('key' => 'price', 'value' =>  $price_range, 'compare' => 'BETWEEN') ) : null ;
            
            $beds_range = array();
            
            $min_price ? $beds_range[] = $min_beds : null;

            $max_price ? $beds_range[] = $max_beds : null;

            $beds_range ? array_push($meta_query_array, array('key' => 'bedrooms', 'value' =>  $beds_range, 'compare' => 'BETWEEN') ) : null ;
            
            // final meta_query
            $query->set( 'meta_query', $meta_query_array );

            // used to conditionally build the tax_query
            // the tax_query is used for a custom taxonomy assigned to the post type
            // i'm using the `'relation' => 'OR'` to make the search more broad
            $tax_query_array = array('relation' => 'OR');

            // conditionally add arrays to the tax_query based on values in the URL
            // `movie_category` is the name of my custom taxonomy
            $location ? array_push($tax_query_array, array('taxonomy' => 'regiones', 'field' => 'term_id', 'terms' => $location) ) : null ;

            // final tax_query
            $query->set( 'tax_query', $tax_query_array);
        }
    }
    add_action( 'pre_get_posts', 'listings_archive' );

    
?>