<?php 

 /*
 Template Name: Page Vender Template 
  */

  $listings = get_posts(array(
    'post_type' => 'listings',
    'numberposts' => 3,
));
            
 get_header();
?>

<div class="container pt-5">

    <h1 class="text-center grey-title text-lg-start"><?php pll_e('Vender'); ?></h1>

    <p class="fs-4"><?php pll_e('DescVender'); ?></p>

    <span class="d-block grey-title text-center text-lg-end fs-1 mt-5 mb-3"><?php pll_e('Propiedades en Venta actualmente');?></span>

    <div class="row justify-content-center mb-5">

        <!--listing info-->
        <?php if( $listings ): ?>

            <?php foreach( $listings as $unit ): setup_postdata($unit);

                $imgFull = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );?>
        
                <div class="col-12 col-lg-4 text-center" style="border-radius:20px;">
                    <!--Imagen listing-->
                    <img class="w-100 imagen-archive-listing" src="<?php echo $imgFull[0];?>" alt="<?php the_post_thumbnail_caption( $development->ID );?>">

                    <div class="row justify-content-center bg-light">
                        <!--Disponibilidad y tipo-->
                        <div class="col-12 d-flex justify-content-center mt-2 mb-0">
                            <span class="fs-5 px-2 tr-ptype"><?php tierra_get_property_type($unit->ID, 'property_type'); ?></span>
                            <span class="fs-5 fw-bold ps-3 <?php echo rwmb_meta('avaliable',$args = [], $unit->ID);?>"><?php echo pll_e( rwmb_meta('avaliable',$args = [], $unit->ID) );?></span>
                        </div>

                        <div class="col-12 ">
                            <!--Nombre y Lugar del listing-->
                            <h2 class="fs-2 mt-2 oneline-heading"><?php echo get_the_title( $unit->ID );?></h2>
                            <span class="d-block fs-5"><?php tierra_get_list_terms($unit->ID, 'regiones'); ?>  </span>
                        </div>

                        <div class="col-12">
                            <!--precio y moneda-->
                            <span itemprop="price" class="fs-3 my-3"><?php echo $unit->currency;?>$<?php echo number_format($unit->price);?></span>
                        </div>

                        <div class="col-12 text-center">
                            <ul class="list-inline">
                                <?php if( !empty($unit->bedrooms) ): ?>
                                    <li class="list-inline-item"><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> <?php pll_e( 'Recámaras' );?></li>
                                <?php endif;?>

                                <?php if( !empty($unit->bathrooms) ): ?>
                                    <li class="list-inline-item"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> <?php pll_e( 'Baños' );?></li>
                                <?php endif;?>

                                <?php if( !empty($unit->construction) ): ?>
                                    <li class="list-inline-item"><i class="fas fa-home"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->construction);?></li>
                                <?php else:?>
                                        <li class="list-inline-item"><i class="fas fa-ruler-combined"></i> <?php echo tierra_get_sqft(pll_current_language(), $unit->lot_area);?></li>
                                <?php endif;?>
                            </ul>
                        </div>
                            
                    </div>

                    <div class="row justify-content-center pb-4 mb-5 bg-light">
                        <div class="col-12">         
                            <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn-amarillo btn-lg w-75 mt-3 mt-md-4"><?php pll_e( 'Más info' );?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; 
            endif;?>
    </div>


</div>

 <!--contacto-->
 <div class="container-fluid my-5">
    <?php get_template_part( 'partials/content', 'contact-form' ); ?>
</div>


<?php get_footer(); ?>