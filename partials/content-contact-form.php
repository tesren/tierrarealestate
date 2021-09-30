<div class="row">

    <div class="col-lg-6  text-center text-lg-end px-xxl-5 my-5" id="texto-formulario">
        <h3><?php pll_e( 'Descripción Formulario Contacto' );?></h3>
        <!-- <h3>Solicite mas información y consulte con nuestro equipo profesional</h3> -->
    </div>
    
    <!--formulario-->
    <div class="col-lg-6 text-center">
        <h3 class="pt-3 px-3 px-xxl-5 fs-1"><?php pll_e( 'Título Formulario Contacto' );?></h3>

        <?php echo do_shortcode( '[cf7form cf7key="formulario-de-contacto-1"]', true ) ?>
    </div>

</div>