<?php 

    get_header(); 

    if ( have_posts() ){
        
        while( have_posts() ){ ?>
               
        <!--Imagen con texto-->
        <div class="row">
            <div class="col-12">
                <!--Imagen con texto-->
                <div class="container-fluid " style="position:relative;">
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                    <img class="w-100 img-fluid mb-5 tr-img-responsive" src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title();?>">
                    <div class="caption-bucerias text-center">
                        <h1><?php the_title();?></h1>
                    </div>
                </div>
                <!--Lifestyle-->
                <div class="container-fluid text-center px-5 animatable fadeIn">
                    <div class="row justify-content-center ">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                                <h2 class="fs-1">LIFESTYLE</h2>
                                <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5  ">
                        <div class="container fs-3 mt-2">
                            <p><?php echo the_content();?></p>
                        </div>
                    </div>       
                </div>

                <h3 class="text-center my-5 fs-1 animatable fadeInDown ">Recomendaciones de Restaurantes</h3>

                <!--carrusel restaurantes-->
                <div id="carouselRestas" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">

                    <?php

                        $restaurants = rwmb_meta( 'restaurant_gallery', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $restaurants as $image ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive" src="<?php echo $image['url'];?>">
                                    <div class="carousel-caption d-md-block">
                                        <div><h2 class="fs-1"><?php echo $image['title'];?></h2></div>
                                    </div>
                                </div>
                                

                    <?php   $i++; }?>

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

                <h3 class="text-center px-5 pt-5 pb-2 fs-1 animatable fadeInUp">Recomendaciones de Bares</h3>

                <!--carrusel Bares-->
                <div id="carouselBares" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">


                    <?php

                        $bares = rwmb_meta( 'bars_gallery', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $bares as $bar ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive" src="<?php echo $bar['url'];?>">
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
                <div style="position: relative; text-align: center;" class="container-fluid pt-5 pb-5">
                    <div class="row justify-content-center p-0">

                        <h4 style="font-size: 3.5rem; z-index: 1;" class="texto-encima">Vive en <?php the_title();?></h4>
                        
                        <div id="carouselExampleControls" class="carousel slide p-0" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <?php

                                    $lifestyles = rwmb_meta( 'lifestyle_gallery', array( 'size' => 'large' ) );
                                    $i = 0;
                                        foreach ( $lifestyles as $lifestyle ) { ?>

                                            <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                                <img class="d-block w-100 p-0 tr-img-responsive img-fluid" src="<?php echo $lifestyle['url'];?>">
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
                
                
                <!--Desarrollos>
                <div class="container-fluid text-center mb-5">
                    <h2 class="fs-1 my-5">Desarrollos en <b><?php the_title();?></b> </h2>
                        <div id="carouselDesarrollos" class="carousel slide bg-azul" data-bs-ride="carousel" style="position:relative;">
                        
                            <div class="carousel-inner">
                            
                                <?php

                                    $desarrollos = rwmb_meta( 'lf_desarrollos_gallery', array( 'size' => 'large' ) );
                                    $i = 0;
                                        foreach ( $desarrollos as $image ) { ?>

                                            <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                                
                                            <img class="d-block w-100 tr-img-responsive" src="<?php echo $image['url'];?>">
                                            
                                                <div class="carousel-caption d-md-block">
                                                    <h2 class="fs-1"><?php echo $image['title'];?></h2>
                                                    <p class="fs-5"><?php echo $image['description'];?></p>
                                                </div>
                                            </div>
                        

                                <?php   $i++; }?>

                                
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
                </div-->

                <!--propiedades en esta region-->
                <div class="container-fluid text-center my-5" id="lf-properties">
                
                <?php 
                    $listings = get_posts(array(
                        'post_type' => 'listings',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'regiones',
                                    'field'    => 'slug',
                                    'terms'    => 'bucerias',
                                )
                            )
                        )
                    );
                ?>
                    <h2 class="fs-1 my-5">Propiedades en <b><?php the_title();?></b> </h2>
                      <!--Nuevo y mejorado diseño listings chido-->
        <div class="container-fluid text-center contenedor-listings mt-5">
            <!--listing info-->
 <?php 
 if( $listings ): 
                $modalId = 0;
                ?>
  
            <?php foreach( $listings as $unit ): ?>
                <?php 
            setup_postdata($unit);
            //$photo = get_field('photo', $unit->ID);
            $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );

            ?>
            
            <!--Imagen listing-->
            <img class="img-fluid w-100 imagen-listing" src="<?php echo $portada[0];?>" alt="Listing image">

            <div class="row justify-content-center bg-light">
                <div class="col-12">
                    <!--Nombre y Lugar del listing-->
                    <h2 class="fs-1 fw-bold mt-2"><?php echo get_the_title( $unit->ID );?> 
                        <?php                                          
                            $terms_list = array_reverse(wp_get_post_terms( $unit->ID, 'regiones' ) );

                            $i =1;
                            if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
                                foreach ( $terms_list as $term ) {
                                    echo $term->name;
                                    if( $i < count($terms_list) ){
                                        echo ', ';
                                    }
                                    $i++;
                                }
                            }                                                                                     
                            ?>  
                    </h2>
                </div>
                <div class="col-12">
                    <!--precio y moneda-->
                    <h3 class="fs-1 my-3"><?php echo $unit->currency;?>$<?php echo $unit->price;?></h3>
                </div>
                    <h3 class="col-md-2"> <i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> Recámaras</h3>
                    <h3 class="col-md-2"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> baños</h3>
                    <h3 class="col-md-2"><i class="fas fa-home"></i> <?php echo $unit->construction;?> m<sup>2</sup></h3>
            </div>

            <div class="row justify-content-center pb-4 mb-5 bg-light">
                <div class="col-12 col-md-4">
                    <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn-amarillo btn-lg w-75 mt-3 mt-md-4">Mas info</a>
                </div>
                <div class="col-12 col-md-4">         
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-azul btn-lg w-75 mt-3 mt-md-4" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $modalId; ?>">Vista Previa</button>
                </div>
            </div>

             <!-- Modal -->
            <div class="modal fade" id="modal-<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                    
                    <div class="modal-header d-block p-0" style="position:relative;">

                        <h5 class="modal-title fw-bold fs-3" id="exampleModalLabel" style="position:absolute; bottom:20px; left:20px; color:#fff;"><?php echo get_the_title( $unit->ID );?></h5>                    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; top:20px; right:20px; background-color:#fff;"></button>
                        <img class="img-fluid w-100" src="<?php echo $portada[0];?>" alt="Listing image">
                    </div>

                    <div class="modal-body mt-1">
                        <div class="row justify-content-center">
                            <h3 class="col-md-4 fs-3"> <i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> Recámaras</h3>
                            <h3 class="col-md-4 fs-3"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> baños</h3>
                            <h3 class="col-md-4 fs-3"><i class="fas fa-home"></i> <?php echo $unit->construction;?> m<sup>2</sup></h3>
                        </div>
                    </div>

                    <div class="modal-footer d-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="fs-5 text-start py-3"><?php the_content();?></div>
                            </div>
                        </div>
                        <div class="row justify-content-evenly">
                            <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Cerrar</button>
                            <a href="<?php echo get_the_permalink( $unit->ID );?>" class="col-4 btn btn-amarillo">Mas info</a>
                        </div>
                      
                    </div>

                    </div>
                </div>
            </div>

            <?php 
            $modalId++;
            endforeach; 
            wp_reset_postdata();?>
            
            <?php endif; ?>
        </div>

 
                <!--MAPA-->
                <div class="container-fluid animatable fadeInUp">
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