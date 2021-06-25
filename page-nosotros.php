<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>
    <!--Acerca del proyecto-->
    <div class="container d-flex justify-content-center mt-5 mb-5">
        <img style="height: 4rem;" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>" id="iconsvg">
        <h2 class="tierra_azul text-center fs-1">CONÓCENOS MEJOR</h2>
        <img style="height: 4rem;" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>" id="iconsvg">           
    </div>
    
    <!--VENDEDORES-->

    <div class="container-fluid text-center">
        <h2 class=fs-1>Nuestros Vendedores</h2>
        
        <div class="row justify-content-evenly">
            
            <div class="col-md-10 card my-3 mx-4" >
                    <div class="row justify-content-center text-center text-md-start ">
                        
                        <div class="col-md-4">
                            <img class="img-fluid p-2 w-70" src="<?php echo get_template_directory_uri() .'/assets/images/profile-pic.png'?>">
                        </div>
    
                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Ignacio</h4>
                            <h4 class="fs-4 my-2">Real Estate Agent</h4>
                            <h5 class="tr-nosotros-h4">+52 (322) 7797935</h5>
                            <h5 class="tr-nosotros-h4">ignacio@tierravallarta.com</h5>
                        </div>

                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Oficina</h4>
                            <h4 class="fs-4 my-2">Mexico Sotheby's International Realty</h4>
                            <h5 class="tr-nosotros-h4">Calle Julio Verne 9, Polanco <br> Ciudad de México</h5>
                        </div>
    
                    </div>
            </div>

            <div class="col-md-10 card my-3 mx-4" >
                    <div class="row justify-content-center text-center text-md-start ">
                        
                        <div class="col-md-4">
                            <img class="img-fluid p-2 w-70" src="<?php echo get_template_directory_uri() .'/assets/images/profile-pic.png'?>">
                        </div>
    
                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Frisek</h4>
                            <h4 class="fs-4 my-2">Real Estate Agent</h4>
                            <h5 class="tr-nosotros-h4">+52 (33) 1671 6536</h5>
                            <h5 class="tr-nosotros-h4">frisek@tierravallarta.com</h5>
                        </div>

                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Oficina</h4>
                            <h4 class="fs-4 my-2">Mexico Sotheby's International Realty</h4>
                            <h5 class="tr-nosotros-h4">Calle Julio Verne 9, Polanco <br> Ciudad de México</h5>
                        </div>
    
                    </div>
            </div>

            <div class="col-md-10 card my-3 mx-4" >
                    <div class="row justify-content-center text-center text-md-start ">
                        
                        <div class="col-md-4">
                            <img class="img-fluid p-2 w-70" src="<?php echo get_template_directory_uri() .'/assets/images/profile-pic.png'?>">
                        </div>
    
                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Oziel</h4>
                            <h4 class="fs-4 my-2">Real Estate Agent</h4>
                            <h5 class="tr-nosotros-h4">+52 (322) 1339409</h5>
                            <h5 class="tr-nosotros-h4">oziel@tierravallarta.com	</h5>
                        </div>

                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Oficina</h4>
                            <h4 class="fs-4 my-2">Mexico Sotheby's International Realty</h4>
                            <h5 class="tr-nosotros-h4">Calle Julio Verne 9, Polanco <br> Ciudad de México</h5>
                        </div>
    
                    </div>
            </div>

            <div class="col-md-10 card my-3 mx-4" >
                    <div class="row justify-content-center text-center text-md-start ">
                        
                        <div class="col-md-4">
                            <img class="img-fluid p-2 w-70" src="<?php echo get_template_directory_uri() .'/assets/images/profile-pic.png'?>">
                        </div>
    
                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Gina</h4>
                            <h4 class="fs-4 my-2">Real Estate Agent</h4>
                            <h5 class="tr-nosotros-h4">+52 (322) 1495357</h5>
                            <h5 class="tr-nosotros-h4">gina@tierravallarta.com</h5>
                        </div>

                        <div class="col-md-4 my-3">
                            <h4 class="fs-3 fw-bold tr-nosotros-h4">Oficina</h4>
                            <h4 class="fs-4 my-2">Mexico Sotheby's International Realty</h4>
                            <h5 class="tr-nosotros-h4">Calle Julio Verne 9, Polanco <br> Ciudad de México</h5>
                        </div>
    
                    </div>
            </div>

        </div>

    </div>

    <!--VALORES DE LA EMPRESA-->

    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 50vh;">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tierra_light text-center pb-4">VALORES DE LA EMPRESA</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-6 pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-handshake m-2 fa-2x" alt="Equipo"></i><p>Respeto</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6 pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-check fa-2x m-2" alt="Resolución"></i><p>Resolución</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fa-2x m-2" alt="Equipo"></i><p>Trabajo en equipo</p>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-4">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-tie fa-2x m-2" alt="Profesionalismo"></i><p>Profesionalismo</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="d-flex align-items-center justify-content-center">
                         <i class="fas fa-hand-paper fa-2x m-2" alt="Honestidad"></i><p>Honestidad</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--MISION-->
    <div class="container">
        <div style="height: 50vh;" class="row justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-12">
                    <h2 class="tierra_light text-center">MISIÓN</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="fs-3 text-center">Garantizarle al cliente productos de calidad y el mejor servicio de la bahía.
                        </p>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <!--VISION>
    <div class="container">
        <div style="height: 50vh;" class="row justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-12">
                    <h2 class="tierra_light text-center">VISION</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="fs-3 text-center">Ser la inmobiliaria que más venda en línea para el 2024.
                        </p>
                    </div>
                </div>
            </div>
        </div>   
    </div-->


<?php get_footer(); ?>
