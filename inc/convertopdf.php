<?php

if(isset($_POST['sendpdf'])){

    $directorio = $_POST['directory'];

    require_once 'vendor/autoload.php';

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
    </div>

    <img src="'.$imagenSrc.'" alt="Imagen" width="100%" style="">

    <h1 align="center">'.$titulo.', '.$region.'</h1>

    <!--table style="width:100%">
        <tr>
            <th><img src="'.$imagenSrc2.'" alt=""></th>
            <th><img src="'.$imagenSrc3.'" alt=""></th>
            <th><img src="'.$imagenSrc4.'" alt=""></th>
        </tr>
    </table-->

    <hr>
    <h2 align="center">Precio: '.number_format($precio).' '.$currency.'</h2>
    <hr>
    <h3 align="center" style="color: #002a49;">Detalles</h3>
    <h5 align="center" style="color: #757575;">✔'.$bedrooms.' Recámaras ✔'.$baths.' Baños ✔Construcción: '.$const.' m² ✔Lote: '.$lote.'m² ✔'.$muebles.'</h5>
    <p style="margin:10pt; color: #757575;">'.$desc.'</p>

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

