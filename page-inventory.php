<?php /*
@package vallarta4yourentalstheme
*/
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>
<div class="row">
    <div class="container">

        <div class="col-12">

            <div class="row justify-content-md-center justify-content-lg-center mt-5 mb-5">

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 contact-section-right">
                    
                    <div class="p-5">

                        <?php the_title('<h1 class="text-center" style="color:white;">','</h1>');?>
                        <p style="color:white;">Check our availability</p>
                        
                        
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fas fa-square disponible"></i> Available
                            </li>
                            <li class="list-inline-item">
                                <i class="fas fa-square reservado"></i> On hold
                            </li>
                            <li class="list-inline-item">
                                <i class="fas fa-square vendido"></i> Sold
                            </li>
                        </ul>


                    </div>
                    
                </div>

                <div class="col-12 col-sm-6 col-md-7 col-lg-5">
                    <?php 
                        if ( have_posts() ){
                            
                            while( have_posts() ){
                                
                                the_post();
                                the_content(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inventario-contenedor-2">
                                            <div class="activo" id="facade2">
                                                <img class="papel-tapiz" width="500" height="281" src="<?php echo get_template_directory_uri() .'/assets/images/ocean-singer-building.jpg';?>" alt="Fachada Posterior ZoHo Skies">
                                                <svg width="100%" height="100%" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                            
                                                    <g>
                                                        <polygon class="hoverable disponible" points="201,186 328,178 331,204 201,214" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>

                                                     <g>
                                                        <polygon class="hoverable disponible" points="201,159 330,154 331,177 197,189" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 200"/>
                                                    </g>

                                                    <g>
                                                        <polygon class="hoverable disponible" points="201,130 331,129 331,154 201,158" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 300"/>
                                                    </g>

                                                     <g>
                                                        <polygon class="hoverable disponible" points="201,103 329,104 331,130 201,130" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 400"/>
                                                    </g>

                                                     <g>
                                                        <polygon class="hoverable reservada" points="201,75 331,79 331,105 199,102" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 500"/>
                                                    </g>

                                                    <g>
                                                        <polygon class="hoverable vendida" points="201,40 331,52 330,81 199,74" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 500"/>
                                                    </g>
                                        
                                                    <!-- Singer -->

                                                    <g>
                                                        <polygon class="hoverable disponible" points="52,194 162,187 162,216 57,223" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>

                                                    <g>
                                                        <polygon class="hoverable disponible" points="53,160 162,160 163,188 52,193" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>

                                                    <g>
                                                        <polygon class="hoverable disponible" points="52,129 160,129 160,158 51,159" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>

                                                     <g>
                                                        <polygon class="hoverable disponible" points="51,97 160,101 158,130 51,130" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>

                                                     <g>
                                                        <polygon class="hoverable disponible" points="53,65 157,71 157,103 52,97" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>

                                                     <g>
                                                        <polygon class="hoverable disponible" points="54,28 158,38 159,71 52,64" onclick="showFloorPlan(this);"  data-unit="Ocean" data-number="Ocean 100"/>
                                                    </g>


                                                </svg> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                
                                </div>
                    <?php   }
                                
                        } ?>

                </div>

            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>