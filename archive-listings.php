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
    ) );

    //global $wp_query; print_r($wp_query);
    get_header(); 
?>
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-md-9">
            <div class="row mb-5">
                <h1><?php echo pll_e('Listings a la venta');?></h1>
            </div>
            <div class="row">
                <?php 
                    if ( have_posts() ) :
                        $modalId = 0;
                        while( have_posts() ) : the_post(); 
                            
                            $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );

                        ?>
                            
                            <div class="col-12 col-md-6 col-lg-4 tre-listing-card px-2">

                                <!-- Old layout -->
                                    
                                    <!--Imagen listing-->
                                    <img class="img-fluid w-100 imagen-archive-listing animatable fadeInUp" src="<?php echo $portada[0];?>" alt="Listing image">

                                    <div class="row justify-content-center bg-light animatable fadeInDown text-center">
                                        <!--Disponibilidad-->
                                        <div class="col-12 d-flex justify-content-center mt-2 mb-0">
                                            <span class="fs-5 px-2 tr-ptype"><?php tierra_get_property_type( get_the_ID() ,'property_type' ); ?></span>
                                            <span class="fs-5 fw-bold ps-3 <?php echo rwmb_meta('avaliable');?>"><?php echo pll_e( rwmb_meta('avaliable') );?></span>
                                        </div>
                                        <div class="col-12 ">
                                            <!--Nombre y Lugar del listing-->
                                            <h3 class="fs-1 fw-bold mt-2"><?php echo get_the_title();?> </h3>
                                            <h4> <?php tierra_get_list_terms(get_the_ID(),'regiones');?> </h4>
                                        </div>
                                        <div class="col-12">
                                            <span class="fs-1 my-3"><?php echo rwmb_meta( 'currency');?> $<?php echo number_format(rwmb_meta('price'));?></span>
                                        </div>
                                        <div class="col-12">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></li>
                                                <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></li>
                                                <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center pb-4 mb-5 bg-light text-center">
                                        <div class="col-12 col-md-6">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-azul btn-lg w-75 mt-3 mt-md-4" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $modalId; ?>"><?php pll_e( 'Vista previa' );?></button>
                                        </div>
                                        <div class="col-12 col-md-6">         
                                            <a href="<?php echo get_the_permalink();?>" class="btn btn-amarillo btn-lg w-75 mt-3 mt-md-4"><?php pll_e( 'Más info' );?></a>
                                        </div>
                                    </div>


                                <!-- end old layout -->
                            </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modal-<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog modal-lg">
                                <div class="modal-content">
                                
                                <div class="modal-header d-block p-0" style="position:relative;">

                                    <h5 class="modal-title fw-bold fs-3" id="exampleModalLabel" style="position:absolute; bottom:20px; left:20px; color:#fff;"><?php echo get_the_title( $unit->ID );?></h5>                    
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position:absolute; top:20px; right:20px; background-color:#fff;"></button>
                                    <img src="<?php echo $portada[0];?>" class="d-block w-100 tr-img-responsive " alt="<?php the_post_thumbnail_caption();?>">
                                    
                                </div>

                                <div class="modal-body mt-1">
                                    <div class="row justify-content-center text-center">
                                        <div class="col-12">
                                            <ul class="list-inline fs-4 mb-0">
                                                <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e( 'Recámaras' );?></li>
                                                <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e( 'Baños' );?></li>
                                                <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), rwmb_meta('construction'));?></li>
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
                                        <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal"><?php pll_e('Cerrar'); ?></button>
                                        <a href="<?php echo get_the_permalink();?>" class="col-4 btn btn-amarillo"><?php pll_e( 'Más info' );?></a>
                                    </div>
                                
                                </div>

                                </div>
                            </div>
                        </div><!--end Modal -->

                        
                <?php $modalId++;   endwhile;
                    
                    the_posts_pagination();
                        
                    endif;
                ?>
            </div>
        </div>
        
        <!--Form de busqueda-->
         <div class="d-none d-md-block col-md-3 mt-5 pt-5">
            <aside class="sticky-top">
                <h4><?php echo pll_e( 'Encuentra tu lugar perfecto' );?></h4>
                <hr>
                <form class=" my-2 justify-content-center mx-2 mx-lg-0" method="get" action="<?php echo get_post_type_archive_link('listings'); ?>">
                    
                    <div class="mb-3">
                        <h5><?php echo pll_e( 'Ubicación' );?></h5>
                        <?php if( !empty($regiones) ) : 

                                foreach($regiones as &$category) : 
                                    
                                    $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                                    foreach($childrenTerms as $child) :
                                         
                                        $term = get_term_by( 'id', $child, 'regiones');

                            ?>
                                <!-- 'name' must match the custom query var -->
                                <!-- we add `[]` to `movie_category_ids` in order to read the results as an array -->
                            <div class="form-check">
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
                                endforeach;
                            endif; 
                        ?>  
                    </div>

                    <div class="mb-3">
                        <h5><?php echo pll_e( 'Tipo de Propiedad' );?></h5>
                        <?php if( !empty($propertiesType) ) : 

                                foreach($propertiesType as &$propertyType) : 

                        ?>
                                <div class="form-check">
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
                                endforeach;
                             endif; 
                        ?>  
                                
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

                    <div class="mb-3">
                        <button type="submit" class="btn btn-amarillo"><?php pll_e( 'Buscar' );?></button> 
                    </div>
                </form>
            </aside>
        </div>
        
    </div>

</div>

<?php get_footer(); ?>