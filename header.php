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
      
        <div class="container-fluid text-center bg-azul fixed-top" id="mainHeader">

            <!--Nosotros-->
            <div class="d-flex justify-content-end iconos">
                  <h3 id="tr-nosotros-grande" class="fs-5 pt-3">
                    <a href="#" class="link-light my-5 mx-2"><i class="fas fa-globe"></i> En</a>
                     /
                    <a href="/wordpress-tierra/nosotros" class="link-light ms-2 me-4 my-5"> Nosotros</a>
                  </h3>  
           </div>
           
            <!--LOGO Tierra-->
            <a href="<?php echo get_home_url(); ?>" class="d-none d-md-block"><img id="tr-logo-header-grande" class="logo-tierra p-0" width="300" src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo"></a>
            
           <!--navBar-->
               <nav class="navbar navbar-expand-md navbar-dark bg-azul" role="navigation" style="position:relative;">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand ms-2 d-md-none" href="<?php echo get_home_url(); ?>" id="tr-header-brand-1">
                     <img src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" id="nav_heder_logo" alt="Logo Tierra" width="180px" height="auto">
                    </a>
                      <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'navbarSupportedContent',
                            'menu_class'        => 'navbar-nav mx-auto mb-2 mb-lg-0',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                    </div>
                </nav>
            <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-azul" style="position:relative;">-->
                <!-- Navbar content -->
                <!--<div class="container-fluid">
                  <a class="navbar-brand ms-2 " href="/" id="tr-header-brand-1">
                     <img src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo Tierra" width="150px" height="auto">
                  </a>

                    <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                          
                          <li id="tr-boton-idioma" class="nav-item py-3">
                            <a class="navbar-brand ms-2" href="/" id="tr-header-brand-2">
                              <img src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo Tierra" width="70%" height="auto">
                            </a>
                          </li>

                            <div class="vl"></div>

                          <li class="nav-item dropdown">
                            
                            <a class="nav-link mx-5 fs-2 link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Punta de Mita
                            </a>
                            <ul class="dropdown-menu bg-azul-fuerte" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item px-5 fs-4" href="/developments/naya/">Naya</a></li>
                            <li><a class="dropdown-item px-5 fs-4" href="/wordpress-tierra/susurros">Susurros del Corazón</a></li>  
                            <li><a class="dropdown-item px-5 fs-4" href="/lifestyle/punta-mita/">LifeStyle</a></li>
                            </ul>
                          </li>

                          <div class="vl"></div>
                          <li class="nav-item dropdown">
                            <a class="nav-link mx-5 fs-2 link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               Bucerías 
                            </a>
                            <ul class="dropdown-menu bg-azul-fuerte" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item px-5 fs-4" href="/propiedades-bucerias">Propiedades</a></li>
                              <li><a class="dropdown-item px-5 fs-4" href="/lifestyle/bucerias/">LifeStyle</a></li>
                            </ul>
                          </li>

                          <div class="vl"></div>
                          <li class="nav-item dropdown">
                            <a class="nav-link mx-5 fs-2 link-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Nuevo Vallarta
                            </a>
                            <ul class="dropdown-menu bg-azul-fuerte" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item px-5 fs-4" href="/developments/green-district/">Green District</a></li>
                              <li><a class="dropdown-item px-5 fs-4" href="/lifestyle/nuevo-vallarta/">LifeStyle</a></li>
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
            </nav> -->
        </div>

        
        <div id="tr-contenedor-resoluciones-grandes">