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
        <!-- <link rel="shortcut icon" href="favicon.svg" type="image/x-icon"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <!--Bootstrap-->
        <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"-->
        <!--fuente-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
        
    </head>
    
    <body <?php body_class();?>>

    <div class="tr-page">
      
        <div class="container-fluid text-center bg-azul fixed-top" id="mainHeader">

            <!--Nosotros-->
          <div id="tr-nosotros-grande">
          <?php 
            wp_nav_menu( array(
                //'menu'              => "pre-header", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                'menu_class'        => "list-inline", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                'menu_id'           => "pre_header_menu", // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                'container'         => "div", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                'container_class'   => "row justify-content-end iconos", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                //'container_id'      => "", // (string) The ID that is applied to the container.
                //'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
                //'before'            => "", // (string) Text before the link markup.
                //'after'             => "", // (string) Text after the link markup.
                //'link_before'       => "", // (string) Text before the link text.
                //'link_after'        => "", // (string) Text after the link text.
                //'echo'              => "", // (bool) Whether to echo the menu or return it. Default true.
                //'depth'             => "", // (int) How many levels of the hierarchy are to be included. 0 means all. Default 0.
                //'walker'            => "", // (object) Instance of a custom walker class.
                'theme_location'    => "pre-header", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
                //'items_wrap'        => "", // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
                //'item_spacing'      => "", // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
            ) );
          ?>
          </div>

            <!-- <div class="d-flex justify-content-end iconos">
                  <h3 id="tr-nosotros-grande" class="fs-5 pt-3">
                    <a href="#" class="link-light my-5 mx-2"><i class="fas fa-globe"></i> En</a>
                     /
                    <a href="/wordpress-tierra/nosotros" class="link-light ms-2 me-4 my-5"> Nosotros</a>
                  </h3>  
           </div> -->
           
            <!--LOGO Tierra-->
            <a href="<?php echo get_home_url(); ?>" class="d-none d-lg-block"><img id="tr-logo-header-grande" class="logo-tierra p-0" width="300" src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo"></a>
            
           <!--navBar-->
               <nav class="navbar navbar-expand-lg navbar-dark bg-azul" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand ms-2 d-md-none" href="<?php echo get_home_url(); ?>" id="tr-header-brand-1">
                     <img src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" id="nav_header_logo" alt="Logo Tierra" width="140px" height="auto">
                    </a>
                      <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 3,
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
        </div>

        
        <div id="tr-contenedor-resoluciones-grandes">