<?php 
    get_header();

    $developments = get_posts(array(
        'post_type' => 'developments',
        'numberposts' => -1,
        
    ));
    $listings = get_posts(array(
        'post_type' => 'listings',
        'numberposts' => -1,
    ));
    // $listings = get_posts(array(
    //     'post_type' => 'listings',
    //     'numberposts' => -1,
    // ));
?>

        <div class="row">
            <div class="col-12">

            <!--Carrusel de imagenes de propiedades-->
            <div id="carouselFrontPage" class="carousel slide bg-azul" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                   
                    <?php if( $developments ): $i=0; ?>
                     
                    <?php foreach( $developments as $development ): 

                        $profile = wp_get_attachment_image_src( get_post_thumbnail_id( $development->ID ), 'full' );
                        
                        $active='';
                        
                        if($i==0){ $active = ' class="active"';}
                        
                        $indicators .= '<button type="button" data-bs-target="#carouselFrontPage" data-bs-slide-to="'. $i .'"'. $active.'> aria-current="true" aria-label="Slide 1"></button>';
                        
                       ?>
                        <div class="carousel-item<?php if($i==0){echo ' active';}?>">
                            <img src="<?php echo $profile[0];?>" class="d-block w-100 tr-img-responsive" alt="...">
                            <div class="carousel-caption d-md-block text-center">
                                <h1><?php echo get_the_title( $development->ID );?></h1>
                                <p><?php 
        
                                        
                                        $terms_list = array_reverse(wp_get_post_terms( $development->ID, 'regiones' ) );

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

                                        
                                ?> <br>
                                Desde:<br> $<?php echo number_format($development->starting_at);?> <?php echo $development->currency;?></p>
                                <a href="<?php echo get_the_permalink( $development->ID );?>" class="btn btn-light">Más info</a>
                            </div>
                        </div>

                    <?php $i++; endforeach; ?>
                        
                    <?php endif; ?>

                </div>

                <div class="carousel-indicators">
                    <?php echo $indicators;?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselFrontPage" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselFrontPage" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        
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


        <!--video-->
        <div style="padding:0 ;position:relative;">
        <video width="100%" height="auto" autoplay loop controls>
        <source src="<?php echo get_template_directory_uri() .'/assets/videos/mar_comprimido-5MB.mp4';?>" type="video/mp4">
        Your browser does not support the video tag.
        </video>
        </div>

       <!--contacto-->
       <div class="container-fluid py-5">
           <?php get_template_part( 'partials/content', 'contact-form' ); ?>
           
       </div>

                
        </div><!--Col-12-->
    </div><!--row-->
<?php get_footer(); ?>