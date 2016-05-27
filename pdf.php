<?php
require('fpdf/fpdf.php');

$fecha            =  filter_input(INPUT_GET, 'fecha');
$nventa           =  filter_input(INPUT_GET, 'n_venta');
$cliente          =  filter_input(INPUT_GET, 'nombre');
$transaccion      =  filter_input(INPUT_GET, 'transaccion');
$producto         = filter_input(INPUT_GET, 'producto');
$cantidad         = filter_input(INPUT_GET, 'cantidad');
$valor            = filter_input(INPUT_GET, 'valor');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                or die('Can not connect: ' . \pg_last_error());    
    $query = "SELECT logo, linea1,linea2, id_tax, tel, dir FROM recibo";
    $result = pg_query($query) or die('The consult fail: ' . \pg_last_error());
    $row = pg_fetch_assoc($result); 
    $img= $row["logo"];    
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";        
    pg_close($dbconn);
     // Logo
    $this->Image($img,25,10,33);
    $this->Ln(25);
    $this->SetFont('Arial','',10);
    $this->Cell(0,5,'==============================',0,0,'C');
    $this->Ln(5);
    $this->Cell(0,3,utf8_decode($row["linea1"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,utf8_decode($row["linea2"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,utf8_decode($row["id_tax"]),0,0,'C');
    $this->Ln(4);
    $this->Cell(0,3,utf8_decode($row["tel"]),0,0,'C');    
    $this->Ln(4);    
    $this->Cell(0,3,$row["dir"],0,0,'C');
    $this->Ln(4);
    // Título
    $this->Ln(4);
    $this->Cell(0,5,'Recibo de venta',0,0,'C');
    $this->Ln(4);
    $this->Cell(0,5,'==============================',0,0,'C');    
    // Salto de línea
    $this->Ln(10);
}

 //Pie de página
function Footer()
{
    $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                or die('Can not connect: ' . \pg_last_error());    
    $query = "SELECT footer FROM recibo";
    $result = pg_query($query) or die('The consult fail: ' . \pg_last_error());
    $row = pg_fetch_assoc($result); 
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";        
    pg_free_result($result);
    pg_close($dbconn);
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";            
    // Posición: a 1,5 cm del final
    $this->SetY(-25);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,5,'================================',0,0,'C');
    $this->Ln(3);
    $this->Cell(0,10,'Impreso por... ',0,0,'C');
    $this->Ln(4);
    $this->Cell(0,10,$row["footer"],0,0,'C');
    $this->Ln(4);
    //$this->Cell(0,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
 $dbconn = pg_connect("host=localhost dbname=grpfleet user=db_admin password='12345'")
                                or die('Can not connect: ' . \pg_last_error());    
 $query = "SELECT moneda,vol FROM recibo";
 $result = pg_query($query) or die('The consult fail: ' . \pg_last_error());
 $row = pg_fetch_assoc($result); 
 
 pg_free_result($result);
 pg_close($dbconn);
$pdf = new PDF('P','mm',array(80,150));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,10,utf8_decode('Fecha: ').$fecha);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Número de transacción: ').$nventa);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Cliente: ').$cliente);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Tipo de transacción: ').$transaccion);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Producto: ').$producto);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Importe: ').utf8_decode($row["moneda"]).' '.$valor);
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Volumen: ').$cantidad." ".$row["vol"]);
$pdf->Output();

