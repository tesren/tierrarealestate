<?php 
get_header(); 
?>

<?php 
        if ( have_posts() ):
            
            while( have_posts() ): the_post();
                 ?>
                 
                <div class="container text-start mt-5 fs-5">
                    <h1 class="text-center fs-1 my-5 pt-5"><?php echo the_title();?></h1>
                    <?php echo the_content();?>
                </div>

<?php       endwhile;
            
            endif;
    ?>

    

<?php get_footer(); ?>