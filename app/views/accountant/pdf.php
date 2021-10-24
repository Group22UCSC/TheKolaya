<?php
// require('../accountant/fpdf/fpdf.php');
require('../app/libs/fpdf/fpdf.php');
// http://localhost/Thekolaya/libs/fpdf/fpdf.php
// http://localhost/Thekolaya/productmanager/updateAuction
// D:\Program Files\Xampp\htdocs\TheKolaya\app\libs\fpdf

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/thekolaya.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


}

// Instanciation of inherited class
$pdf = new PDF();


$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
/*output the result*/
$pdf->Image('images/thekolaya.png',10,6,30);
/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Cell(60 ,10,'',0,0);
$pdf->Cell(59 ,5,'The Kolaya Invoice',0,0);
$pdf->Cell(59 ,30,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Samrin Tea Factory',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'No 218,',0,0);
$pdf->Cell(25 ,5,'Landowner ID:',0,0);
$pdf->Cell(34 ,5,'0012',0,1);

$pdf->Cell(130 ,5,'Nakiyadeniya,',0,0);
$pdf->Cell(25 ,5,'Invoice Date:',0,0);
$pdf->Cell(34 ,5,'12th Oct 2021',0,1);
 
$pdf->Cell(130 ,5,'Sri Lanka.',0,0);
$pdf->Cell(25 ,5,'Invoice No:',0,0);
$pdf->Cell(34 ,5,'INV001',0,1);


$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);



$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(10 ,6,'Sl',1,0,'C');
$pdf->Cell(80 ,6,'Description',1,0,'C');
$pdf->Cell(23 ,6,'Qty',1,0,'C');
$pdf->Cell(30 ,6,'Unit Price',1,0,'C');
$pdf->Cell(20 ,6,'Sales Tax',1,0,'C');
$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);
    for ($i = 0; $i <= 10; $i++) {
		$pdf->Cell(10 ,6,$i,1,0);
		$pdf->Cell(80 ,6,'For Tea Supply',1,0);
		$pdf->Cell(23 ,6,'1',1,0,'R');
		$pdf->Cell(30 ,6,'15000.00',1,0,'R');
		$pdf->Cell(20 ,6,'100.00',1,0,'R');
		$pdf->Cell(25 ,6,'15100.00',1,1,'R');
	}
		

$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(25 ,6,'Subtotal',0,0);
$pdf->Cell(45 ,6,'151000.00',1,1,'R');


$pdf->Output();

?>