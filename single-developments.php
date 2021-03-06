<?php 

    get_header(); 

    if ( have_posts() ){
        
        while( have_posts() ){ ?>

        <!--Imagen con texto-->
      <div class="container-fluid " style="position:relative;">
      <div class="fondo-oscuro"></div>

        <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

        $backgroundLg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

        $backgroundMd = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );?>
        

                  <img width="100%" class="img-fluid tr-img-responsive"  
                                srcset="<?php echo $backgroundMd[0];?> 300w,
                                        <?php echo $backgroundLg[0];?> 1024w"
                                sizes="(max-width: 480px) 100%,
                                        (max-width: 768px) 100%,
                                        992px" src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title();?>">
                  
                  <div class="caption-naya text-center">
                      <h1 id="naya" style="z-index:3;"><?php the_title();?></h1>
                      <p class="fs-2" style="z-index:3;"> <?php 
            
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
                      ?> <br> <?php pll_e( 'Precios Desde' );?> : <?php echo rwmb_meta( 'currency' );?> $ <?php echo number_format(rwmb_meta( 'starting_at' )); ?> 
                        
                      </p>
                  </div>
      </div>

        <!--Acerca del proyecto-->
        <div class="container text-center p-5">

            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                <h2 class="fw-bold fs-1 animatable fadeInUp"><?php pll_e( 'Acerca del proyecto' );?></h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            </div>

            <div class="fs-3 py-5 animatable fadeInDown">
              <p><?php echo the_content();?></p>
            </div>      

        </div>


        <?php
            $residences = rwmb_meta( 'residences_gallery', array( 'size' => 'full' ) ); 
            if($residences):
        ?>

        <!--Propiedades-->
        <div class="container-fluid text-center" id="propiedades">
            
            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                <h2 class="fw-bold fs-1 animatable fadeInDown"><?php pll_e( 'Propiedades' );?></h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            </div>

            <div class="row">
                <?php 
                                
                    $total = count($residences);
                    
                    switch($total)
                    {
                        case 1:
                            
                            foreach ( $residences as $residence ) { 

                                $residence = wp_get_attachment_image_src( get_post_thumbnail_id($residence->ID), 'full' );

                                $residenceLg = wp_get_attachment_image_src( get_post_thumbnail_id( $residence->ID ), 'large' );

                                $residenceMd = wp_get_attachment_image_src( get_post_thumbnail_id( $residence->ID ), 'medium' );?>

                                <div class="col-md-12">

                                    <img class="img-fluid w-100"  src="<?php echo $residence['url'];?>">
                                    <h3 class="animatable fadeInDown"><?php echo $residence['title'];?></h3>
                                    <hr class="linea-grande">
                                </div>
                            
                            <?php
                            }

                            break;

                        case 2:
                            foreach ( $residences as $residence ) { ?>

                                <div class="col-md-6">
                                    <img class="img-fluid w-100" src="<?php echo $residence['url'];?>">
                                    <h3 class="animatable fadeInDown"><?php echo $residence['title'];?></h3>
                                    <hr class="lineas">
                                </div>
                            
                            <?php
                            }
                        break;
                       
                        case 3:
                            foreach ( $residences as $residence ) { ?>

                                <div class="col-md-4">
                                    <img class="img-fluid w-100" src="<?php echo $residence['url'];?>">
                                    <h3 class="animatable fadeInDown"><?php echo $residence['title'];?></h3>
                                    <hr class="lineas">
                                </div>
        
                            <?php
                            }
                        break;
                        
                        case 4:
                            $i=0;
                            foreach ( $residences as $residence ) {   ?>

                                <div class="col-md-<?php if($i==3){echo '12';}else{echo '4';} ?>">
                                    <img class="img-fluid w-100" src="<?php echo $residence['url'];?>">
                                    <h3 class="animatable fadeInDown"><?php echo $residence['title'];?></h3>
                                    <hr class="<?php if($i==3){echo 'linea-grande';}else{echo 'lineas';} ?>">
                                </div>
        
                            <?php 
                            $i++;}
                        break;

                    }

                   // echo $total;
            ?>

            </div>
        </div>

        <!--carrusel de cards de propiedades-->

        <div class="container-fluid text-center my-5">

            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    
                <div class="carousel-inner" role="listbox">


                <?php 

                    /*
                    *  Query posts for a relationship value.
                    *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
                    */

                    $units = get_posts(array(
                        'post_type' => 'inventory',
                        'meta_query' => array(
                            array(
                                'key' => 'developments', // name of custom field
                                'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                                'compare' => 'LIKE'
                            )
                        )
                    ));

                ?>
                <?php if( $units ): ?>
                    <?php $i=1;?>
                    <?php foreach( $units as $unit ): ?>
                        <?php 

                    
                        $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );

                        ?>
                        <div class="carousel-item<?php if($i==1){echo ' active';}?>">
                            <div class="col-md-3">
                                <div class="card" style="min-height:100%;">
                                    <img src="<?php echo $portada[0];?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold"> <?php echo get_the_title( $unit->ID );?></h5>
                                        <p class="card-text">
                                            <ul class="list-unstyled">
                                                <li><?php echo $unit->bedrooms;?> <?php pll_e( 'Rec??maras' );?></li>
                                                <li><?php echo $unit->bathrooms;?> <?php pll_e( 'ba??os' );?></li>
                                                <li><?php echo $unit->half_baths;?> <?php pll_e( 'Medios Ba??os' );?></li>
                                                <li><?php echo  tierra_get_sqft(pll_current_language(),$unit->construction);?> </li>
                                            </ul>        
                                        </p>
                                        <?php if( !empty($unit->starting_at)):?>
                                            <h5 class="card-title fw-bold"><?php pll_e( 'Precios Desde' );?> <?php echo $unit->currency;?>$<?php echo number_format($unit->starting_at);?></h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    
                <?php endif; ?>
            
            </div>

            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
            </div>
        </div>
    </div>

    <?php endif; ?>
    
            <div class="container text-center">
                <?php if( !empty(rwmb_meta( 'dev_brochure') ) ): 
                    $files = rwmb_meta( 'dev_brochure' );
                    foreach ( $files as $file ):?>
                        <a href="<?php echo $file['url']; ?>" class="mt-2 mb-5 mt-md-4 mb-md-5 mx-5 btn btn-azul w-50" target="_blank" rel="noopener"><?php pll_e( 'Descargar Brochure' );?></a>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        
        <!--foto destacada-->
        <?php          $ft_photos = rwmb_meta( 'featured_img_2', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $ft_photos as $ft_photo ) { ?>

          <img class="img-fluid w-100" src="<?php echo $ft_photo[ 'url' ];?>" alt="<?php echo $ft_photo[ 'title' ];?>">
        <?php     $i++; }?>

       <!--Carrusel de amenidades-->
        <div class="d-flex justify-content-center mt-5 mb-3">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            <h2 class="fw-bold fs-1 text-center animatable fadeInDown"><?php pll_e( 'Amenidades' );?></h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
        </div>
        
        <div id="carouselAmenidades" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                    <?php

                        $amenities = rwmb_meta( 'amenities_gallery', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $amenities as $amenitie ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive carousel-img-sizing" src="<?php echo $amenitie['url'];?>">
                                    <div class="carousel-caption d-md-block">
                                        <h2 class="fs-1"><?php echo $amenitie['title'];?></h2>
                                    </div>
                                </div>
                                

                    <?php     $i++; }?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAmenidades" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselAmenidades" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>

       
          <!--CARRUSEL mas fotos-->
        <div class="d-flex justify-content-center mt-5 mb-3">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            <h2 class="fw-bold fs-1 text-center animatable fadeInDown"><?php pll_e( 'Master Plan' );?></h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
        </div>
        
        <div id="carouselMasFotos" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                    <?php

                        $masfotos = rwmb_meta( 'more_photos', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $masfotos as $foto ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 carousel-img-sizing" src="<?php echo $foto['url'];?>" alt="<?php echo $foto['title'];?>">
                                </div>
                                

                    <?php     $i++; }?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMasFotos" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselMasFotos" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>
       
       
        <div class="d-flex justify-content-center mt-5 mb-3">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            <h2 class="fw-bold fs-1 text-center "> <?php pll_e( 'Ubicaci??n' );?></h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
        </div>

        <!--MAPA google-->
        <div class="container-fluid animatable fadeIn">
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
                    
                    echo rwmb_meta( 'development_map', $args );
                    ?>
                    </div>
                </div>
        
        <!--contacto-->
       <div class="container-fluid py-5 animatable fadeInUp">
           <?php get_template_part( 'partials/content', 'contact-form' ); ?>
       </div>

        <?php   
      the_post();
        

        }

    };

    get_footer();