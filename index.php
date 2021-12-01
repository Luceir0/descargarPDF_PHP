<?php
namespace Dompdf;
ini_set('display_errors', 1);
require_once './dompdf/autoload.inc.php';
//Hay que colocar archivo dompdf en la carpeta base.

if (isset($_POST['_descargar_'])) {
    $elFormulario= "
    <table border=1 align=center width=400>
    <tr><td>Nombre : </td><td>${_POST['_nombre_']}</td></tr>
    <tr><td>Email : </td><td>${_POST['_email_']}</td></tr>
    <tr><td>Edad : </td><td>${_POST['_edad_']}</td></tr>
    <tr><td>Pais : </td><td>${_POST['_pais_']}</td></tr>
    </table>
    ";
    $dompdf = new Dompdf();
    $dompdf -> loadHtml ($elFormulario);
    $dompdf->setPaper('A4', 'portrait');
    //'landscape' para horizontal.
        
    $dompdf->render();
    $dompdf->stream();
} else {
    echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
    echo "Nombre: <input type=text name='_nombre_'><br>";
    echo "Email: <input type=text name='_email_'><br>";
    echo "Edad: <input type=text name='_edad_'><br>";
    echo "País:<input type=text name='_pais_'><br>";
    echo "<input type=submit name='_descargar_' value='Descargar Factura'><br>";
    echo '</form>';
}



?>
