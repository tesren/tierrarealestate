<div class="row">

        <div class="col-lg-6  text-center text-lg-end px-xxl-5 my-5" id="texto-formulario">
            <h3><?php pll_e( 'Descripción Formulario Contacto' );?></h3>
            <!-- <h3>Solicite mas información y consulte con nuestro equipo profesional</h3> -->
        </div>
        
        <!--formulario-->
        <div class="col-lg-6 text-center">
            <h3 class="pt-3 px-3 px-xxl-5 fs-1"><?php pll_e( 'Título Formulario Contacto' );?></h3>
            <form id="v4youContactForm" action="#" class="text-center px-3 px-xxl-5" method="POST" data-url="<?php echo admin_url('admin-ajax.php');?>">
                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande"><?php pll_e( 'Campo Nombre' );?></h4>
                    <input type="text" class="form-control" id="name" name="name" placeholder="nombre" required>
                    <label class="labels-form-small" for="name"><?php pll_e( 'Campo Nombre' );?></label>
                </div>

                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande"><?php pll_e( 'Campo Email' );?></h4>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label class="labels-form-small" for="email"><?php pll_e( 'Campo Email' );?></label>
                </div>

                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande"><?php pll_e( 'Campo Teléfono' );?></h4>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="322 555 5555" required>
                    <label class="labels-form-small" for="telefono"><?php pll_e( 'Campo Teléfono' );?></label>
                </div>

                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande"><?php pll_e( 'Campo Mensaje' );?></h4>
                    <textarea class="form-control" placeholder="<?php pll_e( 'Campo Mensaje' );?>" id="message" name="message" style="height: 150px" required></textarea>
                    <label class="labels-form-small" for="message"><?php pll_e( 'Campo Mensaje' );?></label>
                </div>

                
                <button style="border-radius:0;" type="submit" class="btn btn-amarillo btn-lg"><?php pll_e( 'Botón Enviar' );?></button>

            </form>
        </div>

    </div>