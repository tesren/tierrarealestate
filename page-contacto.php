<?php /*
@package vallarta4yourentalstheme
*/
get_header(); 
?>
<article class="container-fluid">
<div class="row justify-content-center">
    <div class="col-10">
    <?php the_title('<h1 style="color:#fff;">','</h1>');?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-10">
    <?php 
        if ( have_posts() ){
            
            while( have_posts() ){
                
                the_post();
                the_content(); ?>
                <div class="row">
                
                <form id="v4youContactForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php');?>">
                    <div class="col mb-3">
                    <input type="text" id="name" name="name" class="form-control" placeholder="your name" required="required">
                    <small class="text-danger form-control-msg">Escriba un nombre por favor</small>
                    </div>
                    <div class="col mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="your email" required="required">
                    <small class="text-danger form-control-msg">Escriba un correo por favor</small>
                    </div>
                    <div class="col mb-3">
                    <textarea name="message" id="message" name="message" class="form-control" required="required"></textarea>
                    <small class="text-danger form-control-msg">Escriba un mensaje por favor</small>
                    </div>
                    <button type="submit" class="btn btn-light">Submit</button>
                    <small class="text-info form-control-msg js-form-submission">Submission in process, please wait...</small>
                    <small class="text-success form-control-msg js-form-success">Message succesfully submitted, thank you!</small>
                    <small class="text-danger form-control-msg js-form-error">There was a problem with the contact form, please try again</small>
                    
                </form>
                </div>
    <?php   }
                
        } ?>
    </div>
</div>

</article>
<?php get_footer(); ?>