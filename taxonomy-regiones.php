<?php get_header(); ?>

<?php 
        if ( have_posts() ) :
            
            $modalId = 0; ?>
           
            <h1 class=" fs-1 mt-0 mb-5 my-md-5 text-center grey-title" id="titulo-propiedades">
                <?php pll_e( 'Listings en' );?> 
                <?php tierra_get_list_terms(get_the_ID() , 'regiones'); ?>
            </h1>
         
           <?php while( have_posts() ): the_post();

           $postType = get_post_type();
            if($postType!='listings'){

            }else{
                $i = 0;
                ?>
                <!--Nuevo y mejorado diseño listings chido--> 
        <div class="container-fluid text-center contenedor-listings mt-5 px-1">
            <!--listing info-->
       
            <?php $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );?>
            
            <!--Imagen listing-->
            <img class="img-fluid w-100 imagen-listing <?php if($i>0){echo'animatable fadeInUp';} ?>" src="<?php echo $portada[0];?>" alt="Listing image">

            <div class="row justify-content-center bg-light <?php if($i>0){echo'animatable fadeInUp';} ?>">
                <!--Disponibilidad y tipo-->
                <div class="col-12 d-flex justify-content-center mt-2 mb-0">
                    <span class="fs-5 px-2 tr-ptype"><?php tierra_get_property_type( get_the_ID() ,'property_type' ); ?></span>
                    <span class="fs-5 fw-bold ps-3 <?php echo rwmb_meta('avaliable');?>"><?php echo pll_e( rwmb_meta('avaliable') );?></span>
                </div>

                <div class="col-12 ">
                    <!--Nombre y Lugar del listing-->
                    <h2 class="fs-1 fw-bold mt-2">
                        <?php echo get_the_title();?> 
                        <?php tierra_get_list_terms(get_the_ID(), 'regiones'); ?>  
                    </h2>
                </div>

                <div class="col-12">
                    <!--precio y moneda-->
                    <h3 class="fs-1 my-3"><?php echo rwmb_meta( 'currency');?>$ <?php echo number_format(rwmb_meta('price'));?></h3>
                </div>

                    <div class="col-12">
                        <ul class="list-inline fs-4">
                            <?php if( !empty(rwmb_meta( 'bedrooms') ) ): ?>
                                <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></li>
                            <?php endif;?>

                            <?php if( !empty(rwmb_meta( 'bathrooms') ) ): ?>
                                <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></li>
                            <?php endif;?>
                            
                            <?php if( !empty(rwmb_meta( 'construction') ) ): ?>
                                <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?></li>
                            <?php else:?>
                                <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('lot_area'));?></li>
                            <?php endif;?>
                        </ul>
                    </div>
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
                        <div class="row justify-content-center text-center">
                            <div class="col-12">
                                <ul class="list-inline fs-4 mb-0">
                                    <?php if( !empty(rwmb_meta( 'bedrooms') ) ): ?>
                                        <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></li>
                                    <?php endif;?>

                                    <?php if( !empty(rwmb_meta( 'bathrooms') ) ): ?>
                                        <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></li>
                                    <?php endif;?>
                                    
                                    <?php if( !empty(rwmb_meta( 'construction') ) ): ?>
                                        <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?></li>
                                    <?php else:?>
                                        <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('lot_area'));?></li>
                                    <?php endif;?>
                                </ul>
                            </div>
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
            
            //wp_reset_postdata();?>
            
           
        </div>


        <?php } ?>
        
<?php       $i++;
            endwhile;

            the_posts_pagination();

        else:?>
            <div class="row justify-content-center">
                <div class="col-11 col-md-8 text-center " style="min-height:60vh;">
                    <span class="d-block fs-1 my-5"><?php pll_e('Aún no hay propiedades, vuelve mas tarde'); ?></span>
                </div>
            </div>
            
        <?php endif;?>

<?php get_footer(); ?>