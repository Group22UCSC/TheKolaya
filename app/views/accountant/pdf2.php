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
// print_r($data1[]);
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

// ******** calculating the bill period
$year=$data[0]['year'];
$month=$data[0]['month'];
$date= strtotime($year."-".$month."-01" );
$first = date('Y-m-01',$date); // hard-coded '01' for first day
$last  = date('Y-m-t',$date);
// echo $last;
//set font to arial, bold, 14pt
$pdf->Cell(10 ,7,'',0,0);
$pdf->Image('images/thekolaya.png',10,6,30);
/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);


$pdf->Cell(164 ,10,'The Kolaya Invoice',0,0,'C');
$pdf->SetFont('Arial','',15);
$pdf->SetTextColor(0,0,0);

$pdf->SetTextColor(87,87,87);

$pdf->Cell(59 ,20,'',0,1);
//cell width , height, value, [0-same line,1-new line]
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
$pdf->Cell(25 ,5,'Payment Date:',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34 ,5,$data[0]['Date'],0,1);
$pdf->SetFont('Arial','',10);
 
$pdf->Cell(130 ,5,'Sri Lanka.',0,0);
$pdf->Cell(25 ,5,'Invoice No     :',0,0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(34 ,5,'INV-0'.$data[0]['invoice_no'],0,1);
$pdf->SetFont('Arial','',10);


$pdf->Cell(130 ,5,'091-2245345',0,0);
$pdf->Cell(189 ,5,'',0,1);
$pdf->Cell(30 ,10,'Payment Period :',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18 ,10,$first.' - '.$last,0,0);
$pdf->Cell(13 ,15,'',0,1);
$pdf->SetFont('Arial','',10);

// ******* boxes
$pdf->SetTextColor(87,87,87);
$pdf->SetFont('Arial','B',10);
// $pdf->Multicell(40 ,8,"Gross Income\n Rs.".$data[0]['income'],1,'C',FALSE);
// $pdf->Multicell(40 ,8,"Gross Income\n Rs.".$data[0]['income'],1,'C');

// $pdf->multicell(40, 8, "Gross Income\n Rs.".$data[0]['income'], 1, 'C', false);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetDrawColor(1,1,1);
$pdf->SetLineWidth(0.4);
$pdf->multicell(38,8,"Gross Income\n Rs.".$data[0]['income'],1,'C');
$pdf->SetXY($x + 40, $y);
$pdf->Cell(5 ,10,'- ',0,0);
$pdf->SetDrawColor(1,1,255);
$pdf->multicell(44,8,"Advance Expenses\n Rs.".$data[0]['advance_expenses'],1,'C');
// $x = $pdf->GetX();
// $y = $pdf->GetY();
$pdf->SetXY($x + 89, $y);
$pdf->Cell(6 ,10,' - ',0,0);
$pdf->multicell(42,8,"Fertilizer Expenses\n Rs.".$data[0]['fertilizer_expenses'],1,'C');


$pdf->SetXY($x + 139, $y);
$pdf->Cell(9 ,10,' = ',0,0);
$pdf->SetTextColor(255,0,0); // font color red
$pdf->SetDrawColor(255,1,1);// set border color to black
$pdf->multicell(40,8,"Final Payment\n Rs.".$data[0]['final_payment'],1,'C');
$pdf->SetTextColor(0,0,0);// set font color back to black
$pdf->SetDrawColor(80,80,80);// set border color back to black

// $pdf->multicell(40, 8, "Advance Expenses\n Rs.".$data[0]['advance_expenses'], 1, 'C', false);

// $pdf->Cell(70, -5, '  sds ' , 0, 'l', false);





$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
// $pdf->Cell(30 ,10,'',0,1);

$pdf->Cell(20 ,10,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(178,190,181);
$pdf->Cell(50 ,10,'Tea Supply Details',0,1);
$pdf->SetTextColor(0,0,0);


$pdf->SetFont('Arial','B',10);

// ************ Table ************
/*Heading Of the table*/
$pdf->SetTextColor(80,80,80);

$pdf->SetLineWidth(0.2);
$pdf->Cell(10 ,8,'No',1,0,'L');
$pdf->Cell(22 ,8,'Date',1,0,'L');
$pdf->Cell(30 ,8,'Initial Weight(kg)',1,0,'L');
$pdf->Cell(32 ,8,'Water Reduc(kg)',1,0,'L');
$pdf->Cell(32 ,8,'Container Re(Kg)',1,0,'L');
$pdf->Cell(28 ,8,'Mature Tea(Kg)',1,0,'L');
$pdf->Cell(33 ,8,'Net Weight(Kg)',1,1,'L');
// $pdf->Cell(25 ,6,'',1,1,'C');
/*Heading Of the table end*/
$len=sizeof($data1);
// print_r($data1);
// echo $len;
$totTeaWeight=0.0;
$pdf->SetFont('Arial','',10);
    for ($i = 0; $i < $len; $i++) {
		$pdf->Cell(10 ,6,$i+1,1,0);
		$pdf->Cell(22 ,6,$data1[$i]['date'],1,0,'L');
		$pdf->Cell(30 ,6,$data1[$i]['initial_weight_sup'],1,0,'L');//initial_weight_sup
		$pdf->Cell(32 ,6,$data1[$i]['water_precentage'],1,0,'L');//water reduction
		$pdf->Cell(32 ,6,$data1[$i]['container_precentage'],1,0,'L');
		$pdf->Cell(28 ,6,$data1[$i]['matured_precentage'],1,0,'L');
		$pdf->Cell(33 ,6,$data1[$i]['net_weight'],1,1,'L');
		$totTeaWeight=$totTeaWeight+$data1[$i]['net_weight'];
		// $pdf->Cell(40 ,6,'15100.00',1,1,'R');
	}
		

$pdf->Cell(126 ,6,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(28 ,6,'Subtotal',0,0);
$pdf->Cell(33 ,6,$totTeaWeight,1,1,'L');


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



















// $pdf->Output();
?>