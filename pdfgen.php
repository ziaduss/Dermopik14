<?php

session_start();
require_once('php/App.php');
require('fpdf181/fpdf.php');

if (empty($_SESSION['pharmacie_id']) && empty($_SESSION['pharmacie_namepharmacie_name']))
  header('Location: ./');

//require('php/connection.php');
//$db = new PDO('php/connection.php');

$dataQ = App::getDb()->prepare('
        SELECT * FROM questionnaire',
		[''], true, true, false);

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
        $this->SetFont('Times','',18);
        $this->Cell(170, 5, 'vos reponses :',0, 1, 'C');
        $this->SetFont('Times', 'B', 8);
       // $this->Cell(75, 5, 'Avez-vous eu une éruption cutanée ',1, 0, 'C');
       // $this->Cell(0, 5, 'semblable à celle de l\'image ci-dessous sur les plis de vos coudes, derrière vos genoux ou devant vos chevilles ?',2, 0, 'C');
        $this->Image('img/patho/coude.png', 10, 50, 50);
        $this->Image('img/patho/main.png', 100, 50, 50);
        $this->Image('img/patho/cou_oeil.png', 10, 100, 50);
        $this->Image('img/patho/pied.png', 100, 100, 50);
     //   $this->Cell(30, 10, $_SESSION['pharmacie_id'], 1, 0, 'C');
        $this->Ln();
    }
 
}
$pdf = new myPDF();
$pdf->AddPage('', 'A4', 0);
//$pdf->headerTable();
$texte1="Votre peau vous démange-t-elle fréquemment ? ";
$texte2="Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous sur les plis de vos coudes, derrière vos genoux ou devant vos chevilles ?";
$texte3="Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous sur le dos de vos mains ?";
$texte4="Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous autour du cou, des yeux ou des oreilles ?";
$texte5="Avez-vous eu une éruption cutanée semblable à celle de l'image ci-dessous aux pieds ou aux talons ?";
$pdf->SetFont('Times','U',18);
$pdf->Cell(170, 5, utf8_decode('vos réponses :'),0, 1, 'L');
$pdf->Image('img/patho/coude.png', 28, 92, 50);
$pdf->Image('img/patho/main.png', 115, 92, 50);
$pdf->Image('img/patho/cou_oeil.png', 28, 143, 50);
$pdf->Image('img/patho/pied.png', 115, 143, 50);
$pdf->SetXY(65,50);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(60,4,utf8_decode($texte1));
$pdf->SetXY(90,60);
$pdf->SetFont('Arial','B',12);
if ($_SESSION['repQ1'] == '1')
    $pdf->MultiCell(60,4,utf8_decode('Réponse : Oui'));
else
$pdf->MultiCell(60,4,utf8_decode('Réponse : Non'));

$pdf->SetXY(15,70);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(75,4,utf8_decode($texte2));
$pdf->SetXY(40,113);
$pdf->SetFont('Arial','B',12);
if ($_SESSION['repQ2'] == '1')
    $pdf->MultiCell(60,4,utf8_decode('Réponse : Oui'));
    else
    $pdf->MultiCell(60,4,utf8_decode('Réponse : Non'));
$pdf->SetXY(105,70);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(75,4,utf8_decode($texte3));
$pdf->SetXY(128,113);
$pdf->SetFont('Arial','B',12);
if ($_SESSION['repQ3'] == '1')
$pdf->MultiCell(60,4,utf8_decode('Réponse : Oui'));
else
$pdf->MultiCell(60,4,utf8_decode('Réponse : Non'));
$pdf->SetXY(15,125);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(75,4,utf8_decode($texte4));
$pdf->SetXY(40,165);
$pdf->SetFont('Arial','B',12);
if ($_SESSION['repQ4'] == '1')
$pdf->MultiCell(60,4,utf8_decode('Réponse : Oui'));
else
$pdf->MultiCell(60,4,utf8_decode('Réponse : Non'));
$pdf->SetXY(105,125);
$pdf->SetFont('Arial','I',12);
$pdf->MultiCell(75,4,utf8_decode($texte5));
$pdf->SetXY(128,165);
$pdf->SetFont('Arial','B',12);
if ($_SESSION['repQ5'] == '1')
$pdf->MultiCell(60,4,utf8_decode('Réponse : Oui'));
else
$pdf->MultiCell(60,4,utf8_decode('Réponse : Non'));
$pdf->SetXY(10, 180);
$pdf->SetFont('Arial','',14);
$pdf->MultiCell(60,4,utf8_decode('Votre score : ') . $_SESSION['form_result'] . '%');
$pdf->Output();
?>