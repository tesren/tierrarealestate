<?php 

    get_header(); 

    if ( have_posts() ){
        
        while( have_posts() ){ ?>

        <!--Imagen con texto-->
      <div class="container-fluid " style="position:relative;">
        <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                  <img width="100%" class="img-fluid tr-img-responsive"  src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title();?>">
                  <div class="caption-naya text-center">
                      <h1 id="naya"><?php the_title();?></h1>
                      <p class="fs-3"> <?php 
            
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
                      ?> <br> Desde: <?php echo rwmb_meta( 'currency' );?> $ <?php echo rwmb_meta( 'starting_at' ); ?> 
                      </p>
                  </div>
      </div>

        <!--Acerca del proyecto-->
        <div class="container text-center p-5">

            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                <h2 class="fw-bold fs-1">Acerca del proyecto</h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            </div>

            <div class="fs-3 py-5">
              <p><?php echo the_content();?></p>
            </div>      

        </div>

        <!--Propiedades-->
        <div class="container-fluid text-center" id="propiedades">
            
            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                <h2 class="fw-bold fs-1">Propiedades</h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            </div>

            <div class="row">
            <?php 
            
                    $residences = rwmb_meta( 'residences_gallery', array( 'size' => 'full' ) ); 
                    
                    $total = count($residences);
                    
                    switch($total)
                    {
                        case 1:
                            
                            foreach ( $residences as $residence ) { ?>

                                <div class="col-md-12">
                                    <img class="img-fluid w-100" src="<?php echo $residence['url'];?>">
                                    <h3><?php echo $residence['title'];?></h3>
                                    <hr class="linea-grande">
                                </div>
                            
                            <?php
                            }

                            break;

                        case 2:
                            foreach ( $residences as $residence ) { ?>

                                <div class="col-md-6">
                                    <img class="img-fluid w-100" src="<?php echo $residence['url'];?>">
                                    <h3><?php echo $residence['title'];?></h3>
                                    <hr class="lineas">
                                </div>
                            
                            <?php
                            }
                        break;
                       
                        case 3:
                            foreach ( $residences as $residence ) { ?>

                                <div class="col-md-4">
                                    <img class="img-fluid w-100" src="<?php echo $residence['url'];?>">
                                    <h3><?php echo $residence['title'];?></h3>
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
                                    <h3><?php echo $residence['title'];?></h3>
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
                      <div class="card">
                          <img src="<?php echo $portada[0];?>" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title fw-bold"> <?php echo get_the_title( $unit->ID );?></h5>
                              <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li><?php echo $unit->bedrooms;?> recámaras</li>
                                      <li><?php echo $unit->bathrooms;?> baños</li>
                                      <li><?php echo $unit->half_baths;?> medios baños</li>
                                      <li><?php echo $unit->construction;?> m<sup>2</sup></li>
                                  </ul>        
                              </p>
                              <h5 class="card-title fw-bold">Desde <?php echo $unit->currency;?>$<?php echo number_format($unit->starting_at);?></h5>
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


        
        <!--foto destacada-->
        <?php          $ft_photos = rwmb_meta( 'featured_img_2', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $ft_photos as $ft_photo ) { ?>

          <img class="img-fluid w-100" src="<?php echo $ft_photo[ 'url' ];?>" alt="<?php echo $ft_photo[ 'title' ];?>">
        <?php     $i++; }?>

       <!--Carrusel de amenidades-->
        <div class="d-flex justify-content-center mt-5 mb-3">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            <h2 class="fw-bold fs-1 text-center ">Amenidades</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
        </div>
        
        <div id="carouselAmenidades" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                    <?php

                        $amenities = rwmb_meta( 'amenities_gallery', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $amenities as $amenitie ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive" src="<?php echo $amenitie['url'];?>">
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
            <h2 class="fw-bold fs-1 text-center ">Mas fotos</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
        </div>
        
        <div id="carouselMasFotos" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                    <?php

                        $masfotos = rwmb_meta( 'more_photos', array( 'size' => 'large' ) );
                        $i = 0;
                            foreach ( $masfotos as $foto ) { ?>

                                <div class="carousel-item<?php if($i==0){echo ' active';} ?>  ">
                                    <img class="d-block w-100 tr-img-responsive" src="<?php echo $foto['url'];?>" alt="<?php echo $foto['title'];?>">
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
            <h2 class="fw-bold fs-1 text-center "> Mapa</h2>
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
       <div class="container-fluid py-5">
        <div class="row">

               <div class="col-sm-6 order-sm-1 bg-azul text-start animatable fadeInUp" id="texto-formulario">
                    <h3 class="fs-1">Por favor sientase libre de contactarnos por medio de nuestro formulario de contacto o por nuestros numeros de teléfono</h3>
                </div>
            
             <!--formulario-->
             <div class="col-sm-6 order-sm-12 animatable fadeInDown">
                 <h1 class="pt-3 px-3">Formulario de contacto</h1>
                 <form action="#" class="text-start px-3" method="POST">
                        <div class="form-floating mb-3">
                            <h4 class="labels-form-grande">Nombre</h4>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                            <label class="labels-form-small" for="floatingInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <h4 class="labels-form-grande">Correo electrónico</h4>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com" required>
                            <label class="labels-form-small" for="floatingInput">Correo electrónico</label>
                        </div>

                        <div class="form-floating mb-3">
                            <h4 class="labels-form-grande">Teléfono</h4>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="322 555 5555" required>
                            <label class="labels-form-small" for="floatingInput">Teléfono</label>
                        </div>

                        <div class="form-floating mb-3">
                            <h4 class="labels-form-grande">Mensaje</h4>
                            <textarea class="form-control" placeholder="Mensaje" id="mensaje" name="mensaje" style="height: 150px" required></textarea>
                            <label class="labels-form-small" for="floatingTextarea2">Mensaje</label>
                        </div>

                        
                        <button type="submit" class="btn btn-amarillo">Submit</button>

                    </form>
             </div>

        </div>
       </div>

        <?php   
      the_post();
        

        }

    };

    get_footer();