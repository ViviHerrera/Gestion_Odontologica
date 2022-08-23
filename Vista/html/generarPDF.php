<?php
//Incluimos el fichero de conexion
//require("../Modelo/Conexion.php");

//Incluimos la libreria PDF
require('C:\xampp\htdocs\EstructuraDeProyecto\Vista\fpdf\fpdf.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        // Add logo to page
        $this->Image('C:\xampp\htdocs\EstructuraDeProyecto\Vista\img\LOGO.png',17,6.4,22);

        // Set font family to Arial bold 
        $this->SetFont('Arial','B',18);

        // Move to the right
        $this->Cell(80);

        // Header
        $this->Cell(95,10,'Comprobante de cita',1,0,'C');

        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {

        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Pag. ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Instantiation of FPDF class
$pdf = new PDF('L','mm','A4');

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
////////////////////////////////////////////////////////////////////////////////

// // Declaramos el ancho de las columnas

// $w = array(38, 45, 35);
// // //          N   A  D    E   G   E  P  LGN  ESC

// //Declaramos el encabezado de la tabla
// $pdf->Cell(38,12,'Nombre',1);
// $pdf->Ln();
// $pdf->Cell(45,12,'Apellido',1);
// $pdf->Ln();
// $pdf->Cell(35,12,'Documento',1);
// // $pdf->Cell(15,12,'Edad',1);
// // $pdf->Cell(30,12,'Genero',1);
// // $pdf->Cell(18,12,'Estatura',1);
// // $pdf->Cell(17,12,'Peso',1);
// // $pdf->Cell(45,12,'Lugar de Nacimiento',1);
// // $pdf->Cell(35,12,'Estado Civil',1);
// // //$pdf->Cell(50,12,utf8_decode('Contraseña'),1);
// $pdf->Ln();

// Mostrar contenido Tabla
    $pdf->Text(20,40,'Documento:');
    $pdf->Text(20,50,utf8_decode('Nombre:'));
    $pdf->Text(20,60,utf8_decode('Apellido:'));
    $pdf->Text(20,70,'Fecha:');
    $pdf->Text(20,80,'Hora:');
    $pdf->Text(20,90,utf8_decode('Medico:'));
    $pdf->Text(20,100,'Consultorio:');
    $pdf->Text(20,110,'Estado:');  
    
foreach($result as $row) {
    $pdf->Text(60,40,$row['pacidentificacion'],1);
    $pdf->ln();
    $pdf->Text(60,50,$row['pacnombres'],1);
    $pdf->ln();
    $pdf->Text(60,60,$row['pacapellidos'],1);
    $pdf->ln();
    $pdf->Text(60,70,$row['citfecha'],1);
    $pdf->ln();
    $pdf->Text(60,80,$row['cithora'],1);
    $pdf->ln();
    $pdf->Text(60,90,$row['mednombres'],1);
    $pdf->ln();
    $pdf->Text(60,100,$row['connumero'],1);
    $pdf->ln();
    $pdf->Text(60,110,$row['citestado'],1);
    $pdf->ln();

}
?>