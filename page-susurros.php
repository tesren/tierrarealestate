<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>

    <div class="row">
        <div class="col-12">

              <!--Imagen con texto-->
        <div class="container-fluid " style="position:relative;">
            <img width="100%" class="img-fluid tr-img-responsive"  src="<?php echo get_template_directory_uri() .'/assets/images/susurros_cora.jpg';?>" alt="Render de una propiedad en Naya">
            <div class="caption-susurros text-center">
                <h1>Susurros del corazón</h1>
                <p class="fs-3">Punta de Mita <br> Desde: $500,000 USD </p>
            </div>
        </div>

        <!--Acerca del proyecto-->
        <div class="container text-center p-5">
            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
                <h2 class="fw-bold py-5">Acerca del proyecto</h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            </div>

            <p class="fs-3 py-5">NAYA está diseñado para adaptarse y celebrar la privacidad y las maravillas de la selva en la que se inspira, 
                su materialidad imita el entorno natural, coexistiendo en armonía con ellos. Un hábitat de espacios sofisticados 
                diseñados que se pueden experimentar a través de nuestros sentidos humanos.</p>        
            
        </div>

        <!--Propiedades-->
        <div class="container-fluid text-center" id="propiedades">
            
            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
                <h2 class="fw-bold py-5">Propiedades</h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            </div>
            
            <div class="row">
                
                <div class="col-md-4">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/beach-casitas.jpg';?>">
                    <h3>Beach casitas</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-4">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/presidential.png';?>">
                    <h3>Presidential</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-4">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/hacienda_villas.jpg';?>">
                    <h3>Hacienda Villas</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-12">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/ocean-villas.jpg';?>">
                    <h3>Ocean Bluff Villas</h3>
                    <hr class="linea-grande">
                </div>
            </div>
        </div>

        <!--carrusel de cards de propiedades-->
        <div class="container-fluid text-center my-5">
          <div class="row mx-auto my-auto justify-content-center">
              <div id="recipeCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel">
                  
                <div class="carousel-inner" role="listbox">
                      
                    <div class="carousel-item active">
                          
                      <div class="col-md-3">
                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/ocean-villas.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Quetzal 3 - Bluff Villa</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>4 habitaciones</li>
                                      <li>5590 SF</li>
                                      <li>2 pisos</li>
                                      <li>2 unidades por piso</li>
                                      <li>4.5 baños</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">Desde 1,200,000</h5>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          
                        <div class="col-md-3">
                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/ocean-villas.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Rio 4 - Bluff Villa</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>4 habitaciones</li>
                                      <li>5590 SF</li>
                                      <li>2 pisos</li>
                                      <li>2 unidades por piso</li>
                                      <li>4.5 baños</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">Desde 1,200,000</h5>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          
                        <div class="col-md-3">
                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/hacienda_villas.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Rio 4 - Bluff Villa</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>4 habitaciones</li>
                                      <li>5590 SF</li>
                                      <li>2 pisos</li>
                                      <li>2 unidades por piso</li>
                                      <li>4.5 baños</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">Desde 1,200,000</h5>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          
                        <div class="col-md-3">
                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/presidential.png';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Quetzal 3 - Bluff Villa</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>4 habitaciones</li>
                                      <li>5590 SF</li>
                                      <li>2 pisos</li>
                                      <li>2 unidades por piso</li>
                                      <li>4.5 baños</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">Desde 1,200,000</h5>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          
                        <div class="col-md-3">
                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/beach-casitas.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Rio 4 - Bluff Villa</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>4 habitaciones</li>
                                      <li>5590 SF</li>
                                      <li>2 pisos</li>
                                      <li>2 unidades por piso</li>
                                      <li>4.5 baños</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">Desde 1,200,000</h5>
                              </div>
                            </div>
                          </div>
                      </div>

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

        
        <!--fotos y mapas-->
        <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/susurros_cora.jpg';?>">
        

       <!--Carrusel de amenidades-->
        <div class="d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            <h2 class="fw-bold my-5 text-center">Amenidades</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
        </div>
        
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" id="amenidades">
              <div class="carousel-item active">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/pool-susurros.jpg';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  <h5 class="fs-1">Alberca</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/yoga-susurros.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  <h5 class="fs-1">Yoga</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/spa-susurros.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  <h5 class="fs-1">Spa</h5>
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

        <!-- mas fotos y mapas-->
        <div class="d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            <h2 class="fw-bold my-5 text-center"> Mapa</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
        </div>
        <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/mapa-susurros.jpg';?>">

        <div class="container-fluid text-start">
            <div class="row justify-content-center p-5">
          
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/one.svg';?>"> Spa</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/two.svg';?>"> Gym</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/three.svg';?>"> Lobby</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/four.svg';?>"> Cabañas</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/five.svg';?>"> Albercas</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/six.svg';?>"> The living room</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/seven.svg';?>"> The taquería</p>
                </div>
      
                <div class="col-6 col-md-4 amenities-green">
                  <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/eight.svg';?>"> Kids club</p>
                </div>

                <div class="col-6 col-md-4 amenities-green">
                    <p class="fs-1"><img class="yellow-numbers" src="<?php echo get_template_directory_uri() .'/assets/images/nine.svg';?>"> Restaurante</p>
                  </div>
      
              </div>
        </div>
        

        <div class="d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            <h2 class="fw-bold my-5 text-center"> Ubicación</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
        </div>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3730.772139195482!2d-105.47847788512115!3d20.76002768614454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84216b889f3fdf47%3A0xcddbdbbcf4e103b7!2ssusurros%20del%20coraz%C3%B3n!5e0!3m2!1ses-419!2smx!4v1624030124929!5m2!1ses-419!2smx" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        <!--contacto-->
       <div class="container-fluid py-5">
        <div class="row">

                <div class="col-sm-6 order-sm-1 bg-azul text-start" id="texto-formulario">
                    <h3 class="fs-1">Por favor sientase libre de contactarnos por medio de nuestro formulario de contacto o por nuestros numeros de teléfono</h3>
                </div>
            
             <!--formulario-->
             <div class="col-sm-6 order-sm-12">
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

        </div>
    </div>  

<?php get_footer(); ?>