<?php get_header();?>

    <div class="container-fluid p-0">
        

        <?php if( have_posts() ): $i=0; ?>

            <!--Developments-->
            <h1 class="fw-bold grey-title my-5 text-center pt-5"><?php pll_e('Desarrollos');?></h1>
                    
           
            <div class="row justify-content-center">

                <?php while( have_posts() ) : the_post(); ?>
                    
                    <!--Desarrollo--> 
                    <div class="col-11 col-md-8 text-center mb-5" style="position:relative">
                        
                        <?php  $featImg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
                        <img class="w-100 archive-dev-img" src="<?php echo $featImg[0]; ?>" alt="<?php echo the_title();?>">

                        <div class="archive-dev-info">
                            <h2 class="fs-1 mb-0 mt-2"><?php echo the_title(); ?></h2>
                            <span class="fs-5 my-2 d-block"><i class="fas fa-map-marker-alt"></i> <?php echo tierra_get_list_terms(get_the_ID(), 'regiones'); ?></span>
                            <a href="<?php echo get_the_permalink(); ?>" class="btn btn-amarillo btn-lg"><?php pll_e('Más info'); ?></a>
                        </div>
                        
                    </div>

                <?php endwhile; 
                the_posts_pagination();?>

            </div>

        <?php endif; ?>
  
    </div>

<?php get_footer(); ?>