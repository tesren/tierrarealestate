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
                <div class="container-fluid text-center px-5">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="icon-size d-flex justify-content-center">
                                <img class="" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
                                <h2 class="">LIFESTYLE</h2>
                                <img class="" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="fs-3 mt-2 mx-4">
                            <p><?php echo the_content();?></p>
                        </div>
                    </div>       
                </div>

                <h3 class="text-center my-5 fs-1">Recomendaciones de Restaurantes</h3>

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

                <h3 class="text-center px-5 pt-5 pb-2 fs-1">Recomendaciones de Bares</h3>

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
                    <div class="row justify-content-center">

                        <h4 style="font-size: 3.5rem; z-index: 1;" class="texto-encima">Vive en <?php the_title();?></h4>
                        
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

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

                <!--propiedades en esta region>
                <div class="container-fluid text-center my-5" id="lf-properties">
                    <h2 class="fs-1 my-5">Propiedades en <b><?php the_title();?></b> </h2>
                    <div class="row justify-content-evenly">
                        
                        <div class="col-md-6">
                            
                            <div class="card text-start" style="position:relative;">
                                <img class="img-fluid" src = "<?php echo get_template_directory_uri() .'/assets/images/casa-izma.jpg';?>">
                                    
                                <div class="lf-properties-caption">
                                    <div class = "row justify-content-start">
                                        <h3 class="col-6"> Casa Lavanda </h3>
                                    </div>
                                    <div class = "row justify-content-start">
                                        <p class="col-10"> $500,000 | 2 recámaras | 192 m2</p>
                                    </div>
                                    <div class = "row justify-content-between ps-3 pe-5">
                                        <a class="col-2 btn btn-dark"> Casa </a>
                                        <a class="col-2 btn btn-amarillo">Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div--> 

                <!--MAPA-->
                <div class="container-fluid">
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
                
            </div>
        </div>

    <?php   
     the_post();
        

        }

    };

    get_footer();