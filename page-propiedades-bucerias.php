<?php get_header();?>

    <div class="container-fluid text-center  pt-1 pt-md-5 mt-5 mb-2 d-flex justify-content-center">
        <img  class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>">
        <h1 class="fs-1"><?php the_title(); ?></h1>
        <img  class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>">
    </div>

    <!--listings-->
    <div class="container-fluid" id="listings">

        <?php 

            /*
            *  Query posts for a relationship value.
            *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
            */

            $listings = get_posts(array(
                'post_type' => 'listings',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'regiones',
                        'field'    => 'slug',
                        'terms'    => 'bucerias'
                    )
            )
            ));

        ?>
        <?php if( $listings ): ?>
  
            <?php foreach( $listings as $unit ): ?>
                <?php 

                //$photo = get_field('photo', $unit->ID);
                $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );

                ?>
                        <!--listing info-->
                    <div id="container-img" style="position:relative;">
                            <img class="img-fluid w-100" src="<?php echo $portada[0];?>" alt="">

                        <div class="listing-caption-pc">
                            <h3 class="fs-1"><?php echo get_the_title( $unit->ID );?></h3>
                            <p class="fs-3">Bucerias, Nayarit, <?php echo $unit->currency;?> $ <?php echo $unit->price;?></p>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center justify-content-md-between pb-5 pt-2">
                        <div class="col-md-7 text-center">

                        <div class="listing-caption-mobile">
                            <h3 class="fs-4 mb-1"><?php echo get_the_title( $unit->ID );?></h3>
                            <p class="fs-5 m-0"><i class="fas fa-map-marker-alt"></i> Bucerías, Nayarit</p>
                            <p class="fs-5 m-0"><?php echo $unit->currency;?>$<?php echo $unit->price;?></p>
                        </div>

                            <hr style="width:100%;text-align:left;margin-left:0">

                            <div class="row justify-content-center">

                                <h3 class="col-md-4"> <i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> Recámaras</h3>
                                <h3 class="col-md-4"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> baños</h3>
                                <h3 class="col-md-4"><i class="fas fa-home"></i> <?php echo $unit->construction;?> m2</h3>
                                
                            </div>
                            <hr style="width:100%;text-align:left;margin-left:0">
                        </div>
                        <div class="col-md-2 text-center">
                            <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn-amarillo btn-lg mt-1 mt-md-4">Mas info</a>
                        </div>
                    </div>

                    <?php endforeach; ?>
                   
                <?php endif; ?>
    </div>
<?php get_footer(); ?>