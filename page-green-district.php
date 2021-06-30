<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>

 <!--Imagen con texto-->
 <div class="container-fluid " style="position:relative;">
            <img width="100%" class="img-fluid tr-img-responsive"  src="<?php echo get_template_directory_uri() .'/assets/images/green-disctrict.jpg';?>" alt="...">
            <div class="caption-green-d text-center">
                <h1 id="green-d">Green District</h1>
                <p class="fs-3">Nuevo Vallarta <br> Desde MXN$2,588,735 <br> hasta MXN$6,667,789 </p>
            </div>
        </div>

        <!--Acerca del proyecto-->
        <div class="container text-center p-5">
            <div class="d-flex justify-content-center">
                <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
                <h2 class="fw-bold fs-1">Acerca del proyecto</h2>
                <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>">
            </div>

            <p class="fs-3 py-5">Ki Green District, abre sus puertas para que descubras tu
                                vínculo con la naturaleza a través de una perfecta
                                combinación entre la arquitectura y paisajismo.
                                Situado en el corazón de la Riviera de Nayarit, el desarrollo
                                te ofrece amenidades espectaculares dentro de un
                                entorno rodeado de naturaleza y tranquilidad.</p> 
        </div>

        <!--Propiedades-->
        <div class="container-fluid text-center" id="propiedades">
            
            <div class="d-flex justify-content-center">
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                <h2 class="fw-bold fs-1">Propiedades</h2>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            </div>
            
            <div class="row">
                
                <div class="col-md-4">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/torre100.jpg';?>">
                    <h3 class="torres-title">Torre 100</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-4">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/torre200.jpg';?>">
                    <h3 class="torres-title">Torre 200</h3>
                    <hr class="lineas">
                </div>

                <div class="col-md-4">
                    <img width="100%" class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/torre39.jpg';?>">
                    <h3 class="torres-title">Torre 3-9 <br> Preventa Julio 2021</h3>
                    <hr class="lineas">
                </div>

            </div>
        </div>

        <!--carrusel de cards de propiedades>
        <div class="container-fluid text-center my-5">
          <div class="row mx-auto my-auto justify-content-center">
              <div id="recipeCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel">
                  
                <div class="carousel-inner" role="listbox">
                      
                    <div class="carousel-item active">
                          
                      <div class="col-md-3">
                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/tipo-a.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">Tipo A</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>1 habitacion</li>
                                      <li>54.5m2</li>
                                      <li>1 baño</li>
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">$2,588,735</h5>
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          
                        <div class="col-md-3">
                          <div class="card">
                            <img src="<?php echo get_template_directory_uri() .'/assets/images/tipo-b.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title fw-bold">TIPO B</h5>
                                <p class="card-text">
                                  <ul class="list-unstyled">
                                      <li>2 habitaciones</li>
                                      <li>72.15 m2</li>
                                      <li>2 Baños</li>
                                      
                                  </ul>        
                                  </p>
                                  <h5 class="card-title fw-bold">TODOS VENDIDOS</h5>
                              </div>
                          </div>
                          </div>
                      </div>

                      <div class="carousel-item">
                          <div class="col-md-3">

                            <div class="card">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/tipo-c.jpg';?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <h5 class="card-title fw-bold">Tipo C</h5>
                                  <p class="card-text">
                                    <ul class="list-unstyled">
                                        <li>2 habitaciones</li>
                                        <li>82.5m2</li>
                                        <li>2 Baños</li>                                   
                                    </ul>        
                                    </p>
                                    <h5 class="card-title fw-bold">$2,588,735</h5>
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
        </div-->

        
        <!--fotos y mapas-->
        <img class="img-fluid w-100" src="<?php echo get_template_directory_uri() .'/assets/images/air-view-green.jpg';?>">


       <!--Carrusel de amenidades-->

       <div class="container-fluid text-center">
        <div class="d-flex justify-content-center my-5">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
            <h2 class="fw-bold fs-1 text-center">Amenidades</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" id="iconsvg">
        </div>

        <div class="row justify-content-center">
          
          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-trophy"></i> Game room</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-laptop"></i> Coworking</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-fire-alt"></i> Asador</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-utensils"></i> Restaurante</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-running"></i> Pista</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-swimming-pool"></i> Alberca</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-bowling-ball"></i> Boliche</p>
          </div>

          <div class="col-6 col-md-4 amenities-green">
            <p class="fs-1"><i class="fas fa-water"></i> Laguna</p>
          </div>

        </div>

      </div>
      
        <div class="d-flex justify-content-center my-5">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
            <h2 class="fw-bold fs-1 text-center"> Mapa</h2>
            <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
        </div>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.0029507161603!2d-105.2867339851221!3d20.71010478617192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8421470f76338913%3A0x25a99d2c8f0aff69!2sKi%20Green%20District%20Nuevo%20Vallarta!5e0!3m2!1ses-419!2smx!4v1623968422043!5m2!1ses-419!2smx" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

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