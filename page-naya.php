<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>

 <!--Imagen con texto-->
 <div class="container-fluid " style="position:relative;">
            <img class="img-fluid tr-img-responsive"  src="<?php echo get_template_directory_uri() .'/assets/images/naya.jpg';?>" alt="Render de una propiedad en Naya">
            <div class="caption-naya text-center">
                <h1 id="naya">NAYA</h1>
                <p class="fs-3">Punta de Mita <br> Desde: $1,200,000 USD </p>
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
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/panoramic.jpg';?>">
                    <h3>Residencias con vista panoramica</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-4">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/ocean_view.jpg';?>">
                    <h3>Residencias con vista al mar</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-4">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/ocean_front.jpg';?>">
                    <h3>Residencias frente al mar</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-12">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/beach_front.jpg';?>">
                    <h3>Residencias frente a la playa</h3>
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
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/planos-cafes.png';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Residencias con vistas panorámicas</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>3 habitaciones</li>
                                      <li>340m2</li>
                                      <li>3-4 pisos</li>
                                      <li>2 unidades por piso</li>
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
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/planos-verdes.png';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Residencias con vista al mar</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>4 habitaciones</li>
                                      <li>420m2</li>
                                      <li>4 pisos</li>
                                      <li>2 unidades por piso</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">Desde 1,600,000</h5>
                              </div>
                          </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          <div class="col-md-3">

                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/planos-cafes.png';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <h5 class="card-title fw-bold">Residencias frente a la playa</h5>
                                  <p class="card-text">
                                    <ul class="list-unstyled">
                                        <li>4 habitaciones</li>
                                        <li>420m2</li>
                                        <li>4 pisos</li>
                                        <li>2 unidades por piso</li>
                                    </ul>        
                                    </p>
                                    <h5 class="card-title fw-bold">Desde 1,700,000</h5>
                                </div>
                            </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          
                        <div class="col-md-3">
                          <div class="card">
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/planos-verdes.png';?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title fw-bold">Residencias con vistas panorámicas</h5>
                              <p class="card-text">
                                <ul class="list-unstyled">
                                    <li>3 habitaciones</li>
                                    <li>340m2</li>
                                    <li>3-4 pisos</li>
                                    <li>2 unidades por piso</li>
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
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/planos-cafes.png';?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title fw-bold">Residencias con vistas panorámicas</h5>
                              <p class="card-text">
                                <ul class="list-unstyled">
                                    <li>3 habitaciones</li>
                                    <li>340m2</li>
                                    <li>3-4 pisos</li>
                                    <li>2 unidades por piso</li>
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
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/planos-verdes.png';?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title fw-bold">Residencias con vistas panorámicas</h5>
                              <p class="card-text">
                                <ul class="list-unstyled">
                                    <li>3 habitaciones</li>
                                    <li>340m2</li>
                                    <li>3-4 pisos</li>
                                    <li>2 unidades por piso</li>
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
        <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/air-view.jpg';?>">
        <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/naya-map.png';?>">

       <!--Carrusel de amenidades-->
        <div class="d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            <h2 class="fw-bold my-5 text-center">Amenidades</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
        </div>
        
        <div id="carouselExampleCaptions" class="carousel  slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" id="amenidades">
              <div class="carousel-item active">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/gym.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  <h5 class="fs-1">Gym</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/ludoteca.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  <h5 class="fs-1">Ludoteca</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/beach-club-render.png';?>" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  <h5 class="fs-1">Beach Club</h5>
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
        <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/naya-experiencies.jpg';?>">
        <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/beach-club.jpg';?>">
        <div class="d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            <h2 class="fw-bold my-5 text-center"> Mapa</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
        </div>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.1273795952334!2d-105.4284355613184!3d20.745630583557578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5bbd93a3045f0f20!2sNAYA%20Punta%20de%20Mita!5e0!3m2!1ses-419!2smx!4v1623794028686!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

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

<?php get_footer(); ?>