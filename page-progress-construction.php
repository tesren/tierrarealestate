<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>
<div class="row">

        <div class="container mb-5">
                <div class="row justify-content-center">
                        <div class="col-10">
                                 <?php the_title('<h1>','</h1>');?>
                        </div>
                        <div class="col-10">
                                <div id="gallery" style="display:none;">
                                <a href="https://oceansingerlacruz.com">
                                <img alt="Progress construction"
                                        src="<?php echo get_template_directory_uri().'/assets/images/progress-construction/thumbs/picture-1.jpg';?>"
                                        data-image="<?php echo get_template_directory_uri().'/assets/images/progress-construction/high/picture-1.jpg';?>"
                                        data-description="Progress construction"
                                        style="display:none">
                                </a>

                                <a href="https://oceansingerlacruz.com">
                                <img alt="Progress construction"
                                        src="<?php echo get_template_directory_uri().'/assets/images/progress-construction/thumbs/picture-2.jpg';?>"
                                        data-image="<?php echo get_template_directory_uri().'/assets/images/progress-construction/high/picture-2.jpg';?>"
                                        data-description="Progress construction"
                                        style="display:none">
                                </a>

                                <a href="https://oceansingerlacruz.com">
                                <img alt="Progress construction"
                                        src="<?php echo get_template_directory_uri().'/assets/images/progress-construction/thumbs/picture-3.jpg';?>"
                                        data-image="<?php echo get_template_directory_uri().'/assets/images/progress-construction/high/picture-3.jpg';?>"
                                        data-description="Progress construction"
                                        style="display:none">
                                </a>

                                <a href="https://oceansingerlacruz.com">
                                <img alt="Progress construction"
                                        src="<?php echo get_template_directory_uri().'/assets/images/progress-construction/thumbs/picture-4.jpg';?>"
                                        data-image="<?php echo get_template_directory_uri().'/assets/images/progress-construction/high/picture-4.jpg';?>"
                                        data-description="Progress construction"
                                        style="display:none">
                                </a>

                                <a href="https://oceansingerlacruz.com">
                                <img alt="Progress construction"
                                        src="<?php echo get_template_directory_uri().'/assets/images/progress-construction/thumbs/picture-5.jpg';?>"
                                        data-image="<?php echo get_template_directory_uri().'/assets/images/progress-construction/high/picture-5.jpg';?>"
                                        data-description="Progress construction"
                                        style="display:none">
                                </a>

                                <a href="https://oceansingerlacruz.com">
                                <img alt="Progress construction"
                                        src="<?php echo get_template_directory_uri().'/assets/images/progress-construction/thumbs/picture-6.jpg;'?>"
                                        data-image="<?php echo get_template_directory_uri().'/assets/images/progress-construction/high/picture-6.jpg;'?>"
                                        data-description="Progress construction"
                                        style="display:none">
                                </a>

                        </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-12 col-md-12 col-lg-7 col-xl-6 p-5 contact-section-right mt-5">
                                <div class="row">
                                <div class="col-12 mb-4">
                                        <h3>Need more information!</h3>
                                        <p style="color:white;">Would you like to receive more information by email, please fill our form and we will be contacting you soon! If you rather you can reach us on our contact information bellow.</p>
                                </div>
                                <div class="col-12 text-center">
                                        <h3>Contact us</h3>
                                </div>
                                <div class="col-11 col-md-6 text-center mt-3">
                                        Maru De la Peña
                                        <a href="mailto:maru.dlpm@gmail.com" style="display:block;color:white; text-decoration:none;">maru.dlpm@gmail.com</a>
                                        Phone +52 322.306.0100
                                </div>
                                <div class="col-11 col-md-6 text-center mt-3">
                                        Chris Bouchard
                                        <a href="mailto:chris@remaxplayalacruz.com" style="display:block;color:white; text-decoration:none;">chris@remaxplayalacruz.com</a>
                                        Phone +52 322.173.3832
                                </div>
                                <div class="col-12 text-center mt-4">
                                        <a href="mailto:info@oceansingerlacruz.com" style="color:white; text-decoration:none;"><i class="fas fa-envelope-open-text"></i> info@oceansingerlacruz.com</a>
                                        <ul class="list-inline mt-2">
                                        <li class="list-inline-item"> <i class="fab fa-facebook-messenger"></i> Messenger</li>
                                        <li class="list-inline-item"><i class="fab fa-whatsapp"></i> Whatsapp</li>
                                        </ul>
                                </div>
                                </div>
                                
                        </div>
                        <div class="col-12 col-md-12 col-lg-5 col-xl-6 p-5">
                                <h3>Contact form</h3>

                                <form id="osContactForm" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php');?>">

                                <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        <label for="name">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                        <input type="email" name="email" id="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                        <input type="tel" name="phone" id="phone" class="form-control" id="phone" placeholder="Phone Number">
                                        <label for="phone">Phone number</label>
                                </div>
                                <div class="form-floating mb-3">
                                        <textarea class="form-control" name="message" placeholder="Write your message here!" id="message" style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                </div>
                                <div>
                                        <!-- <input class="btn-primary-osinger" type="submit" name="send" value="send message"> -->
                                <button type="submit" class="btn-primary-osinger">send message</button>
                                <!-- <small class="text-info form-control-msg js-form-submission">Submission in process, please wait...</small>
                                <small class="text-success form-control-msg js-form-success">Message succesfully submitted, thank you!</small>
                                <small class="text-danger form-control-msg js-form-error">There was a problem with the contact form, please try again</small> -->
                                </div>


                                </form>

                        </div>
                </div>
        
        </div>
</div>


<?php get_footer(); ?>