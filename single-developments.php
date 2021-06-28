<?php get_header(); ?>

<?php if( have_posts() ) : the_post() ?>

<?php while( have_posts() ) : ?>

        <div class="row">
            <div class=col-12>

                <!--Carrusel de imagenes de propiedades-->
        <div id="carouselExampleCaptions" class="carousel slide bg-azul" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">
              
                <div class="carousel-item active">
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/naya.png';?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block text-center">
                        <h1 id="heading-carousel">NAYA</h1>
                        <p class="fs-1">Punta de Mita</p>
                        <p class="fs-1">Desde: $1,200,000 USD</p>
                        <a href="#" class="btn btn-light">Más info</a>
                    </div>
              </div>
  
              <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/susurros_cora.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h1 id="heading-carousel">Susurros del Corazón</h1>
                    <p class="fs-1">Bucerías</p>
                    <p class="fs-1">Desde: $500,000 USD</p>
                    <a href="#" class="btn btn-light">Más info</a>
                </div>
              </div>
  
              <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/green-disctrict.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h1 id="heading-carousel">Green Disctrict</h1>
                    <p class="fs-1">Nuevo Vallarta</p>
                    <p class="fs-1">Desde: $500,000 USD</p>
                    <a href="#" class="btn btn-light">Más info</a>
                </div>
              </div>
  
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
  
          <!--Developments-->
          <div class="container-fluid my-5">
              <div class="d-flex justify-content-center">
                  <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
                  <h3 class="fw-bold py-5">Developments</h3>
                  <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
              </div>
          </div>
  
          
          <div class="container text-center">
              
              <!--Naya-->
              <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/logo-naya.png';?>">
              
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              
                  <div class="carousel-inner">
                    
                      <div class="carousel-item active">
                      <img src="<?php echo get_template_directory_uri() .'/assets/images/naya.png';?>" class="d-block w-100" alt="...">
                    </div>
      
                    <div class="carousel-item">
                      <img src="<?php echo get_template_directory_uri() .'/assets/images/naya.png';?>" class="d-block w-100" alt="...">
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
  
                <h4 class="fs-2 py-4" style="color: #00594E;"><i class="fas fa-map-marker-alt"></i> Punta de Mita, Nayarit</h4>
                <a class="btn btn-amarillo btn-lg">More info</a>
              </div>
  
  
              <div class="container text-center my-5">
                  <!--Susurros del corazon-->
              <img class="img-fluid my-5" src="<?php echo get_template_directory_uri() .'/assets/images/logo-susurros.png';?>">
              
              <div id="carouselSusurros" class="carousel slide" data-bs-ride="carousel">
              
                  <div class="carousel-inner">
                    
                      <div class="carousel-item active">
                      <img src="<?php echo get_template_directory_uri() .'/assets/images/susurros_cora.png';?>" class="d-block w-100" alt="...">
                    </div>
      
                    <div class="carousel-item">
                      <img src="<?php echo get_template_directory_uri() .'/assets/images/susurros_cora.png';?>" class="d-block w-100" alt="...">
                    </div>
      
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselSusurros" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselSusurros" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
  
                <h4 class="fs-2 py-4" style="color: #094277;"><i class="fas fa-map-marker-alt"></i> Punta de Mita, Nayarit</h4>
                <a class="btn btn-amarillo btn-lg">More info</a>
              </div>
  
  
                
              <div class="container text-center mb-5">
                  <!--Green disctricit-->
              <img class="img-fluid my-5" src="<?php echo get_template_directory_uri() .'/assets/images/logo-green-disctrict.jpg';?>">
              
              <div id="carouselGreenDisct" class="carousel slide" data-bs-ride="carousel">
              
                  <div class="carousel-inner">
                    
                      <div class="carousel-item active">
                      <img src="<?php echo get_template_directory_uri() .'/assets/images/green-disctrict.png';?>" class="d-block w-100" alt="...">
                    </div>
      
                    <div class="carousel-item">
                      <img src="<?php echo get_template_directory_uri() .'/assets/images/green-disctrict.png';?>" class="d-block w-100" alt="...">
                    </div>
      
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselGreenDisct" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselGreenDisct" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
  
                <h4 class="fs-2 py-4" style="color: #094277;"><i class="fas fa-map-marker-alt"></i> Nuevo Vallarta, Nayarit</h4>
                <a class="btn btn-amarillo btn-lg">More info</a>
              </div>
                
          
              <div class="container-fluid" style="height: 100vh;">
                  <div id="map"></div>
              </div>
            
            </div>
        </div>

    <?php @endwhile; ?>

<?php @endif;
    get_footer(); 
?>