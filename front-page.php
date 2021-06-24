<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>
        
        <div class="row">
            <div class="col-12">

                <!--Carrusel de imagenes de propiedades-->
            <div id="carouselFrontPage" class="carousel slide bg-azul" data-bs-ride="carousel">
                
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselFrontPage" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselFrontPage" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselFrontPage" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                
                <div class="carousel-inner">
                
                    <div class="carousel-item active">
                        <img src="<?php echo get_template_directory_uri() .'/assets/images/naya.jpg';?>" class="d-block w-100 tr-img-responsive" alt="...">
                        <div class="carousel-caption d-md-block text-center">
                            <h1>NAYA</h1>
                            <p>Punta de Mita <br>
                             Desde:<br> $1,200,000 USD</p>
                            <a href="#" class="btn btn-light">Más info</a>
                        </div>
                </div>

                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/susurros_cora.jpg';?>" class="d-block w-100 tr-img-responsive" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h1>Susurros del Corazón</h1>
                        <p>Bucerías <br>
                           Desde: <br> $500,000 USD</p>
                        <a href="#" class="btn btn-light">Más info</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/green-disctrict.jpg';?>" class="d-block w-100 tr-img-responsive" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h1>Green Disctrict</h1>
                        <p>Nuevo Vallarta<br>
                          Desde: <br> $500,000 USD</p>
                        <a href="#" class="btn btn-light">Más info</a>
                    </div>
                </div>

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

        <!--Formulario-->
        <!--div class="container-fluid bg-azul">

            <div class="container py-5">
                <form action="#" class="text-start" method="POST">
                    
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="city" name="city" placeholder="city" required>
                                <label for="floatingInput">Elige una ciudad</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center">
                        
                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="tipo" name="tipo">
                                <option selected>Todos</option>
                                <option value="$House">Casas</option>
                                <option value="$Apartment">Departamentos</option>
                                <option value="$Land">Terrenos</option>
                                </select>
                                <label for="floatingSelect">Tipo</label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="minPrice" name="minPrice" placeholder="500,000">
                                <label for="floatingInput">Precio Min.</label>
                            </div>  
                        </div>

                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="maxPrice" name="maxPrice" placeholder="999,999,999">
                                <label for="floatingInput">Precio Max.</label>
                            </div> 
                        </div>

                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="minBeds" name="minBeds" placeholder="1">
                                <label for="floatingInput">Mínimo de camas</label>
                            </div> 
                        </div>

                        <div class="col-md-1">
                            <button type="submit" class="btn btn-go" >Vamos</button>
                        </div>
                    </div>
    
                                
    
                </form>
            </div>
            
        </div-->

        <!--listings-->
        <div class="container-fluid" id="listings">

            <!--Punta mita-->
            <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/punta-mita.jpg';?>" alt="punta mita">
            
            <div class="row justify-content-center justify-content-md-between pb-5 pt-2">
                <div class="col-md-7 text-center">

                    <hr style="width:100%;text-align:left;margin-left:0">

                    <div class="row justify-content-center">

                       <h3 class="col-md-4"> <i class="fas fa-bed"></i> 3 Recámaras</h3>
                       <h3 class="col-md-4"><i class="fas fa-shower"></i> 2 baños</h3>
                       <h3 class="col-md-4"><i class="fas fa-home"></i> 450m2</h3>
                       
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                </div>
                <div class="col-md-2 text-center">
                    <a href="#" class="btn btn-amarillo btn-lg mt-1 mt-md-4">Mas info</a>
                </div>
            </div>

            <!--Casa flor-->
            <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/casa-flor.jpg';?>" alt="Casa flor">
            
            <div class="row justify-content-center justify-content-md-between pb-5 pt-2">
                <div class="col-md-7 text-center">

                    <hr style="width:100%;text-align:left;margin-left:0">

                    <div class="row justify-content-center">

                       <h3 class="col-md-4"> <i class="fas fa-bed"></i> 3 Recámaras</h3>
                       <h3 class="col-md-4"><i class="fas fa-shower"></i> 2 baños</h3>
                       <h3 class="col-md-4"><i class="fas fa-home"></i> 450m2</h3>
                       
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                </div>
                <div class="col-md-2 text-center">
                    <a href="#" class="btn btn-amarillo btn-lg mt-1 mt-md-4">Mas info</a>
                </div>
            </div>

            <!--Francia 332-->
            <img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/images/francia.jpg';?>" alt="Francia 332">
            
            <div class="row justify-content-center justify-content-md-between pb-5 pt-2">
                <div class="col-md-7 text-center">

                    <hr style="width:100%;text-align:left;margin-left:0">

                    <div class="row justify-content-center">

                       <h3 class="col-md-4"> <i class="fas fa-bed"></i> 3 Recámaras</h3>
                       <h3 class="col-md-4"><i class="fas fa-shower"></i> 2 baños</h3>
                       <h3 class="col-md-4"><i class="fas fa-home"></i> 450m2</h3>
                       
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                </div>
                <div class="col-md-2 text-center">
                    <a href="#" class="btn btn-amarillo btn-lg mt-1 mt-md-4">Mas info</a>
                </div>
            </div>

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
           <div class="row">

                <div class="col-sm-6 order-sm-1 bg-azul text-start" id="texto-formulario">
                    <h3 class="fs-1">Por favor sientase libre de contactarnos por medio de nuestro formulario de contacto o por nuestros numeros de teléfono</h3>
                </div>
               
                <!--formulario-->
                <div class="col-sm-6 order-sm-12">
                    <h2 class="pt-3 px-3 fs-1">Formulario de contacto</h2>
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

                
        </div><!--Col-12-->
    </div><!--row-->


        
            

<?php get_footer(); ?>