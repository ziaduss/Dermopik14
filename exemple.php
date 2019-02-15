<?php
require('../fpdf181/fpdf.php');


class  myPDF extends FPDF{
    function header(){
        $this->Image('img/logo/dermapik7.jpg', 50, 6, 100);
        $this->SetFont('Arial','',16);
      //  $this->Cell(276, 5, 'Dermopik',0, 0, 'C');
        $this->Ln(); 
    }
    function footer(){

    }
}
$pdf = new myPDF();
$pdf->AddPage('', 'A4', 0);
//$pdf->SetFont('Arial','',16);
//$pdf->Cell(40,10,'Hello World !');
$pdf->Output();
?>