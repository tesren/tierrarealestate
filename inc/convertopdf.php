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
    $imagenSrc2 = $_POST['imagen2'];
    $imagenSrc3 = $_POST['imagen3'];
    $imagenSrc4 = $_POST['imagen4'];

    $link = $_POST['permalink'];
    $logoSrc = $_POST['imglogo'];
    $directorio = $_POST['directory'];
    
    $css= file_get_contents($directorio.'/assets/css/pdf.css');
    $html = 
    '<div style="background-color:#A28234;">
        <table>
            <tr>
                <th><img width="30%" src="'.$logoSrc.'" alt="Logo"></th>
                <th> </th>
                <th><a href="'.$link.'" target="_blank">'.$link.'</a></th>
            </tr>
        </table>
        <h1 align="center">'.$titulo.', '.$region.'</h1>
    </div>
    <img src="'.$imagenSrc.'" alt="Imagen" width="100%" style="height:250pt;">
    <table style="width:100%">
        <tr>
            <th><img src="'.$imagenSrc2.'" alt=""></th>
            <th><img src="'.$imagenSrc3.'" alt=""></th>
            <th><img src="'.$imagenSrc4.'" alt=""></th>
        </tr>
    </table>
    <div style="background-color:#000; color:#fff;">
        <hr>
        <h2 align="center">Precio: '.number_format($precio).' '.$currency.'</h2>
        <hr>
        <h3 align="center">Detalles</h3>
        <h5 align="center">'.$bedrooms.' Recámaras / '.$baths.' Baños / Construcción: '.$const.' m² / Lote: '.$lote.'m² / '.$muebles.'</h5>
        <p style="margin:10pt;">'.$desc.'</p> 
    </div>
    <div style="background-color:#A28234; color:#fff;">
        <h3 align="center">Citas</h3>
        <h6>Ignacio Escamilla: +52 322 779 7935</h6>
        <h6 style="padding-bottom:8pt;">Gina Jiménez: +52 322 149 5357</h6>
    </div>';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetTitle($titulo);
    $mpdf->SetAuthor('Sitio web de Tierra');
    $mpdf->SetCreator('Sitio web de Tierra');
    $mpdf->SetSubject('Listing: '.$titulo);
    $mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output(); 
 
}

?>

