<?php 

    get_header(); 

    if ( have_posts() ):
        
        while( have_posts() ) : the_post();
            $currentlang = get_bloginfo('language');
             //Declarar array con etiquetas
?>

    <div class="row">
        <div class="col-12">

        <div id="primary-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">

                <?php

                    $images_full = rwmb_meta( 'listing_gallery', array( 'size' => 'full' ) );
                   
                        foreach ( $images_full as $image_full ) { ?>

                        <li class="splide__slide">
                            <img src="<?php echo $image_full['url'];?>" alt="<?php echo $image_full['title'];?>">
                        </li>

                <?php   }?>

                </ul>
            </div>
        </div>

        <div id="secondary-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php

                    $images_thumbnails = rwmb_meta( 'listing_gallery', array( 'size' => 'thumbnail' ) );
                   
                        foreach ( $images_thumbnails as $image_thumbnail ) { ?>

                        <li class="splide__slide">
                            <img src="<?php echo $image_thumbnail['url'];?>" alt="<?php echo $image_thumbnail['title'];?>">
                        </li>

                    <?php    }?>
                </ul>
            </div>
        </div>


            <p class="mt-5 ms-5 mb-1 fs-5 fw-bold <?php echo rwmb_meta('avaliable');?>"><?php echo pll_e( rwmb_meta('avaliable') );?></p>
            <h1 class="ms-5 mb-1"><?php the_title();?></h1>
            <h4 class="mx-5 mt-1 mb-2 fs-4">
            <?php 
            
                $locations = array_reverse(rwmb_meta( 'location' ));
   
                $i =1;
                if ( ! empty( $locations ) && ! is_wp_error( $locations ) ) {
                    foreach ( $locations as $location ) {
                        echo $location->name;
                        if( $i < count($locations) ){
                            echo ', ';
                        }
                        $i++;
                    }
                }
            ?>
            </h4>

            <div class="mx-5 my-2 fs-5">
                <p>
                    <?php echo the_content(); ?>

                </p>
            </div>

            
                
                <p class="mx-5 my-2 fs-5">
                    <?php if($currentlang == "en-US"){
                        echo rwmb_meta( 'place_description_en' );
                    }else{
                        echo rwmb_meta( 'place_description_es' );

                    } 
                    
                    ?>
                </p>
                

            <div class="row justify-content-center justify-content-md-start px-1 px-md-5">
                    <div class="col-11">
                        <hr style="width:70%;text-align:left;margin-left:0" id="listing-hr">
                        
                        <div class="row justify-content-start" id="services-icons">
                            
                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-bed"></i> <?php echo rwmb_meta( 'bedrooms' );?> <?php pll_e( 'Recámaras' );?></h4>
                            </div>

                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-shower"></i> <?php echo rwmb_meta( 'bathrooms' );?> <?php pll_e( 'Baños' );?></h4>
                            </div>

                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-home"></i><?php echo tierra_get_sqft( pll_current_language(), rwmb_meta( 'construction' ) );?> total</h4>
                            </div>
                        
                        </div>

                        <div>
                            <?php
                                $category = get_the_terms( $post->ID, 'property_type' ); 
                                $category_parent_id = $category[0]->category_parent;
                                if ( $category_parent_id != 0 ) {
                                    $category_parent = get_term( $category_parent_id, 'category' );
                                    $css_slug = $category_parent->slug;
                                } else {
                                    $css_slug = $category[0]->slug;
                                }

                                
                            ?>

                        </div>

                        <div class="row justify-content-start my-3" id="services-icons">
                            
                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-couch"></i> <?php echo pll_e( rwmb_meta( 'furniture' ) );?> </h4>
                            </div>

                            <?php if( !empty(rwmb_meta( 'lot_area') ) ): ?>
                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft( pll_current_language(), rwmb_meta( 'lot_area' ) );?> <?php pll_e( 'Lote' );?></h4>
                            </div>

                            <?php
                                endif;
                            ?>
                                
                                <?php if( !empty(rwmb_meta( 'parking_stalls') ) && !empty(rwmb_meta('parking_type')) ): ?>
                                    
                                
                               <div class="col-6 col-md-3">
                                <!--Parkings-->
                                <h4><i class="fas fa-car"></i> <?php echo rwmb_meta( 'parking_type' );?>: <?php echo rwmb_meta( 'parking_stalls' );?>  </h4>
                            </div>

                            <?php
                                endif;
                            ?>
                            
                        </div>

                        <div class="row justify-content-start my-3" id="services-icons">
                                <div class="col-12 col-md-3">
                                    <h3 class="fs-1 py-3"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format( rwmb_meta( 'price' ) );?></h3>
                                </div>

                                <!--Calculo de precio por metro cuadrado-->
                                <?php if( !empty(rwmb_meta( 'construction' ) ) && !empty(rwmb_meta('lot_area')) ){ ?>
                                <div class="col-12 col-md-8 d-block d-md-flex">
                                    <h3 class="fs-3 py-3"><?php pll_e( 'Precio m2 lote' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php 
                                        
                                        //precio
                                        $price = rwmb_meta( 'price' );

                                        //areas en metros
                                        $construction = rwmb_meta('construction');
                                        $lot = rwmb_meta('lot_area');
                                        
                                        //areas en pies
                                        $lotFt = $lot * 10.76;
                                        $constFt = $construction * 10.76;

                                        //precios por metro cuadrado
                                        $priceMeterSquareLot = $price / $lot;
                                        $priceMeterSquareConst = $price / $construction;

                                        //precios por pie cuadrado
                                        $priceFtSquareLot = $price / $lotFt;
                                        $priceFtSquareConst = $price / $constFt;

                                        echo feetOrMeters(pll_current_language(), $priceMeterSquareLot, $priceFtSquareLot); ?> </h3>
                                        <h3 class="fs-3 py-3 ps-0 ps-md-3"><?php pll_e( 'Precio m2 const' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php echo feetOrMeters(pll_current_language(), $priceMeterSquareConst, $priceFtSquareConst ); ?></h3>
                                        
                                </div>

                                <?php }elseif( empty(rwmb_meta( 'lot_area' )) && !empty(rwmb_meta( 'construction' )) ){ ?>

                                    <div class="col-12 col-md-6">
                                         <h3 class="fs-2 py-3"><?php pll_e( 'Precio m2 const' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php 
                                    
                                        $price = rwmb_meta( 'price' );
                                        $construction = rwmb_meta('construction');
                                        $constFt = $construction * 10.76;
                                        
                                        $priceMeterSquareConst = $price / $construction;
                                        $priceFtSquareConst = $price / $constFt;

                                        echo feetOrMeters(pll_current_language(),$priceMeterSquareConst, $priceFtSquareConst); ?> </h3>
                                    </div>

                                    <?php } else{?>

                                    <div class="col-12 col-md-6">
                                        <h3 class="fs-2 py-3"><?php pll_e( 'Precio m2 lote' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php 

                                            $price = rwmb_meta( 'price' );
                                            $lot = rwmb_meta('lot_area');

                                            $lotFt = $lot * 10.76;

                                            $priceMeterSquareLot = $price / $lot;
                                            $priceFtSquareLot = $price / $lotFt;

                                            echo feetOrMeters(pll_current_language(),$priceMeterSquareLot,$priceFtSquareLot); ?> </h3>
                                    </div>

                                <?php }?>

                        </div>

                        
                        <hr style="width:70%;text-align:left;margin-left:0" id="listing-hr">
                    </div>
            </div>

            <div class="row">
                <!--div class="col-6 col-md-3">
                    <a href="#contact-form" class="my-3 mx-5 btn btn-amarillo">Agenda tu cita</a>
                </div-->

                <?php if( !empty(rwmb_meta( 'listing_tour') ) ): ?>
                <div class="col-md-4">
                     <a href="<?php echo rwmb_meta( 'listing_tour' );?>" class="my-3 mx-5 btn btn-amarillo w-75" target="_blank" ><?php pll_e( 'Tour Vitual' );?></a>
                </div>

                <?php endif; ?>


                <?php if( !empty(rwmb_meta( 'list_brochure') ) ): 
                    $files = rwmb_meta( 'list_brochure' );
                    foreach ( $files as $file ) {
                        ?>
                        <div class="col-md-4">
                             <a href="<?php echo $file['url']; ?>" class="my-3 mx-5 btn btn-azul w-75" target="_blank" ><?php pll_e( 'Descargar brochure' );?></a>
                        </div>
                        <?php
                    }?>
              

                <?php endif; ?>

            </div>
            

           

        <!--Video-->
        <div id="video_listing" >
            <?php echo rwmb_meta( 'listing_video' );?>
        </div>
        

            <h2 class="fs-1 m-5 text-center"><?php pll_e( 'Ubicación' );?></h2>
              <?php $args = array(
                        'width'        => '100%',
                        'height'       => '500px',
                        'zoom'         => 14,
                        'marker'       => true,
                        //'marker_icon'  => 'https://url_to_icon.png',
                        //'marker_title' => 'Click me',
                        //'info_window'  => '<h3>Title</h3><p>Content</p>.',
                    );
                    
                    echo rwmb_meta( 'listings_map', $args );
            ?>
    
            <!--contacto-->
        <div class="container-fluid py-5">
            <?php get_template_part( 'partials/content', 'contact-form' ); ?>
        </div>

        </div>
    </div>

    <?php   

        endwhile;

    endif;

    get_footer();
