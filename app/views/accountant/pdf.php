<?php
require "fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->Image('app/views/accountant/thekolaya.png',10,6);
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,20,'Hello',1,0,'C');
$pdf->Output();
?>