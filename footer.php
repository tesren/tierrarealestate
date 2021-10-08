
        
        </div><!--div resoluciones grandes-->
      
        <!--Boton contacto segun lenguaje-->
        <?php if(pll_current_language()=="es"): ?>
            <a class="btn-contacto px-2" href="<?php echo get_permalink( get_page_by_title('Contacto'));?>"><i class="far fa-envelope"></i> Correo</a>
        <?php else: ?>
            <a class="btn-contacto px-2" href="<?php echo get_permalink( get_page_by_title('Contact'));?>"><i class="far fa-envelope"></i> Email Us</a>
        <?php endif; ?>


        <!--boton whatsapp-->
        <a href="https://wa.me/523221350108?text=Hola%20quisiera%20saber%20mas%20información%20de%20Tierra%20Real%20Estate" id="whatsapp" target="_blank"> 
            <i class="fab fa-whatsapp"></i>
        </a>

        <!--footer-->
        <footer class="page-footer bg-azul text-center">

            <a href="<?php echo get_home_url(); ?>">
                <img class="logo-tierra-footer" src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo Tierra Real Estate">
            </a>
                        
            <!--iconos redes sociales-->
            <div class="d-flex justify-content-center iconos py-3">
                <p class="pe-1"><?php pll_e('Afiliados')?> <a href=""><img class = "logo-ampi" src="<?php echo get_template_directory_uri() ."/assets/images/ampi-logo.png";?>" alt="ampi logo"></a> | </p>
                
                <a href="https://www.facebook.com/Tierra-Real-Estate-Lifestyle-1865454683779555" class="link-light" target="_blank">
                    <i class="fab fa-facebook mt-2"></i>
                </a>

                <a href="https://www.instagram.com/tierrarealestate.pv/" class="link-light" target="_blank">
                    <i class="fab fa-instagram mt-2 mx-3"></i>
                </a>

                <a href="https://wa.me/523221350108?text= " class="link-light" target="_blank">
                    <i class="fab fa-whatsapp pt-1"></i>
                </a>
            </div>
            
            <div class="container-fluid text-center bg-azul-fuerte py-3">
                <p class="m-0"> &copy;2014-2021 Tierra Vallarta 
                    <a style="text-decoration:underline;" class="link-light" href="<?php echo get_the_permalink(get_page_by_title("Aviso de Privacidad")); ?>">
                        <?php pll_e('Politicas de Privacidad')?>
                    </a>
                </p>
            </div>
        </footer>

        </div><!--Div de todo el body-->
        <div id="loading-logo"></div><!--animacion de carga-->
        <div id="loading" style="background-image: url('<?php echo get_template_directory_uri() ."/assets/images/gif-tierra.gif";?>');"></div><!--animacion de carga-->

        <!--font awesome-->
        <?php wp_footer();  ?>
    </body>
</html>