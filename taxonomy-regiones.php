<?php get_header(); ?>

<?php 
        if ( have_posts() ) :
            
            $modalId = 0; ?>
           
            <h1 class="fs-1 mt-0 mb-5 my-md-5 text-center" id="titulo-propiedades"><?php pll_e( 'Listings en' );?> <?php                                          
            $terms_list = array_reverse(wp_get_post_terms( get_the_ID(), 'regiones' ) );

            $i =1;
            if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
                foreach ( $terms_list as $term ) {
                    echo $term->name;
                    if( $i < count($terms_list) ){
                        echo ', ';
                    }
                    $i++;
                }
            }                                                                                     
            ?>  </h1>

            <!-- Button trigger modal -->
            <div class="container text-center">
                <button type="button" class="btn btn-amarillo w-50" data-bs-toggle="modal" data-bs-target="#ModalSearch">Buscar</button>
            </div>
           

            <!-- Modal para buscar propiedades -->
            <div class="modal fade" id="ModalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="exampleModalLabel">Busqueda de propiedades</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class=" my-2 text-center justify-content-center mx-2 mx-lg-0" action="">

                        <select class="form-select form-select-lg mb-3" aria-label="form-select-lg lugar">
                            <option selected>Elige un lugar</option>
                            <option value="1">Puerto Vallarta</option>
                            <option value="2">Bucerías</option>
                            <option value="2">Punta de Mita</option>
                            </option>
                        </select>

                        <select class="form-select form-select-lg mb-3" aria-label="form-select-lg tipo">
                            <option selected>Tipo</option>
                            <option value="1">Casa</option>
                            <option value="2">Departamento</option>
                        </select>

                        <div class="row">
                            <h5><?php pll_e( 'Recámaras' );?></h5>
                            <div class="col-6 form-floating mb-3 ps-0">
                                <input type="number" class="form-control" id="bedrooms-min" placeholder="Recámaras">
                                <label class="ms-2" for="bedrooms-min">Min</label>
                            </div>
                            <div class="col-6 form-floating mb-3 pe-0">
                                <input type="number" class="form-control" id="bedrooms-max" placeholder="Recámaras">
                                <label class="ms-2" for="bedrooms-max">Max</label>
                            </div>
                        </div>
                    
                        <div class="row">
                            <h5>Precio</h5>
                            <div class="col-6 form-floating mb-3 ps-0">
                                <input type="number" class="form-control" id="min-price" placeholder="Precio">
                                <label class="ms-2" for="min-price">Min</label>
                            </div>

                            <div class="col-6 form-floating mb-3 pe-0">
                                <input type="number" class="form-control" id="max-price" placeholder="Precio">
                                <label class="ms-2" for="max-price">Max</label>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-amarillo">Buscar</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            
           <?php while( have_posts() ): the_post();

           $postType = get_post_type();
            if($postType!='listings'){

            }else{

                ?>
                <!--Nuevo y mejorado diseño listings chido--> 
        <div class="container-fluid text-center contenedor-listings mt-5 px-1">
            <!--listing info-->
       
  
            
                <?php 
            //setup_postdata($unit);
            //$photo = get_field('photo', $unit->ID);
            $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );
            ?>
            
            <!--Imagen listing-->
            <img class="img-fluid w-100 imagen-listing animatable fadeInUp" src="<?php echo $portada[0];?>" alt="Listing image">

            <div class="row justify-content-center bg-light animatable fadeInDown">
                <!--Disponibilidad-->
                <div class="col-12 <?php echo rwmb_meta('avaliable');?>">
                    <p class="mt-2 mb-0 fs-5 fw-bold"><?php echo pll_e( rwmb_meta('avaliable') );?></p>
                </div>
                <div class="col-12 ">
                    <!--Nombre y Lugar del listing-->
                    <h2 class="fs-1 fw-bold mt-2"><?php echo get_the_title();?> 
                        <?php                                          
                            $terms_list = array_reverse(wp_get_post_terms( get_the_ID(), 'regiones' ) );

                            $i =1;
                            if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
                                foreach ( $terms_list as $term ) {
                                    echo $term->name;
                                    if( $i < count($terms_list) ){
                                        echo ', ';
                                    }
                                    $i++;
                                }
                            }                                                                                     
                            ?>  
                    </h2>
                </div>
                <div class="col-12">
                    <!--precio y moneda-->
                    <h3 class="fs-1 my-3"><?php echo rwmb_meta( 'currency');?>$ <?php echo number_format(rwmb_meta('price'));?></h3>
                </div>
                    <h3 class="col-md-2"> <i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></h3>
                    <h3 class="col-md-2"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></h3>
                    <h3 class="col-md-2"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?> </h3>
            </div>

            <div class="row justify-content-center pb-4 mb-5 bg-light">
                <div class="col-12 col-md-4">
                <button type="button" class="btn btn-azul btn-lg w-75 mt-3 mt-md-4" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $modalId; ?>"><?php pll_e( 'Vista previa' );?></button>
                </div>
                <div class="col-12 col-md-4">         
                    <!-- Button trigger modal -->
                    <a href="<?php echo get_the_permalink();?>" class="btn btn-amarillo btn-lg w-75 mt-3 mt-md-4"><?php pll_e( 'Más info' );?></a>
                </div>
            </div>

             <!-- Modal -->
            <div class="modal fade" id="modal-<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-lg">
                    <div class="modal-content">
                    
                    <div class="modal-header d-block p-0" style="position:relative;">

                        <h5 class="modal-title fw-bold fs-3" id="exampleModalLabel" style="position:absolute; bottom:20px; left:20px; color:#fff;"><?php echo get_the_title();?></h5>                    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; top:20px; right:20px; background-color:#fff;"></button>
                        <img class="img-fluid w-100" src="<?php echo $portada[0];?>" alt="Listing image">
                    </div>

                    <div class="modal-body mt-1">
                        <div class="row justify-content-center">
                            <h3 class="col-md-4 fs-3"> <i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></h3>
                            <h3 class="col-md-4 fs-3"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></h3>
                            <h3 class="col-md-4 fs-3"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(),rwmb_meta('construction'));?> </h3>
                        </div>
                    </div>

                    <div class="modal-footer d-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="fs-5 text-start py-3"><?php the_content();?></div>
                            </div>
                        </div>
                        <div class="row justify-content-evenly">
                            <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal"><?php pll_e( 'Cerrar' );?></button>
                            <a href="<?php echo get_the_permalink();?>" class="col-4 btn btn-amarillo"><?php pll_e( 'Más info' );?></a>
                        </div>
                      
                    </div>

                    </div>
                </div>
            </div>

            <?php 
            $modalId++;
            
            wp_reset_postdata();?>
            
           
        </div>


        <?php } ?>
        
<?php
            endwhile;

            the_posts_pagination();
            
        endif;
    ?>

<?php get_footer(); ?>