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
        'secondary' => __( 'Secondary Menu', 'TierraRealEsatate' ),
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

    require get_template_directory() . '/inc/vendor/autoload.php';

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

    function get_tax_name_from_slug($slug){
        foreach ($wp_taxonomies as $key => $value) {
          if ($value->rewrite['slug'] === $slug){
              return $key;
          }
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
                'name' => 'details',
                'string' => 'Detalles',
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
            array(
                'name' => 'no_posts',
                'string' => 'Aún no hay propiedades, vuelve mas tarde',
                'group' => 'tierra lifestyle',
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
  

    remove_filter ('the_content', 'wpautop');
?>