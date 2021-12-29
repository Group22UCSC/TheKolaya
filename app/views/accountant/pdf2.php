<?php
require('../app/libs/fpdf/fpdf.php');

//db connection
// $con = mysqli_connect('localhost','root','');
// mysqli_select_db($con,'thekolaya');

// echo $data[0]['lid'];
//get invoices data
// $query = mysqli_query($con,"select * from invoice
// 	inner join clients using(clientID)
// 	where
// 	invoiceID = '".$_GET['invoiceID']."'");
// $query=mysqli_query($con,"SELECT * FROM monthly_payment ORDER BY Date DESC");
// $invoice = mysqli_fetch_array($query);
// print_r($data);
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
// print_r($data);
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->Cell(10 ,7,'',0,0);
$pdf->Image('images/thekolaya.png',10,6,30);
/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

$pdf->Cell(164 ,10,'The Kolaya Invoice',0,0,'C');
$pdf->SetFont('Arial','',15);


$pdf->Cell(59 ,20,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Samrin Tea Factory',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'No 218,',0,0);
$pdf->Cell(25 ,5,'Landowner ID:',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34 ,5,$data[0]['lid'],0,1);
$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'Nakiyadeniya,',0,0);
$pdf->Cell(25 ,5,'Invoice Date:',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34 ,5,$data[0]['Date'],0,1);
$pdf->SetFont('Arial','',10);
 
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





// ********** OLD WORKING PDF ***** //


// $pdf->Cell(60 ,10,$data[0]['Date'],0,0);
// $pdf->Cell(59 ,5,'The Kolaya Invoice',0,0);
// $pdf->Cell(59 ,30,'',0,1);

// //set font to arial, regular, 12pt
// $pdf->SetFont('Arial','',12);

// $pdf->Cell(130	,5,'[Street Address]',0,0);
// $pdf->Cell(59	,5,'',0,1);//end of line

// $pdf->Cell(130	,5,'[City, Country, ZIP]',0,0);
// $pdf->Cell(25	,5,'Date',0,0);
// // $pdf->Cell(34	,5,$data[0]['final_payment'],0,1);//end of line

// $pdf->Cell(130	,5,'Phone [+12345678]',0,0);
// $pdf->Cell(25	,5,'Invoice #',0,0);
// // $pdf->Cell(34	,5,$invoice['lid'],0,1);//end of line

// $pdf->Cell(130	,5,'Fax [+12345678]',0,0);
// $pdf->Cell(25	,5,'Customer ID',0,0);
// $pdf->Cell(34	,5,$invoice['year'],0,1);//end of line

// //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

// //billing address
// $pdf->Cell(100	,5,'Bill to',0,1);//end of line

// //add dummy cell at beginning of each line for indentation
// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,$invoice['lid'],0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,$invoice['month'],0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,$invoice['month'],0,1);

// $pdf->Cell(10	,5,'',0,0);
// $pdf->Cell(90	,5,$invoice['month'],0,1);

// //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189	,10,'',0,1);//end of line

// //invoice contents
// $pdf->SetFont('Arial','B',12);

// $pdf->Cell(130	,5,'Description',1,0);
// $pdf->Cell(25	,5,'Taxable',1,0);
// $pdf->Cell(34	,5,'Amount',1,1);//end of line

// $pdf->SetFont('Arial','',12);



















$pdf->Output();
?>