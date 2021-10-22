<?php 

    get_header(); 

    if ( have_posts() ):
        
        while( have_posts() ) : the_post();
            $currentlang = get_bloginfo('language');
             //Declarar array con etiquetas
?>

    <div class="row">
        <div class="col-12 p-0">

        <div id="primary-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">

                <?php

                    $images_full = rwmb_meta( 'listing_gallery', array( 'size' => 'full', 'limit'=> 40 ) );
                   
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


            <h3 class="mt-5 ms-5 mb-1 fs-5 fw-bold <?php echo rwmb_meta('avaliable');?>">
                <span class="tr-ptype px-2"><?php tierra_get_property_type(get_the_ID(), 'property_type'); ?></span>
                <?php echo pll_e( rwmb_meta('avaliable') );?>
            </h3>
            <h1 class="ms-5 mb-1"><?php the_title();?></h1>
            <h2 class="mx-5 mt-1 mb-2 fs-4">
                <?php tierra_get_list_terms(get_the_ID(),'regiones');?>
            </h2>

            <div class="mx-5 my-2 fs-5">
                <p><?php echo the_content(); ?></p>
            </div>

            <div class="row justify-content-center justify-content-md-start px-1 px-md-5">
                    <div class="col-11">
                        <hr style="width:70%;text-align:left;margin-left:0" id="listing-hr">
                        
                        <div class="row justify-content-start" id="services-icons">
                            
                            <?php if( !empty(rwmb_meta( 'bedrooms') ) ): ?>
                                <div class="col-6 col-md-3">
                                    <h4><i class="fas fa-bed"></i> <?php echo rwmb_meta( 'bedrooms' );?> <?php pll_e( 'Recámaras' );?></h4>
                                </div>
                            <?php endif;?>

                            <?php if( !empty(rwmb_meta( 'bathrooms') ) ): ?>
                                <div class="col-6 col-md-3">
                                    <h4><i class="fas fa-shower"></i> <?php echo rwmb_meta( 'bathrooms' );?> <?php pll_e( 'Baños' );?></h4>
                                </div>
                            <?php endif;?>

                            <?php if( !empty(rwmb_meta( 'construction') ) ): ?>
                                <div class="col-6 col-md-3">
                                    <h4><i class="fas fa-home"></i> <?php echo tierra_get_sqft( pll_current_language(), rwmb_meta( 'construction' ) );?> Const.</h4>
                                </div>
                            <?php endif;?>
                        
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

                            <?php if( !empty(rwmb_meta( 'furniture') ) ): ?>
                                <div class="col-6 col-md-3">
                                    <h4><i class="fas fa-couch"></i> <?php echo pll_e( rwmb_meta( 'furniture' ) );?> </h4>
                                </div>
                            <?php endif;?>

                            <?php if( !empty(rwmb_meta( 'lot_area') ) ): ?>
                                <div class="col-6 col-md-3">
                                    <h4><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft( pll_current_language(), rwmb_meta( 'lot_area' ) );?> <?php pll_e( 'Lote' );?></h4>
                                </div>
                            <?php endif;?>
                                
                            <?php if( !empty(rwmb_meta( 'parking_stalls') ) && !empty(rwmb_meta('parking_type')) ): ?>
                                <div class="col-6 col-md-3">
                                    <!--Parkings-->
                                    <h4><i class="fas fa-car"></i> <?php echo rwmb_meta( 'parking_type' );?>: <?php echo rwmb_meta( 'parking_stalls' );?>  </h4>
                                </div>
                            <?php endif;?>

                            <?php if( !empty(rwmb_meta('view') )): ?>
                                <div class="col-6 col-md-3">
                                    <!--Vista-->
                                    <h4><?php pll_e('Vista');?>: <?php pll_e(rwmb_meta( 'view' ));?></h4>
                                </div>
                            <?php endif;?>
                            
                        </div>

                        <div class="row justify-content-start mt-3" id="services-icons">
                                <div class="col-12 col-lg-4">
                                    <span class="d-block fs-1 py-3"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format( rwmb_meta( 'price' ) );?></span>
                                </div>
                        </div>

                        <div class="row">
                                <!--Calculo de precio por metro cuadrado-->
                                <?php if( !empty(rwmb_meta( 'construction' ) ) && !empty(rwmb_meta('lot_area')) ){ ?>
                                <div class="col-12 col-md-8 d-block d-md-flex">
                                    <span class="fs-3"><?php pll_e( 'Precio m2 lote' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php 
                                        
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

                                        echo feetOrMeters(pll_current_language(), $priceMeterSquareLot, $priceFtSquareLot); ?> </span>
                                        <span class="fs-3 ps-0 ps-md-3"><?php pll_e( 'Precio m2 const' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php echo feetOrMeters(pll_current_language(), $priceMeterSquareConst, $priceFtSquareConst ); ?></span>
                                        
                                </div>

                                <?php }elseif( empty(rwmb_meta( 'lot_area' )) && !empty(rwmb_meta( 'construction' )) ){ ?>

                                    <div class="col-12 col-md-6">
                                         <span class="fs-3"><?php pll_e( 'Precio m² const' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php 
                                    
                                        $price = rwmb_meta( 'price' );
                                        $construction = rwmb_meta('construction');
                                        $constFt = $construction * 10.76;
                                        
                                        $priceMeterSquareConst = $price / $construction;
                                        $priceFtSquareConst = $price / $constFt;

                                        echo feetOrMeters(pll_current_language(),$priceMeterSquareConst, $priceFtSquareConst); ?> </span>
                                    </div>

                                    <?php } else{?>

                                    <div class="col-12 col-md-6">
                                        <span class="fs-3"><?php pll_e( 'Precio m² lote' );?>: <?php echo rwmb_meta( 'currency' );?>$<?php 

                                            $price = rwmb_meta( 'price' );
                                            $lot = rwmb_meta('lot_area');

                                            $lotFt = $lot * 10.76;

                                            $priceMeterSquareLot = $price / $lot;
                                            $priceFtSquareLot = $price / $lotFt;

                                            echo feetOrMeters(pll_current_language(),$priceMeterSquareLot,$priceFtSquareLot); ?> </span>
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
                     <a href="<?php echo rwmb_meta( 'listing_tour' );?>" class="my-3 mx-5 btn btn-amarillo w-75" target="_blank" rel="noopener"><?php pll_e( 'Tour Vitual' );?></a>
                </div>

                <?php endif; ?>


                <?php if( !empty(rwmb_meta( 'list_brochure') ) ): 
                    $files = rwmb_meta( 'list_brochure' );
                    foreach ( $files as $file ) {
                        ?>
                        <div class="col-md-4">
                             <a href="<?php echo $file['url']; ?>" class="my-3 mx-5 btn btn-azul w-75" target="_blank" rel="noopener"><?php pll_e( 'Descargar brochure' );?></a>
                        </div>
                        <?php
                    }?>
              

                <?php endif; ?>

                <div class="col-md-4">
                    <?php $descr = get_the_excerpt(); ?>
                    <form action="<?php echo get_template_directory_uri(); ?>/inc/convertopdf.php" method="post">
                        <input type="hidden" name="titulo" value="<?php echo the_title(); ?>">
                        <input type="hidden" name="descripcion" value="<?php echo $descr; ?>">
                        <input type="hidden" name="region" value="<?php echo tierra_get_list_terms(get_the_ID(), 'regiones'); ?>">
                        <input type="hidden" name="precio" value="<?php echo rwmb_meta('price'); ?>">
                        <input type="hidden" name="currency" value="<?php echo rwmb_meta('currency'); ?>">
                        <input type="hidden" name="bedrooms" value="<?php echo rwmb_meta('bedrooms'); ?>">
                        <input type="hidden" name="bathrooms" value="<?php echo rwmb_meta('bathrooms'); ?>">
                        <input type="hidden" name="const" value="<?php echo rwmb_meta('construction'); ?>">
                        <input type="hidden" name="lote" value="<?php echo rwmb_meta('lot_area'); ?>">
                        <input type="hidden" name="furniture" value="<?php echo rwmb_meta('furniture'); ?>">
                        <input type="hidden" name="imagen" value="<?php echo $images_full[0]['url']; ?>">
                        <input type="hidden" name="imagen2" value="<?php echo $images_full[1]['url']; ?>">
                        <input type="hidden" name="imagen3" value="<?php echo $images_full[2]['url']; ?>">
                        <input type="hidden" name="imagen4" value="<?php echo $images_full[3]['url']; ?>">
                        <input type="hidden" name="permalink" value="<?php echo get_the_permalink(); ?>">
                        <input type="hidden" name="imglogo" value="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-negro.png';?>">
                        <input type="hidden" name="directory" value="<?php echo get_template_directory_uri(); ?>">
                        <button type="submit" class="my-3 mx-5 btn btn-azul w-75" name="sendpdf">PDF</button>
                    </form>
                </div>

            </div>
            

           

        <!--Video-->
        <div id="video_listing" >
            <?php echo rwmb_meta( 'listing_video' );?>
        </div>
        

            <h4 class="fs-1 m-5 text-center"><?php pll_e( 'Ubicación' );?></h4>
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