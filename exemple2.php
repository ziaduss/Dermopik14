<?php
require('../fpdf181/fpdf.php');

session_start();

if (empty($_SESSION['pharmacie_id']) && empty($_SESSION['pharmacie_name']))
  header('Location: ./');

$db = new PDO('mysql:host=localhost:8080;dbname=dermopik', 'root', 'rootpass');

class  myPDF extends FPDF{
    function header(){
        $this->Image('img/logo/dermapik1.jpg', 10, 6, 30);
        $this->SetFont('Arial','BIU',18);
        $this->Cell(230, 5, 'Resultat test Dermopik :',0, 0, 'C');
        $this->Ln(30); 
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Times', '', 12);
        $this->Cell(0, 10, 'Merci de votre visite et a bientot',0 ,0 ,'C');
    }
    function headerTable (){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 10, $_SESSION['form_result'], 0, 0, 'C');
        //$this->Ln();
      //  $this->SetFont('Times', 'B', 12);
       // $this->Cell(30, 10, $_SESSION['age'], 0, 0, 'C');
        $this->Ln();
    }
    function ViewTable($db){
        $this->SetFont('Times', '', 12);
        $stmt = $db->query('select age from questionnaire');
        $this->Cell(20, 10, $data->age, 0, 0, 'C');
        $this->Ln();
    }    
}
$pdf = new myPDF();
$pdf->AddPage('', 'A4', 0);
$pdf->headerTable();
$pdf->ViewTable($db);
//$pdf->SetFont('Arial','',16);
//$pdf->Cell(40,10,'Hello World !');
$pdf->Output();
?>