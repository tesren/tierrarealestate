
        
        </div><!--div resoluciones grandes-->
      
        <!--Boton contacto segun lenguaje-->
        <?php if(pll_current_language()=="es"): ?>
            <a class="btn-contacto px-2" href="<?php echo get_permalink( get_page_by_title('Contacto'));?>"><i class="far fa-envelope"></i> Correo</a>
        <?php else: ?>
            <a class="btn-contacto px-2" href="<?php echo get_permalink( get_page_by_title('Contact'));?>"><i class="far fa-envelope"></i> Email Us</a>
        <?php endif; ?>


        <!--boton whatsapp-->
        <a href="https://wa.me/523221350108?text=Hola%20quisiera%20saber%20mas%20información%20de%20Tierra%20Real%20Estate" id="whatsapp" target="_blank" class="shadow-10"> 
            <i class="fab fa-whatsapp"></i>
        </a>

        <!--boton de busqueda-->
        <button title="<?php pll_e("Buscar");?>" type="button" class="btn btn-search shadow-10" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="fas fa-search"></i>
        </button>

    <?php
        $regiones = get_terms( array(
        'taxonomy'          => 'regiones',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );

    $propertiesType = get_terms( array(
        'taxonomy'          => 'property_type',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );?>

        <!-- Modal de busqueda -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel"><?php pll_e("Busqueda"); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo get_post_type_archive_link( 'listings' ); ?>" method="get">
                        <label for="regiones_s"><?php pll_e('Ubicación'); ?></label>
                        <select class="form-select w-100 mb-3" aria-label="Default select example" id="regiones_s" name="regiones_s">
                            <option selected value=""><?php pll_e('Selecciona uno');?></option>
                            <?php foreach($regiones as &$category):
                                $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                                    foreach($childrenTerms as $child) :     
                                        $term = get_term_by( 'id', $child, 'regiones');?>
                                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                    <?php endforeach; ?>

                            <?php endforeach; ?>
                        </select>
               

                        <div class="row">

                            <div class="col-6 ps-0">
                                <label for="type_s"><?php pll_e('Tipo de propiedad');?></label>
                                <select class="form-select w-100 mb-3" aria-label="Default select example" id="type_s" name="type_s">
                                    <option selected value=""><?php pll_e('Selecciona uno');?></option>

                                    <?php foreach($propertiesType as &$type):?>
                                        <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-6 pe-0">
                                <label for="currency"><?php pll_e('Moneda');?></label>
                                <select class="form-select w-100 mb-3" aria-label="Default select example" id="currency" name="currency">
                                    <option selected value=""><?php pll_e('Selecciona uno');?></option>
                                    <option value="USD">USD</option>
                                    <option value="MXN">MXN</option>
                                </select>
                            </div>

                        </div> 

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de precios')?></label>

                            <input class="col-4 search-form" type="number" name="minprice" id="minprice" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-4 search-form" type="number" name="maxprice" id="maxprice" placeholder="Max" readonly>
                            <div id="slider-range-precios" class="mt-2 col-11"></div>
                            
                        </div>

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de Recámaras'); ?></label>
                            <input class="col-3 search-form" type="number" name="minbeds" id="minbeds" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxbeds" id="maxbeds" placeholder="Max" readonly>
                            <div id="slider-range-beds" class="mt-2 col-11"></div>
                        </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-amarillo w-100"><?php pll_e("Buscar"); ?></button>
                    </form>
                </div>

                </div>
            </div>
        </div> <!--End modal-->

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