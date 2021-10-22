<?php 
    $regiones = get_terms( array(
        'taxonomy'          => 'regiones',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );

    $propertiesType = get_terms( array(
        'taxonomy'          => 'property_type',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );

    get_header(); 

    if($_GET['regiones_s'] && !empty($_GET['regiones_s']))
    {
        $regiones_s = $_GET['regiones_s'];

    }else{
        $regiones_s = array(); 

        foreach($regiones as &$category):
            $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                foreach($childrenTerms as $child) :     
                    $term = get_term_by( 'id', $child, 'regiones');
                    array_push($regiones_s, $term->slug);
                 endforeach; 

         endforeach;
    }

    if($_GET['type_s'] && !empty($_GET['type_s']))
    {
        $pType = $_GET['type_s'];
    }
    else{
        $pType = array();

        foreach ($propertiesType as $propertyType){
            array_push($pType, $propertyType->slug);
        } 
    }

    if($_GET['minprice'] && !empty($_GET['minprice']))
    {
        $minprice = $_GET['minprice'];
    } else {
        $minprice = 0;
    }

    if($_GET['maxprice'] && !empty($_GET['maxprice']))
    {
        $maxprice = $_GET['maxprice'];
    } else {
        $maxprice = 999999999;
    }

    if($_GET['minbeds'] && !empty($_GET['minbeds']))
    {
        $minbeds = $_GET['minbeds'];
    } else {
        $minbeds = -1;
    }

    if($_GET['maxbeds'] && !empty($_GET['maxbeds']))
    {
        $maxbeds = $_GET['maxbeds'];
    } else {
        $maxbeds = 999999999;
    }

    if($_GET['currency'] && !empty($_GET['currency']))
    {
        $currency = $_GET['currency'];
    } else {
        $currency = array('MXN','USD');
    }

    /* if($_GET['minconst'] && !empty($_GET['minconst']))
    {
        if(pll_current_language()=="en"){
            $minconstfeet = $_GET['minconst'];

            $minconst = $minconstfeet * 0.0929;

        }else{
            $minconst = $_GET['minconst'];
        }

    } else {
        $minconst = -1;
    }

    if($_GET['maxconst'] && !empty($_GET['maxconst']))
    {
        if(pll_current_language()=="en"){
            $maxconstfeet = $_GET['maxconst'];

            $maxconst = $maxconstfeet * 0.0929;

        }else{
            $maxconst = $_GET['maxconst'];
        }
        
    } else {
        $maxconst = 999999999;
    } */

?>



<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-md-12">
            
            <h1 class="text-center grey-title mb-0 mb-lg-5"><?php echo pll_e('Listings a la venta');?></h1>
          
            <?php
                    $args = array(
                        'post_type' => 'listings',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'price',
                                'type' => 'NUMERIC',
                                'value' => array($minprice, $maxprice),
                                'compare' => 'BETWEEN'
                            ),

                            array(
                                'key' => 'bedrooms',
                                'type' => 'NUMERIC',
                                'value' => array($minbeds, $maxbeds),
                                'compare' => 'BETWEEN'
                            ),
                            array(
                                'key' => 'currency',
                                'value' => $currency,
                                'compare' => 'LIKE'
                            ),

                  /*           array(
                                'key' => 'construction',
                                'type' => 'NUMERIC',
                                'value' => array($minconst, $maxconst),
                                'compare' => 'BETWEEN'
                            ) */
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'property_type',
                                'field'    => 'slug',
                                'terms'    => $pType,
                            ),
                            array(
                                'taxonomy' => 'regiones',
                                'field'    => 'slug',
                                'include_children' => true,
                                'terms'    => $regiones_s,
                            ),
                        ),

                    );

                    $query = new WP_Query($args);
                    
            ?>
            
            <div class="row">
                <?php 
                    if ( $query -> have_posts() ) :
                        $modalId = 0;
                        $i = 0;
                        while($query -> have_posts()) : $query -> the_post();
                            
                            $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'large' );

                        ?>
                            
                            <div class="col-12 col-md-6 col-lg-4 tre-listing-card px-2 ">

                                <!-- Old layout -->
                                    
                                    <!--Imagen listing-->
                                    <img class="img-fluid w-100 imagen-archive-listing <?php if($i>2){echo'animatable fadeInUp';} ?>" src="<?php echo $portada[0];?>" alt="Listing image" <?php if($i>2){echo'loading="lazy"';} ?>>

                                    <div class="row justify-content-center bg-light text-center <?php if($i>2){echo'animatable fadeInUp';} ?>">
                                        <!--Disponibilidad-->
                                        <div class="col-12 d-flex justify-content-center mt-2 mb-0">
                                            <span class="fs-5 px-2 tr-ptype"><?php tierra_get_property_type( get_the_ID() ,'property_type' ); ?></span>
                                            <span class="fs-5 fw-bold ps-3 <?php echo rwmb_meta('avaliable');?>"><?php echo pll_e( rwmb_meta('avaliable') );?></span>
                                        </div>

                                        <div class="col-12 ">
                                            <!--Nombre y Lugar del listing-->
                                            <h2 class="fs-2 mt-2 oneline-heading"><?php echo get_the_title();?></h2>
                                            <span class="d-block fs-5">
                                                <?php tierra_get_list_terms(get_the_ID(), 'regiones'); ?>
                                            </span>
                                        </div>

                                        <div class="col-12">
                                            <span class="fs-1 my-3"><?php echo rwmb_meta( 'currency');?> $<?php echo number_format(rwmb_meta('price'));?></span>
                                        </div>

                                        <div class="col-12">
                                            <ul class="list-inline">
                                                <?php if( !empty(rwmb_meta( 'bedrooms') ) ): ?>
                                                    <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></li>
                                                <?php endif;?>

                                                <?php if( !empty(rwmb_meta( 'bathrooms') ) ): ?>
                                                    <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></li>
                                                <?php endif;?>

                                                <?php if( !empty(rwmb_meta( 'construction') ) ): ?>
                                                    <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?></li>
                                                <?php else:?>
                                                    <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('lot_area'));?></li>
                                                <?php endif;?>
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center pb-4 mb-5 bg-light text-center">
                                        <div class="col-12 col-md-6">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-azul btn-lg w-75 mt-3 mt-md-4" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $modalId; ?>"><?php pll_e( 'Vista previa' );?></button>
                                        </div>
                                        <div class="col-12 col-md-6">         
                                            <a href="<?php echo get_the_permalink();?>" class="btn btn-amarillo btn-lg w-75 mt-3 mt-md-4"><?php pll_e( 'Más info' );?></a>
                                        </div>
                                    </div>


                                <!-- end old layout -->
                            </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modal-<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="ListingModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog modal-lg">
                                <div class="modal-content">
                                
                                <div class="modal-header d-block p-0" style="position:relative;">

                                    <h5 class="modal-title fw-bold fs-3" id="hListingModalLabel" style="position:absolute; bottom:20px; left:20px; color:#fff;"><?php echo get_the_title( $unit->ID );?></h5>                    
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; top:20px; right:20px; background-color:#fff;"></button>
                                    <img src="<?php echo $portada[0];?>" class="d-block w-100 tr-img-responsive " alt="<?php the_post_thumbnail_caption();?>">
                                    
                                </div>

                                <div class="modal-body mt-1">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-12">
                                            <ul class="list-inline fs-4 mb-0">
                                               <?php if( !empty(rwmb_meta( 'bedrooms') ) ): ?>
                                                    <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></li>
                                                <?php endif;?>

                                                <?php if( !empty(rwmb_meta( 'bathrooms') ) ): ?>
                                                    <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></li>
                                                <?php endif;?>
                                                
                                                <?php if( !empty(rwmb_meta( 'construction') ) ): ?>
                                                    <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?></li>
                                                <?php else:?>
                                                    <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('lot_area'));?></li>
                                                <?php endif;?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer d-block">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="fs-5 text-start py-3"><?php echo get_the_excerpt(get_the_ID());?></div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly">
                                        <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal"><?php pll_e('Cerrar'); ?></button>
                                        <a href="<?php echo get_the_permalink();?>" class="col-4 btn btn-amarillo"><?php pll_e( 'Más info' );?></a>
                                    </div>
                                
                                </div>

                                </div>
                            </div>
                        </div><!--end Modal -->

                        
                    <?php   $i++;
                            $modalId++;   
                            endwhile;
                            the_posts_pagination();
                            wp_reset_query();

                        else:?>

                        <div class="container my-5 text-center" style="min-height:30vh;">
                            <span class="fs-1 d-block"><?php pll_e('No hay resultados, intenta con otros datos'); ?></span>
                            <a class="btn btn-amarillo" href="<?php echo get_post_type_archive_link( 'listings' ); ?>"><?php pll_e('Volver'); ?></a>
                        </div>

                <?php endif; ?>
            </div>
        </div>
        
        
    </div>

</div>

<?php get_footer(); ?>