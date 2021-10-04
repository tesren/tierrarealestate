<?php 

    get_header(); 

    if ( have_posts() ){
        
        while( have_posts() ){ ?>
               
        <!--Imagen con texto-->
        <div class="row">
            <div class="col-12 p-0">
                <!--Imagen con texto-->
                <div class="container-fluid p-0" style="position:relative;">
                <div class="fondo-oscuro"></div>
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                    <img class="w-100 img-fluid tr-img-responsive" src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title();?>">
                    <div class="caption-bucerias text-center">
                        <h1 style="z-index:3;"><?php the_title();?></h1>
                    </div>
                </div>
                <!--Lifestyle-->
                <div class="container-fluid p-0 text-center mt-5">
                    <div class="row justify-content-center ">

                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                                <h2 class="fs-1 animatable fadeIn">LIFESTYLE</h2>
                                <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                            </div>
                        </div>

                        <div class="col-11 mb-5 me-0 col-lg-9">
                            <div class="fs-3 mt-2 animatable fadeIn">
                                <p><?php echo the_content();?></p>
                            </div>
                        </div>   

                    </div>
                       
                </div>

                <h3 class="text-center my-5 fs-1 animatable fadeInDown "><?php pll_e( 'Restaurantes recomendados' );?></h3>

                <!--carrusel restaurantes-->
                <div id="carouselRestas" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">

                    <?php

                        $restaurants = rwmb_meta( 'restaurant_gallery', array( 'size' => 'large' ) );
                        $j = 0;
                            foreach ( $restaurants as $image ) { ?>

                                <div class="carousel-item<?php if($j==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive carousel-img-sizing" src="<?php echo $image['url'];?>">
                                    <div class="carousel-caption d-md-block">
                                        <div><h2 class="fs-1"><?php echo $image['title'];?></h2></div>
                                    </div>
                                </div>
                                

                    <?php   $j++; }?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestas" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRestas" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <h3 class="text-center px-5 pt-5 pb-2 fs-1 animatable fadeInUp"><?php pll_e( 'Bares recomendados' );?></h3>

                <!--carrusel Bares-->
                <div id="carouselBares" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">


                    <?php

                        $bares = rwmb_meta( 'bars_gallery', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $bares as $bar ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive carousel-img-sizing" src="<?php echo $bar['url'];?>">
                                    <div class="carousel-caption d-md-block">
                                        <div><h2 class="fs-1"><?php echo $bar['title'];?></h2></div>
                                    </div>
                                </div>
                                

                    <?php     $i++; }?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBares" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBares" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <!--VIVE EN-->
                <div style="position: relative; text-align: center;" class="container-fluid my-5 p-0">
                    <div class="row justify-content-center p-0">

                        <h4 style="font-size: 3.5rem; z-index: 1;" class="texto-encima"><?php pll_e( 'Vive en' );?> <?php the_title();?></h4>
                        
                        <div id="carouselExampleControls" class="carousel slide p-0" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <?php

                                    $lifestyles = rwmb_meta( 'lifestyle_gallery', array( 'size' => 'large' ) );
                                    $i = 0;
                                        foreach ( $lifestyles as $lifestyle ) { ?>

                                            <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                                <img class="d-block w-100 p-0 tr-img-responsive img-fluid carousel-img-sizing" src="<?php echo $lifestyle['url'];?>">
                                            </div>
                                        

                                <?php    $i++; }?>
                                
                            </div>
                               
                                
                        </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        
                        
                    </div>
                </div>

                <!--MAPA-->
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                    <h2 class="fs-1 animatable fadeIn"><?php pll_e('Ubicación') ?></h2>
                    <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                </div>

                <div class="container-fluid p-0 animatable fadeInUp">
                    <div style="height: 50vh;" class="col-12">
                    <?php $args = array(
                        'width'        => '100%',
                        'height'       => '100%',
                        'zoom'         => 14,
                        'marker'       => true,
                        //'marker_icon'  => 'https://url_to_icon.png',
                        //'marker_title' => 'Click me',
                        //'info_window'  => '<h3>Title</h3><p>Content</p>.',
                    );
                    
                    echo rwmb_meta( 'map', $args );
                    ?>
                    </div>
                </div>

                

              
        <?php $developments = get_field('developments'); 
        if( !empty($developments) ):?>
        <!--Desarrollos-->
        <div class="container-fluid p-0 text-center mb-5">
            <h2 class="fs-1 my-5"><?php pll_e('Desarrollos en'); ?> <b><?php the_title();?></b> </h2>
                <div id="carouselDesarrollos" class="carousel slide bg-azul" data-bs-ride="carousel" style="position:relative;">
                
                    <div class="carousel-inner">
                    
                        <?php
                            $i = 0;
                            foreach( $developments as $development ): 

                            $desImages = wp_get_attachment_image_src( get_post_thumbnail_id( $development->ID ), 'full' );?>
                                

                                    <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                        
                                        <img class="d-block w-100 tr-img-responsive" src="<?php echo $desImages[0];?>">

                                        <div class="carousel-caption d-md-block text-center" style="z-index:3;">
                                            <h2><?php echo get_the_title( $development->ID );?></h2>
                                            <p><?php tierra_get_list_terms($development->ID, 'regiones');?> <br>
                                            <?php pll_e( 'Precios Desde' );?> :<br> <?php echo $development->currency;?> $<?php echo number_format($development->starting_at);?> </p>
                                            <a href="<?php echo get_the_permalink( $development->ID );?>" class="btn btn-light"><?php pll_e( 'Más info' );?></a>
                                        </div>

                                    </div>
                

                        <?php $i++; endforeach;?>

                        
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDesarrollos" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDesarrollos" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
        </div>
        <?php endif;?>


        <?php $listings = get_field('listings');
         if( !empty($listings) ):?>                      

        <h2 class="fs-1 my-5 text-center"><?php pll_e('Listings en'); ?> <b><?php the_title();?></b> </h2>
                            
        <!--Nuevo y mejorado diseño listings chido-->
        <div class="container-fluid text-center contenedor-listings mt-5 px-1">
        
            <!--listing info-->
            <?php $modalId = 0;?>
  
            <?php foreach( $listings as $unit ): ?>
                <?php 
            setup_postdata($unit);
            $imgFull = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );

            ?>
            
            
                <!--Imagen listing-->
                <img class="img-fluid w-100 imagen-listing animatable fadeInUp" src="<?php echo $imgFull[0];?>" alt="<?php the_post_thumbnail_caption( $development->ID );?>">

                <div class="row justify-content-center bg-light animatable fadeInDown">
                    <!--Disponibilidad y tipo-->  
                    <div class="col-12 d-flex justify-content-center mt-2 mb-0">
                        <span class="fs-5 px-2 tr-ptype"><?php tierra_get_property_type($unit->ID, 'property_type'); ?></span>
                        <span class="fs-5 fw-bold ps-3 <?php echo rwmb_meta('avaliable',$args = [], $unit->ID);?>"><?php echo pll_e( rwmb_meta('avaliable',$args = [], $unit->ID) );?></span>
                    </div>

                    <div class="col-12 ">
                        <!--Nombre y Lugar del listing-->
                        <h2 class="fs-1 fw-bold mt-0"><?php echo get_the_title( $unit->ID );?> 
                            <?php tierra_get_list_terms($unit->ID, 'regiones'); ?>  
                        </h2>
                    </div>

                    <div class="col-12">
                        <!--precio y moneda-->
                        <h3 class="fs-1 my-3"><?php echo $unit->currency;?>$<?php echo number_format($unit->price);?></h3>
                    </div>

                
                    <div class="col-12 text-center">
                        <ul class="list-inline fs-4">
                            <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> <?php pll_e( 'Recámaras' );?></li>
                            <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> <?php pll_e( 'Baños' );?></li>
                            <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->construction);?></li>
                        </ul>
                    </div>
                        
                        
                </div>

                <div class="row justify-content-center pb-4 mb-5 bg-light">
                    <div class="col-12 col-md-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-azul btn-lg w-75 mt-3 mt-md-4" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $modalId; ?>"><?php pll_e( 'Vista previa' );?></button>
                    </div>
                    <div class="col-12 col-md-4">         
                        <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn-amarillo btn-lg w-75 mt-3 mt-md-4"><?php pll_e( 'Más info' );?></a>
                    </div>
                </div>
          


             <!-- Modal -->
            <div class="modal fade" id="modal-<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                    
                    <div class="modal-header d-block p-0" style="position:relative;">

                        <h5 class="modal-title fw-bold fs-3" id="exampleModalLabel" style="position:absolute; bottom:20px; left:20px; color:#fff;"><?php echo get_the_title( $unit->ID );?></h5>                    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; top:20px; right:20px; background-color:#fff;"></button>
                        <img srcset="<?php echo $imgMd[0];?> 300w,
                                        <?php echo $imgLg[0];?> 1024w"
                                sizes="(max-width: 480px) 100%,
                                        (max-width: 768px) 100%,
                                        992px"
                                        src="<?php echo $imgFull[0];?>" class="d-block w-100 tr-img-responsive " alt="<?php the_post_thumbnail_caption( $unit->ID );?>">
                    </div>

                    <div class="modal-body mt-1">
                        <div class="row justify-content-center">
                            <h3 class="col-md-4 fs-3"> <i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> <?php pll_e( 'Recámaras' );?></h3>
                            <h3 class="col-md-4 fs-3"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> <?php pll_e( 'Baños' );?></h3>
                            <h3 class="col-md-4 fs-3"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->construction);?> </h3>
                        </div>
                    </div>

                    <div class="modal-footer d-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="fs-5 text-start py-3"><?php the_content($unit->ID);?></div>
                            </div>
                        </div>
                        <div class="row justify-content-evenly">
                            <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal"><?php pll_e('Cerrar'); ?></button>
                            <a href="<?php echo get_the_permalink( $unit->ID );?>" class="col-4 btn btn-amarillo"><?php pll_e( 'Más info' );?></a>
                        </div>
                      
                    </div>

                    </div>
                </div>
            </div>

            <?php 
            $modalId++;
            endforeach; 
        
            // Get the queried object and sanitize it
            $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
            var_dump($current_page );
            // Get the page slug
            $post_slug = $current_page->post_name;
            ?>
            <a class="btn btn-azul" href="<?php echo get_home_url()."/area/".$post_slug;?>"><?php pll_e('Ver Todos');?></a>
            </div>

        <?php endif;?>


                <!--contacto-->
                <div class="container-fluid py-5 animatable fadeInDown">
                    <?php get_template_part( 'partials/content', 'contact-form' ); ?>
                </div>
                
            </div>
        </div>

    <?php   
     the_post();
        

        }

    };

    get_footer();