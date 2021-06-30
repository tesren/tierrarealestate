<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>

<!--Imagen con texto-->
<div class="row">
    <div class="col-12">
        

            <!--Imagen con texto-->
            <div class="container-fluid " style="position:relative;">
            <img class="img-fluid mb-5 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/bucerias.jpg';?>" alt="Bucerias ">
                <div class="caption-bucerias text-center">
                    <h1>Bucerías</h1>
                </div>
            </div>
    <!--Lifestyle-->
    <div class="container-fluid text-center px-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="icon-size d-flex justify-content-center">
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                    <h2 class="fs-1">LIFESTYLE</h2>
                    <img src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg';?>" class="iconsvg">
                </div>
            </div>
        </div>
        <div class="col-12 mb-5 fs-3 mt-2 mx-4">
            <p>Bucerías es un pintoresco pueblito en el estado de Nayarit. En Bucerías, que significa “lugar de buzos”, encontrará principalmente un sitio para relajarse del ajetreo de la vida diaria, donde podrá contemplar el sigiloso vuelo de las aves, disfrutar de largas caminatas por la playa, paseos a caballo, surfear y por supuesto bucear. En el corazón de este colorido pueblito no encontrará más que la plaza central, su mercado local, lugares de hospedaje, la iglesia, el colegio y encantadores restaurantes donde se sirven los más frescos platillos de mariscos y otras especialidades.
            </p>
        </div>       
    </div>

    <h3 class="text-center my-5 fs-1">Recomendaciones de Restaurantes</h3>

    <!--carrusel restaurantes-->
    <div id="carouselRestas" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
            <img class="d-block w-100 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/organik.jpeg';?>">
                <div class="carousel-caption d-md-block">
                    <a class="btn btn-primary"><h2 class="fs-1">Organi-k</h2></a>
                </div>
            </div>

            <div class="carousel-item">
            <img class="d-block w-100 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/la-postal.jpeg';?>">
                <div class="carousel-caption d-md-block">
                    <a class="btn btn-primary"><h2 class="fs-1">La Postal</h2></a>
                </div>
            </div>

            <div class="carousel-item">
            <img class="d-block w-100 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/sandrinas.jpeg';?>">
                <div class="carousel-caption d-md-block">
                <a class="btn btn-primary"><h2 class="fs-1">Sandrinas</h2></a>
                </div>
            </div>

            <div class="carousel-item">
            <img class="d-block w-100 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/maizul.jpeg';?>">
                <div class="carousel-caption d-md-block">
                <a class="btn btn-primary"><h2 class="fs-1">Maizul</h2></a>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestas" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselRestas" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h3 class="text-center px-5 pt-5 pb-2 fs-1">Recomendaciones de BARES</h3>

    <!--carrusel Bares-->
    <div id="carouselBares" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
            <img class="d-block w-100 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/la-negra.jpeg';?>">
                <div class="carousel-caption d-md-block">
                    <a class="btn btn-primary"><h2 class="fs-1">La negra</h2></a>
                </div>
            </div>

            <div class="carousel-item">
            <img class="d-block w-100 tr-img-responsive" src="<?php echo get_template_directory_uri() .'/assets/images/drunken-duck.jpeg';?>">
                <div class="carousel-caption d-md-block">
                    <a class="btn btn-primary"><h2 class="fs-1">The Drunken Duck</h2></a>
                </div>
            </div>


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBares" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBares" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--VIVE EN-->
    <div style="position: relative; text-align: center;" class="container-fluid pt-5 pb-5">
        <div class="row justify-content-center">

            <h4 style="font-size: 3.5rem; z-index: 1;" class="texto-encima">VIVE EN BUCERIAS</h4>
            
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo get_template_directory_uri() .'/assets/images/vive-bucerias.jpg';?>" class="p-0 tr-img-responsive img-fluid" alt="vive en">    
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo get_template_directory_uri() .'/assets/images/snorkel.jpg';?>" class="p-0 tr-img-responsive img-fluid" alt="vive en">
                    </div>
                    
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            
        </div>
    </div>

    <!--MAPA-->
    <div class="container-fluid">
        <div style="height: 50vh;" class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29847.097611788773!2d-105.35147876339234!3d20.755365513396434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842140950f9c5c33%3A0xb77539c48b2e548f!2zQnVjZXLDrWFzLCBOYXku!5e0!3m2!1ses-419!2smx!4v1623869454470!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>

</div>


<?php get_footer(); ?>