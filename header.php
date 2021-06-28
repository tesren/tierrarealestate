<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="UTF-8">
        <title> </title>
         <meta charset="<?php bloginfo('charset');?>">
        <?php if( is_singular() && pings_open( get_queried_object() )  ) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php endif; ?>
        <?php wp_head();?>
        <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <!--Bootstrap-->
        <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"-->
        <!--fuente-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
        
    </head>
    
    <body <?php body_class();?>>

    <div class="tr-page">
      
        <div class="container-fluid text-center bg-azul fixed-top">

            <!--Nosotros-->
            <div class="d-flex justify-content-end iconos">
                  <h3 id="tr-nosotros-grande" class="fs-5 pt-1">
                    <a href="#" class="link-light my-3 mx-2"><i class="fas fa-globe"></i> En</a>
                     /
                    <a href="/wordpress-tierra/nosotros" class="link-light mx-2 my-3"> Nosotros</a>
                  </h3>  
           </div>
           
            <!--LOGO Tierra-->
            <a href="/"><img id="tr-logo-header-grande" class="logo-tierra p-0" width="300" src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo"></a>
            
           <!--navBar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-azul" style="position:relative;">

    
                <!-- Navbar content -->
                <div class="container-fluid">
                  <a class="navbar-brand ms-2 tr-header-brand" href="/">
                     <img src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo Tierra" width="150px" height="auto">
                  </a>

                    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                          
                          <li id="tr-boton-idioma" class="nav-item py-3">
                            <a class="navbar-brand ms-2 tr-header-brand" href="/">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo Tierra" width="70%" height="auto">
                            </a>
                          </li>

                            <div class="vl"></div>

                          <li class="nav-item dropdown">
                            
                            <a class="nav-link mx-5 fs-2 link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Punta de Mita
                            </a>
                            <ul class="dropdown-menu bg-azul-fuerte" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item px-5" href="/wordpress-tierra/naya">Naya</a></li>
                            <li><a class="dropdown-item px-5" href="/wordpress-tierra/susurros">Susurros del Corazón</a></li>  
                            <li><a class="dropdown-item px-5" href="/lifestyle/punta-mita/">LifeStyle</a></li>
                            </ul>
                          </li>

                          <div class="vl"></div>
                          <li class="nav-item dropdown">
                            <a class="nav-link mx-5 fs-2 link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Bucerías 
                            </a>
                            <ul class="dropdown-menu bg-azul-fuerte" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item px-5" href="/lifestyle/bucerias/">LifeStyle</a></li>
                            </ul>
                          </li>

                          <div class="vl"></div>
                          <li class="nav-item dropdown">
                            <a class="nav-link mx-5 fs-2 link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Nuevo Vallarta
                            </a>
                            <ul class="dropdown-menu bg-azul-fuerte" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item px-5" href="/wordpress-tierra/green-district">Green District</a></li>
                              <li><a class="dropdown-item px-5" href="/lifestyle/nuevo-vallarta/">LifeStyle</a></li>
                            </ul>
                          </li>
                          <div class="vl"></div>
                          
                          <li id="tr-boton-nosotros" class="nav-item">
                            <a class="nav-link fs-2" href="/wordpress-tierra/nosotros">Nosotros</a>
                          </li>

                          <li class="nav-item">
                            <a id="tr-boton-idioma-nav" class="nav-link fs-2" href="/wordpress-tierra/nosotros"><i class="fas fa-globe"></i> En</a>
                          </li>

                        </ul>
                       
                      </div>
                </div>
            </nav>
        </div>

        
        <div id="tr-contenedor-resoluciones-grandes">

  <?php
      // wp_nav_menu(
      //     [
      //         'menu'        => 'primary',
      //         'container'   => '',
      //         'theme_location' => 'primary',
      //         'items_wrap'  => '<ul>%3$s</ul>',
      //         'walker' => new Walker_Nav_Primary(),
      //     ]
      // )
  ?>