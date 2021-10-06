<?php 
    get_header();

    $developments = get_posts(array(
        'post_type' => 'developments',
        'numberposts' => -1,
        'meta_query'=> array(
            array(
                'key' => 'featured_development',
                'compare' => '=',
                'value' => 1,
            )
    ),

        
    ));
    $listings = get_posts(array(
        'post_type' => 'listings',
        'numberposts' => -1,
        'meta_query'=> array(
            array(
                'key' => 'featured_listing',
                'compare' => '=',
                'value' => 1,
            )
        ),
    ));
?>

        <div class="row">
            <div class="col-12 p-0">

            <!--Carrusel de imagenes de propiedades-->
            <div id="carouselFrontPage" class="carousel slide bg-azul" data-bs-ride="carousel">
                    <div class="fondo-oscuro"></div>
                    <div class="carousel-inner">
                   
                        <?php if( $developments ): $i=0; ?>
                        
                        <?php foreach( $developments as $development ): 

                            $profile = wp_get_attachment_image_src( get_post_thumbnail_id( $development->ID ), 'full' );
                            
                            $profileLg = wp_get_attachment_image_src( get_post_thumbnail_id( $development->ID ), 'large' );

                            $profileMd = wp_get_attachment_image_src( get_post_thumbnail_id( $development->ID ), 'medium' );
                            
                            $active='';
                            
                            if($i==0){ $active = ' class="active"';}
                            
                            $indicators .= '<button type="button" data-bs-target="#carouselFrontPage" data-bs-slide-to="'. $i .'"'. $active.' aria-current="true" aria-label="Slide 1"></button>';
                            
                        ?>
                            <div class="carousel-item<?php if($i==0){echo ' active';}?>">
                                <img srcset="<?php echo $profileMd[0];?> 300w,
                                        <?php echo $profileLg[0];?> 1024w"
                                sizes="(max-width: 480px) 100%,
                                        (max-width: 768px) 100%,
                                        992px"
                                        src="<?php echo $profile[0];?>" class="d-block w-100 tr-img-responsive " alt="<?php the_post_thumbnail_caption( $development->ID );?>">
                                
                                <div class="carousel-caption d-md-block text-center" style="z-index:3;">
                                    <h1><?php echo get_the_title( $development->ID );?></h1>
                                    <p><?php tierra_get_list_terms($development->ID, 'regiones');?> <br>
                                    <?php pll_e( 'Precios Desde' );?> :<br> <?php echo $development->currency;?> $<?php echo number_format($development->starting_at);?> </p>
                                    <a href="<?php echo get_the_permalink( $development->ID );?>" class="btn btn-light"><?php pll_e( 'Más info' );?></a>
                                </div>
                            </div>

                        <?php $i++; endforeach; ?>
                            
                        <?php endif; ?>
                    </div>
                

                <div class="carousel-indicators">
                    <?php echo $indicators;?>
                </div>
                <button class="carousel-control-prev" style="z-index:3;" type="button" data-bs-target="#carouselFrontPage" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="z-index:3;" type="button" data-bs-target="#carouselFrontPage" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        
        <!--Nuevo y mejorado diseño listings chido-->
        
        <div class="container-fluid text-center contenedor-listings mt-5 px-1 ">
            <!--listing info-->
            <?php 
            if( $listings ): 
                $modalId = 0;
                ?>
  
            <?php foreach( $listings as $unit ): 
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
                        <h3 itemprop="price" class="fs-1 my-3"><?php echo $unit->currency;?>$<?php echo number_format($unit->price);?></h3>
                    </div>

                    <div class="col-12 text-center">
                        <ul class="list-inline fs-4">
                            <?php if( !empty($unit->bedrooms) ): ?>
                                <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> <?php pll_e( 'Recámaras' );?></li>
                            <?php endif;?>

                            <?php if( !empty($unit->bathrooms) ): ?>
                                <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> <?php pll_e( 'Baños' );?></li>
                            <?php endif;?>

                            <?php if( !empty($unit->construction) ): ?>
                                <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->construction);?></li>
                            <?php else:?>
                                    <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->lot_area);?></li>
                            <?php endif;?>
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
                        <img src="<?php echo $imgFull[0];?>" class="d-block w-100 tr-img-responsive " alt="<?php the_post_thumbnail_caption( $unit->ID );?>">
                    </div>

                    <div class="modal-body mt-1">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <ul class="list-inline fs-4">
                                    <?php if( !empty($unit->bedrooms) ): ?>
                                        <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> <?php pll_e( 'Recámaras' );?></li>
                                    <?php endif;?>

                                    <?php if( !empty($unit->bathrooms) ): ?>
                                        <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> <?php pll_e( 'Baños' );?></li>
                                    <?php endif;?>

                                    <?php if( !empty($unit->construction) ): ?>
                                        <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->construction);?></li>
                                    <?php else:?>
                                        <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->lot_area);?></li>
                                    <?php endif;?>
                                </ul>
                            </div>
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
                            <a href="<?php echo get_the_permalink( $unit->ID );?>" class="col-4 btn btn-amarillo "><?php pll_e( 'Más info' );?></a>
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


        <!--video-->
        <div style="padding:0 ;position:relative;" class="">
            <video width="100%" height="auto" autoplay loop controls>
                <source src="<?php echo get_template_directory_uri() .'/assets/videos/mar_comprimido-5MB.mp4';?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

       <!--contacto-->
       <div class="container-fluid py-5 animatable fadeInUp">


           <?php get_template_part( 'partials/content', 'contact-form' ); ?>
           
       </div>

                
        </div><!--Col-12-->
    </div><!--row-->
<?php get_footer(); ?>