<?php

if(isset($_POST['sendpdf'])){

    require_once $_SERVER['DOCUMENT_ROOT'].'/wordpress-tierra/wp-content/themes/tierra/inc/vendor/autoload.php';

    $titulo = $_POST['titulo'];
    $desc   = $_POST['descripcion'];
    $region = $_POST['region'];
    $precio = $_POST['precio'];
    $currency = $_POST['currency'];
    $bedrooms = $_POST['bedrooms'];
    $baths  = $_POST['bathrooms'];
    $const = $_POST['const'];
    $lote = $_POST['lote'];
    $muebles = $_POST['furniture'];
    $imagenSrc = $_POST['imagen'];


    $html = '<h1>'.$titulo.'</h1><h5>'.$region.'</h5><p>'.$precio.$currency.'</p><img src="'.$imagenSrc.'" alt="Imagen" width="80%"><p>'.$desc.'</p>';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetTitle($titulo);
    $mpdf->SetAuthor('Sitio web de Tierra');
    $mpdf->SetCreator('Sitio web de Tierra');
    $mpdf->SetSubject('Listing: '.$titulo);
    $mpdf->WriteHTML($html);
    $mpdf->Output(); 
 
}


?>



