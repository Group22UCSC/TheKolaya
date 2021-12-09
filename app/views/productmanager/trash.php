        <!-- updateAuction table -->
        <?php
            $x = count($data1);
            $dateToday=date("Y-m-d");
            for($i = 0; $i < $x; $i++) {
          
            $dt = date('Y-m-d', strtotime($data1[$i]['date']));
                 echo'<tr>
                    <td class="tdcls">'.$data1[$i]['date'].'</td>
                    <td class="tdcls">'.$data1[$i]['product_id'].'</td>
                    <td class="tdcls">'.$data1[$i]['product_name'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_amount'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_price'].'</td>
                    <td class="tdcls">'.$data1[$i]['name'].'</td>
                    <td class="tdcls">'.$data1[$i]['sold_amount']*$data1[$i]['sold_price'].'</td>
                    <td class="tdcls">'.
                                        (($dt==$dateToday)?  '<a class="deleteBtn" href="">Delete</a>': " NoAction ")  .'</td>
                </tr>';
                    
            }
          ?>





<!--  fpdf -->
<?php
require "fpdf/fpdf.php";

class myPDF extends FPDF{
    function header(){
        //$this->Image('fpdf/fpdf.php/thekolaya.png',10,6);
        $this->SetFont('Arial','B',13);
        $this->Cell(100,20,'තේ කොළය Invoice',1,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(100,20,'තේ කොළය Invoice',1,0,'C');
        $this->Ln();
    }
}
$pdf = new FPDF();
$pdf->Image('fpdf/fpdf.php/thekolaya.png',10,6);
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(100,20,'තේ කොළය Invoice',1,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->Cell(100,20,'තේ කොළය Invoice',1,0,'C');
        $pdf->Ln();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->Output();







// $('.error').remove();
//       var Year=$('#year').val();
//       var Month = $('#month').val();
//       var price = $('#price').val();
     
//       //console.log(amount+pid+price+bid);
//       var action='save';
//       if(price < 0) {
//           // $('#amount').parent().after("<p class=\"error\">Amount cannot be negative</p>");
//           $('#price').parent().after("<p class=\"error\">*Price cannot be negative</p>");
//       }else if(amount == 0) {
//           $('#price').parent().after("<p class=\"error\">*Please insert a valid price</p>")
//       }
      
//       if(price <= 0) {
//           return;
//       }
?>  