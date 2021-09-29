
        
        </div><!--div resoluciones grandes-->
        <?php 
/* 
            $regiones = get_terms( array(
                'taxonomy'          => 'regiones',
                'parent'            => 0,
                'hide_empty'        => false,
            ) );

            $propertiesType = get_terms( array(
                'taxonomy'          => 'property_type',
                'parent'            => 0,
                'hide_empty'        => false,
            ) ); */
        ?>
          <!--Boton de busqueda-->
          <!-- <a id="btn-search" href="#" data-bs-toggle="modal" data-bs-target="#modal-search"><i class="fas fa-search"></i></a> -->

          <!--modal de busqueda-->
          <div class="modal fade" id="modal-search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                
                                <div class="modal-header" style="position:relative;">

                                    <h5 class="modal-title fs-3" id="exampleModalLabel"><?php echo pll_e( 'Encuentra tu lugar perfecto' );?></h5>                    
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; top:20px; right:20px; background-color:#fff;"></button>
                                    
                                </div>

                                <div class="modal-body mt-1">
                                    <form class=" my-2 justify-content-center mx-2 mx-lg-0" method="get" action="<?php echo get_post_type_archive_link('listings'); ?>">
                    
                                        <div class="mb-3">
                                            <h5><?php echo pll_e( 'Ubicación' );?></h5>
                                            <?php if( !empty($regiones) ) : ?>
                                                <div class="d-block d-md-flex">
                                                <?php foreach($regiones as &$category) : 
                                                        
                                                        $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                                                        foreach($childrenTerms as $child) :
                                                            
                                                            $term = get_term_by( 'id', $child, 'regiones');

                                                ?>
                                                    <!-- 'name' must match the custom query var -->
                                                    <!-- we add `[]` to `movie_category_ids` in order to read the results as an array -->
                                                
                                                    <div class="form-check me-3">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="<?php echo $term->name; ?>"
                                                            value="<?php echo $term->term_id; ?>"
                                                            name="regiones_cat_ids[]"
                                                            <?php echo in_array($term->term_id, get_query_var( 'regiones_cat_ids', FALSE)) ? 'checked' : null ;?>
                                                        />
                                                        <label class="form-check-label" for="<?php echo $term->name; ?>"><?php echo $term->name; ?></label>
                                                    </div>
                                                
                                                

                                                <?php endforeach;
                                                    endforeach;?>
                                                </div><!-- d-flex -->
                                                <?php endif; ?>  
                                        </div>

                                        <div class="mb-3">
                                            <h5><?php echo pll_e( 'Tipo de Propiedad' );?></h5>
                                            <?php if( !empty($propertiesType) ) : ?>
                                            <div class="d-block d-md-flex">
                                                <?php foreach($propertiesType as &$propertyType) : 

                                            ?>
                                                    <div class="form-check me-3">
                                                        <input 
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            id="<?php echo $propertyType->name; ?>"
                                                            value="<?php echo $propertyType->term_id; ?>"
                                                            name="property_type_cat_ids[]"
                                                            <?php echo in_array($propertyType->term_id, get_query_var( 'property_type_cat_ids', FALSE)) ? 'checked' : null ;?>
                                                        />
                                                        <label class="form-check-label" for="<?php echo $propertyType->name; ?>"><?php echo $propertyType->name; ?></label>
                                                    </div>
                                                <?php  
                                                    endforeach;?>
                                                    </div><!-- d-flex-->
                                                <?php endif;?>  
                                                    
                                        </div>
                                            
                                        <div class="row mb-3">
                                            <h5><?php pll_e( 'Recámaras' );?></h5>
                                            <div class="col-6 form-floating ps-0">
                                                <input type="number" class="form-control" id="min_beds" name="min_beds" placeholder="Recámaras" value="<?php echo get_query_var( 'min_beds', FALSE) ? get_query_var( 'min_beds', FALSE) : null ; ?>">
                                                <label class="ms-2" for="min_beds">Min</label>
                                            </div>
                                            <div class="col-6 form-floating pe-0">
                                                <input type="number" class="form-control" id="max_beds" name="max_beds" placeholder="Recámaras" value="<?php echo get_query_var( 'max_beds', FALSE) ? get_query_var( 'max_beds', FALSE) : null ; ?>">
                                                <label class="ms-2" for="max_beds">Max</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <h5><?php pll_e( 'Precio' );?></h5>
                                            <div class="col-6 form-floating ps-0">
                                                <input type="text" class="form-control" id="min_price" name="min_price" placeholder="Precio" value="<?php echo get_query_var( 'min_price', FALSE) ? get_query_var( 'min_price', FALSE) : null ; ?>">
                                                <label class="ms-2" for="min_price">Min</label>
                                            </div>

                                            <div class="col-6 form-floating pe-0">
                                                <input type="text" class="form-control" id="max_price" name="max_price" placeholder="Precio" value="<?php echo get_query_var( 'max_price', FALSE) ? get_query_var( 'max_price', FALSE) : null ; ?>">
                                                <label class="ms-2" for="max_price">Max</label>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="modal-footer d-block">

                                    <div class="row justify-content-evenly">
                                        <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal"><?php pll_e('Cerrar'); ?></button>
                                        <button type="submit" class="btn btn-amarillo col-4"><?php pll_e( 'Buscar' );?></button> 
                                        </form>
                                    </div>
                                
                                </div>

                                </div>
                            </div>
                        </div><!--end Modal -->

        <!--boton whatsapp-->
        <a href="https://wa.me/523221350108?text=Hola%20quisiera%20saber%20mas%20información%20de%20Tierra%20Real%20Estate" id="whatsapp" target="_blank"> 
            <i class="fab fa-whatsapp"></i>
        </a>

        <!--footer-->
        <footer class="page-footer bg-azul text-center">

            <a href="/home.html"><img class="img-fluid logo-tierra" src="<?php echo get_template_directory_uri() .'/assets/images/logo-tierra-final.svg';?>" alt="Logo"></a>
                        
             <!--iconos redes sociales-->
             <div class="d-flex justify-content-center iconos py-3">
                <p class="pe-1"><?php pll_e('Afiliados')?> <a href=""><img class = "logo-ampi" src="<?php echo get_template_directory_uri() ."/assets/images/ampi-logo.png";?>" alt="ampi logo"></a> | </p>
                <a href="https://www.facebook.com/Tierra-Real-Estate-Lifestyle-1865454683779555" class="link-light"><i class="fab fa-facebook mt-2"></i></a>
                <a href="https://www.instagram.com/tierrarealestate.pv/" class="link-light"><i class="fab fa-instagram mt-2 mx-3"></i></a>
                <a href="#" class="link-light"><i class="fab fa-whatsapp pt-1"></i></a>
      
            </div>
            
            <div class="container-fluid text-center bg-azul-fuerte py-3">
                <p class="m-0"> &copy;2014-2021 Tierra Vallarta <a style="text-decoration:underline;" class="link-light" href="/politicas-privacidad/"><?php pll_e('Politicas de Privacidad')?></a></p>
            </div>
        </footer>

        </div><!--Div de todo el body-->
        <div id="loading-logo"></div><!--animacion de carga-->
        <div id="loading" style="background-image: url('<?php echo get_template_directory_uri() ."/assets/images/gif-tierra.gif";?>');"></div><!--animacion de carga-->

        <!--font awesome-->
        <script src="https://kit.fontawesome.com/164e915f72.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
        <?php wp_footer();  ?>
    </body>
</html>