<?php 
    get_header(); 

    if ( have_posts() ){
        
        while( have_posts() ){ ?>
               
<!--Imagen con texto-->
<div class="row">
    <div class="col-12">
        <!--Imagen con texto-->
        <div class="container-fluid " style="position:relative;">
            <img class="img-fluid mb-5 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/bucerias.jpg';?>" alt="Bucerias ">
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
                <p class="fs-3 mt-2 mx-4"><?php echo rwmb_meta( 'place_description' );?></p>
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
                                <a class="btn btn-primary"><h2 class="fs-1"><?php echo $image['title'];?></h2></a>
                            </div>
                        </div>
                        

            <?php     $i++; }

            ?>

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

        <h3 class="text-center px-5 pt-5 pb-2 fs-1">Recomendaciones de BARES</h3>

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
                                <a class="btn btn-primary"><h2 class="fs-1"><?php echo $bar['title'];?></h2></a>
                            </div>
                        </div>
                        

            <?php     $i++; }

            ?>


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

                <h4 style="font-size: 3.5rem; z-index: 1;" class="texto-encima">VIVE EN BUCERIAS</h4>
                
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/vive-bucerias.jpg';?>" class="p-0 tr-img-responsive img-fluid" alt="vive en">    
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/snorkel.jpg';?>" class="p-0 tr-img-responsive img-fluid" alt="vive en">
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
        </div>

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
    
    the_content();
            }
            
        }


 get_footer(); ?>